<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Registration\Founder;
use App\Models\Registration\Investor;
use App\Models\Registration\Professional;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use App\Services\RegistrationEmailService;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class PaymentsController extends Controller
{
    protected $registrationEmailService;

    public function __construct(RegistrationEmailService $registrationEmailService)
    {
        $this->registrationEmailService = $registrationEmailService;
    }

    public function initiatePayment(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'user_type' => 'required|string',
            'email' => 'required|email',
            'channel_code' => 'required|integer',
        ]);

        $externalRef = Str::random(10);

        $amount = 500;
        $kittyId = 1223;
        $channelCode = $request->input('channel_code');

        $payment = new Payment;
        $payment->user_type = $request->input('user_type');
        $payment->user_id = $request->input('user_id');
        $payment->external_ref = $externalRef;
        $payment->amount = $amount;
        $payment->status = 'pending';
        $payment->channel_code = $channelCode;
        $payment->save();

        $this->sendPaymentRequestToGateway($externalRef, $amount, $kittyId, $request->input('phone_number'), $request->input('email'), $channelCode);

        return response()->json([
            'message' => 'Payment initated successfully',
            'payment' => $payment,
        ]);
    }

    private function sendPaymentRequestToGateway($externalRef, $amount, $kittyId, $phoneNumber, $channelCode)
    {
        $baseUrl = 'https://apisalticon.onekitty.co.ke/';
        $endpoint = 'kitty/contribute_kitty/';

        $payload = [
            "amount" => $amount,
            "kitty_id" => $kittyId,
            "phone_number" => $phoneNumber,
            "channel_code" => $channelCode,
            "external_ref" => $externalRef,
            // "first_name" => " ",
            // "second_name" => " ",
            "show_names" => true,
            "show_number" => true
        ];

        Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post($baseUrl . $endpoint, $payload);
    }

    private function sendSuccessEmail($email)
    {
        $content = "Thank you for your contribution. Your payment was successful. Here's a link to share on WhatsApp: https://chat.whatsapp.com/BQ1QSNPYpp90XZWP433Mez. Welcome to our community!";
        $this->registrationEmailService->sendEmail($email, 'Payment Successful', $content);
    }

    private function sendFailureEmail($email, $errorMessage)
    {
        $content = "We're sorry, but your payment was not successful. Please try again later. Error message: " . $errorMessage;
        $this->registrationEmailService->sendEmail($email, 'Payment Failed', $content);
    }

    public function handleCallback(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'result_code' => 'required|string',
            'result_desc' => 'required|string',
            'third_party_reference' => 'required|string',
            'request_reference' => 'required|string',
            'transaction_code' => 'required|string',
            'channel_code' => 'required|integer',
            'charges_total' => 'required|numeric',
        ]);

        $payment = Payment::where('external_ref', $request->request_reference)->first();

        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], 404);
        }

        $payment->status = $request->result_code === '0' ? 'success' : 'failed';
        $payment->transaction_code = $request->transaction_code;
        $payment->save();

        Log::info('Payment callback received', $request->all());

        if ($payment->status === 'success') {
            $this->sendSuccessEmail($payment->user->email);
        } else {
            $this->sendFailureEmail($payment->user->email, $request->result_desc);
        }

        return response()->json(['message' => 'Payment callback processed successfully']);
    }

    public function showPaymentForm(Request $request)
    {
        $userId = $request->query('user');
        // $user = User::find($userId);
        $userType = $request->query('user_type');

        switch ($userType) {
            case 'founder':
                $user = Founder::find($userId);
                break;
            case 'professional':
                $user = Professional::find($userId);
                break;
            case 'investor':
                $user = Investor::find($userId);
                break;
            default:
                return response()->json(['message' => 'Unknown user type'], 400);
        }

        if(!$user) {
            return response()->view('errors.404', [], 404);
        }

        return view('payments.payment_form', compact('user'));

    }

}
