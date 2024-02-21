<?php

namespace App\Http\Controllers\API\Login;

use App\Http\Controllers\Controller;
use App\Models\Registration\Investor;
use App\Services\OtpMailService;
use Illuminate\Http\Request;

class InvestorLoginAPIController extends Controller
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

        $investor = Investor::where('email', '=', $request->email)->first();

        if (!$investor) {
            return response()->json(['message' => 'Invalid email address, or you have not registered.'], 401);
        }

        $otp = rand(100000, 999999);
        $investor->update([
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

        $investor = Investor::where('email', '=', $request->email)->first();

        if (!$investor) {
            return response()->json(['message' => 'You have not registered, please register first.'],   401);
        }

        if ($investor->otp === $request->otp && now()->lessThan($investor->otp_expires_at)) {
            $token = $investor->createToken('investor-api-token')->plainTextToken;

            $investor->update(['otp' => null]);
            
            return response()->json([
                'message' => 'Logged in successfully',
                'token' => $token,
                'token_type' => 'Bearer',
            ],   200);
        }

        return response()->json(['message' => 'Invalid OTP or OTP has expired.'],   401);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        if($user) {
            $user->currentAccessToken()->delete();
            return response()->json(['message' => 'Logged out successfully'],   200);
        }
        return response()->json(['message' => 'No authenticated user found'],   200);
    }
}
