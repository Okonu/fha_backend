<?php

namespace App\Http\Controllers\API\Registration;

use App\Http\Controllers\Controller;
use App\Http\Requests\Registration\Founder\StoreFounderRequest;
use App\Models\Registration\Founder;
use App\Models\Registration\FounderDetail;
use App\Services\RegistrationEmailService;

class FounderAPIController extends Controller
{
    protected $registrationEmailService;

    public function __construct(RegistrationEmailService $registrationEmailService)
    {
        $this->registrationEmailService = $registrationEmailService;
    }
    public function founderRegistration(StoreFounderRequest $request)
    {
        $validatedData = $request->validated();

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

        $message = "Registration successful. PLease check the following steps";
        $this->registrationEmailService->sendEmail(
            $request->input('email'),
            'Registration complete',
            $message
        );

        return response()->json([
            'message' => 'Registration complete. Please check your email on the next steps.',
            'founder' => $founder,
            'founderDetail' => $founderDetail,
        ]);
    }

}