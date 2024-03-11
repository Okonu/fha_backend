<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use App\Services\RegistrationEmailService;
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
        ]);

        $externalRef = Str::random(10);

        $amount = 300;
        $kittyId = 50;

        $payment = new Payment;
        $payment->user_type = $request->input('user_type');
        $payment->user_id = $request->input('user_id');
        $payment->external_ref = $externalRef;
        $payment->amount = $amount;
        $payment->status = 'pending';
        $payment->save();

        $this->sendPaymentRequestToGateway($externalRef, $amount, $kittyId, $request->input('phone_number'), $request->input('email'));

        return response()->json([
            'message' => 'Payment initated successfully',
            'payment' => $payment,
        ]);
    }

    private function sendPaymentRequestToGateway($externalRef, $amount, $kittyId, $phoneNumber, $email)
    {
        $baseUrl = 'https://apisalticon.onekitty.co.ke/';
        $endpoint = 'kitty/contribute_kitty/';

        $payload = [
            "amount" => $amount,
            "kitty_id" => $kittyId,
            "phone_number" => $phoneNumber,
            "channel_code" => 63902,
            "external_ref" => $externalRef,
            "first_name" => "Ian",
            "second_name" => "Okonu",
            "show_names" => true,
            "show_number" => true
        ];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post($baseUrl . $endpoint, $payload);

        if ($response->successful()) {
            $this->sendSuccessEmail($email);
        } else {
            $this->sendFailureEmail($email, $response->body());
        }
    }

    private function sendSuccessEmail($email)
    {
        $content = "Thank you for your contribution. Your payment was successful. Here's a link to share on WhatsApp: [Your WhatsApp Link]. Welcome to our community!";
        $this->registrationEmailService->sendEmail($email, 'Payment Successful', $content); 
    }

    private function sendFailureEmail($email, $errorMessage)
    {
        $content = "We're sorry, but your payment was not successful. Please try again later. Error message: " . $errorMessage;
        $this->registrationEmailService->sendEmail($email, 'Payment Failed', $content);
    }

    public function handleCallback(Request $request)
    {
        $externalRef = $request->input('external_ref');
        $payment = Payment::where('external_ref', $externalRef)->first();

        if ($payment) {
            $payment->status = $request->input('status');
            $payment->save();

            Log::info('Payment callback received', $request->all());

            if ($payment->status === 'completed') {
                $this->sendSuccessEmail($payment->user->email);
            } else {
                $this->sendFailureEmail($payment->user->email, $request->input('error_message'));
            }

            return response()->json(['message' => 'Payment status updated successfully']);
        } else {
            return response()->json(['message' => 'Payment not found'], 404);
        }
    }

    public function showPaymentForm(Request $request)
    {

        $user = $request->query('user');

        return view('payments.payment_form', compact('user'));
    }

}