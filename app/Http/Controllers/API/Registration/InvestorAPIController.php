<?php

namespace App\Http\Controllers\API\Registration;

use App\Http\Controllers\Controller;
use App\Http\Requests\Registration\Investor\StoreInvestorRequest;
use App\Models\Registration\Investor;
use App\Models\Registration\InvestorDetail;
use App\Services\RegistrationEmailService;

class InvestorAPIController extends Controller
{
    protected $registrationEmailService;

    public function __construct(RegistrationEmailService $registrationEmailService)
    {
        $this->registrationEmailService = $registrationEmailService;
    }

    private function sendRegistrationConfirmationEmail($email, $subject, $content)
    {
        $this->registrationEmailService->sendEmail($email, $subject, $content);
    }

    public function investorRegistration(StoreInvestorRequest $request)
    {
        $validatedData = $request->validated();

        $existingEmail = Investor::where('email', $validatedData['email'])->first();

        if ($existingEmail) {
            return response()->json([
                'message' => 'The email is already in use.'
            ],  409);
        }

        $investor = Investor::create($validatedData);

        $investorDetails = InvestorDetail::create([
            'investor_id' => $investor->id,
            'enterprise_level' => $request->input('enterprise_level'),
            'co_investing' => $request->input('co_investing'),
            'focus_area' => $request->input('focus_area'),
            'convenient_investing' => $request->input('convenient_investing'),
            'impact' => $request->input('impact'),
            'viability' => $request->input('viability'),
            'expectation' => $request->input('expectation'),
            'concern' => $request->input('concern'),
        ]);
        $paymentLink = route('payment.form', ['user' => $investor->id, 'user_type' => 'investor']);

        $content = "Thank you for registering as a Investor. 'Complete Your Registration', Please complete your registration by clicking the following link: " . $paymentLink;

        $this->sendRegistrationConfirmationEmail(
            $request->input('email'),
            'Registration Successful',
            $content
        );

        return response()->json([
            'message' => 'Registration was successful',
            'investor' => $investor,
            'investoreDetails' => $investorDetails
        ]);
    }
}
