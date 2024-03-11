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

        $existingEmail = Founder::where('email', $validatedData['email'])->first();

        if($existingEmail) {
            return response()->json([
                'message' => 'This email is already in use.'
            ], 409);
        }

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

        $paymentLink = route('payment.form', ['user' => $founder]);

        $content = "Thank you for registering as a Founder. 'Complete Your Registration', Please complete your registration by clicking the following link: " . $paymentLink;

        $this->registrationEmailService->sendEmail(
            $request->input('email'),
            'Follow the link to complete registration',
            $content
        );

        return response()->json([
            'message' => 'Expression of interest sent, next steps as above.',
            'founder' => $founder,
            'founderDetail' => $founderDetail,
        ]);
    }

}
