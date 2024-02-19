<?php

namespace App\Http\Controllers\API\Registration;

use App\Http\Controllers\Controller;
use App\Http\Requests\Registration\Founder\StoreFounderRequest;
use App\Models\Registration\Founder;
use App\Models\Registration\FounderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class FounderAPIController extends Controller
{
    public function register(StoreFounderRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['password'] = Hash::make(str_random(16));

        $founder = Founder::create($validatedData);

        $founderDetail = FounderDetail::create([
            'founder_id' => $founder->id,
            'company_name' => $request->input('company_name'),
            'business_type' => $request->input('business_type'),
            'financial_level' => $request->input('financial_level'),
            'focus_area' => $request->input('focus_area'),
            'challenges' => $request->input('challenges'),
            'funding_status' => $request->input('funding_status'),
            'partnership' => $request->input('partnership'),
            'community_support' => $request->input('community_support'),
        ]);

        return response()->json([
            'message' => 'Registration complete. Please check your email to set your password.',
            'founder' => $founder,
            'founderDetail' => $founderDetail,
        ]);

    }
}
