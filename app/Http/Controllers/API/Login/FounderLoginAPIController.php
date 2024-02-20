<?php

namespace App\Http\Controllers\API\Login;

use App\Http\Controllers\Controller;
use App\Models\Registration\Founder;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class FounderLoginAPIController extends Controller
{
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $founder = Founder::where('email', $request->email)->first();

        if (!$founder) {
            return response()->json(['message' => 'Please send an application first.'],  401);
        }

        return $this->attemptLogin($founder, $request->password);
    }

    private function attemptLogin(Founder $founder, string $password)
    {
        if ($founder->password === null) {
            $founder->update(['password' => Hash::make($password)]);
            return $this->loginFounder($founder, $password);
        }

        if (Hash::check($password, $founder->password)) {
            $token = $founder->createToken('founder-api-token')->plainTextToken;
            return response()->json([
                'message' => 'Logged in successfully.',
                'token' => $token,
                'token_type' => 'Bearer',
            ],   200);
        }

        throw ValidationException::withMessages([
            'password' => ['The provided password is incorrect.'],
        ]);
    }

    private function loginFounder(Founder $founder, string $password)
    {
        if (Hash::check($password, $founder->password)) {
            $token = $founder->createToken('founder-api-token')->plainTextToken;
            return response()->json([
                'message' => 'Logged in successfully.',
                'token' => $token,
                'token_type' => 'Bearer',
            ],   200);
        }

        throw ValidationException::withMessages([
            'password' => ['The provided password is incorrect.'],
        ]);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        if ($user) {
            $user->currentAccessToken()->delete();
            return response()->json(['message' => 'Logged out successfully.'],  200);
        }
        return response()->json(['message' => 'No authenticated user found.'],  401);
    }

}
