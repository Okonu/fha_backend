<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
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
            // "channel_code" => "required|integer",
            "amount" => "required|integer",
            'user_type' => 'required|string',
            'email' => 'required|email',
        ]);

        $externalRef = Str::random(10);
        $channelCode = 63902;
        $kittyId = 1223;

        $payment = new Payment;
        $payment->user_type = $request->input('user_type');
        $payment->user_id = $request->input('user_id');
        $payment->external_ref = $externalRef;
        $payment->amount = $request->input('amount');
        $payment->channel_code = $channelCode;
        $payment->status = 'pending';
        $payment->save();

        $this->sendPaymentRequestToGateway($externalRef, $request->input('amount') ,$channelCode,$kittyId, $request->input('phone_number'), $request->input('email'));

        return response()->json([
            'message' => 'Payment initated successfully',
            'payment' => $payment,
        ]);
    }

    private function sendPaymentRequestToGateway($externalRef, $amount, $channelCode, $kittyId, $phoneNumber)
    {
        $baseUrl = 'https://apisalticon.onekitty.co.ke/';
        $endpoint = 'kitty/contribute_kitty/';

        $payload = [
            "amount" => $amount,
            "kitty_id" => $kittyId,
            "phone_number" => $phoneNumber,
            "channel_code" => $channelCode,
            "external_ref" => $externalRef,
            "show_names" => true,
            "show_number" => true
        ];

        Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post($baseUrl . $endpoint, $payload);
    }

    private function sendSuccessEmail($email)
    {
        $content = "Thank you for your contribution. Your payment was successful. Here's a link to share on WhatsApp: [ WhatsApp Link]. Welcome to our community!";
        $this->registrationEmailService->sendEmail($email, 'Payment Successful', $content);
    }

    private function sendFailureEmail($email, $errorMessage)
    {
        $content = "We're sorry, but your payment was not successful. Please try again later. Error message: " . $errorMessage;
        $this->registrationEmailService->sendEmail($email, 'Payment Failed', $content);
    }

    public function handleCallback(Request $request)
    {
        $requestReference = $request->input('request_reference');

        $payment = Payment::where('external_ref', $requestReference)->first();

        if ($payment) {
            $resultCode = $request->input('result_code');
            if ($resultCode === '0') {
                $payment->status = 'completed';
            } elseif ($resultCode === '01') {
                $payment->status = 'failed';
            } else {
                $payment->status = 'unknown';
            }
            $payment->save();

            Log::info('Payment callback received', [
                'external_ref' => $requestReference,
                'status' => $payment->status,
                'result_code' => $resultCode,
                'result_desc' => $request->input('result_desc'),
            ]);

            if ($payment->status === 'completed') {
                $this->sendSuccessEmail($payment->user->email);
            } else {
                $this->sendFailureEmail($payment->user->email, $request->input('result_desc'));
            }

            return response()->json(['message' => 'Payment status updated successfully']);

        } else {
            Log::warning('Payment not found for request_reference', ['request_reference' => $requestReference]);
            return response()->json(['message' => 'Payment not found'], 404);
        }
    }

    public function showPaymentForm(Request $request)
    {
        $userId = $request->query('user');
        $user = User::find($userId);

        if ($user) {
            return view('payments.payment_form', compact('user'));
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }
}
