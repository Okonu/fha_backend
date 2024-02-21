<?php

namespace App\Http\Controllers\API\Login;

use App\Http\Controllers\Controller;
use App\Models\Registration\Founder;
use App\Services\OtpMailService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class FounderLoginAPIController extends Controller
{
    protected $otpMailService;

    public function __construct(OtpMailService $otpMailService)
    {
        $this->otpMailService = $otpMailService;
    }

    private function sendOtpEmail($email, $otp)
    {
        $subject = 'Your OTP for Login';
        $content = "Your OTP for login is: {$otp}";
        $this->otpMailService->sendEmail($email, $subject, $content);
    }

    public function requestOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $founder = Founder::where('email', $request->email)->first();

        if (!$founder) {
            return response()->json(['message' => 'Please send an application first.'],   401);
        }

        $otp = rand(100000,  999999);
        $founder->update([
            'otp' => $otp,
            'otp_expires_at' => now()->addMinutes(5),
        ]);

        $this->sendOtpEmail($request->email, $otp);

        return response()->json(['message' => 'OTP sent successfully']);
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|numeric',
        ]);

        $founder = Founder::where('email', $request->email)->first();

        if (!$founder) {
            return response()->json(['message' => 'Please send an application first.'],   401);
        }

        if ($founder->otp === $request->otp && now()->lessThan($founder->otp_expires_at)) {
            $token = $founder->createToken('founder-api-token')->plainTextToken;
            $founder->update(['otp' => null]);
            return response()->json([
                'message' => 'Logged in successfully.',
                'token' => $token,
                'token_type' => 'Bearer',
            ],   200);
        }

        return response()->json(['message' => 'Invalid OTP or OTP has expired.'],   401);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        if ($user) {
            $user->currentAccessToken()->delete();
            return response()->json(['message' => 'Logged out successfully.'],   200);
        }
        return response()->json(['message' => 'No authenticated user found.'],   401);
    }
}
