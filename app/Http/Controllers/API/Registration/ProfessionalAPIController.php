<?php

namespace App\Http\Controllers\API\Registration;

use App\Http\Controllers\Controller;
use App\Http\Requests\Registration\Professional\StoreProfessionalRequest;
use App\Models\Registration\Professional;
use App\Models\Registration\ProfessionalDetail;
use App\Services\RegistrationEmailService;
use Illuminate\Http\Request;

class ProfessionalAPIController extends Controller
{
    protected $registrationEmailService;

    public function __construct(RegistrationEmailService $registrationEmailService)
    {
        $this->registrationEmailService = $registrationEmailService;
    }
    public function professionalRegistration(StoreProfessionalRequest $request)
    {
        $validatedData = $request->validated();

        $existingEmail = Professional::where('email', $validatedData['email'])->first();

        if($existingEmail) {
            return response()->json([
                'message' => 'This email is already in use.'
            ], 409);
        }

        $professional = Professional::create($validatedData);

        $professionalDetail = ProfessionalDetail::create([
            'professional_id' => $professional->id,
            'motivation' =>$request->input('motivation'),
            'credibility_enhancement' => $request->input('credibility_enhancement'),
            'interests' => $request->input('interests'),
            'skills' => $request->input('skills'),
            'benefits' => $request->input('benefits'),
            'collaboration_engagement' => $request->input('collaboration_engagement'),
            'aspirations' => $request->input('aspirations'),
            'contributions' => $request->input('contributions'),
            'skill_importance' => $request->input('skill_importance'),
            'goals' => $request->input('goals'),
            'phone_number' => $request->input('phone_number'),
        ]);

        $paymentLink = route('payment.form', ['user' => $professional->id, 'user_type' => 'professional']);

        $content = "Thank you for registering as a Professional. 'Complete Your Registration', Please complete your registration by clicking the following link: " . $paymentLink;

        $this->registrationEmailService->sendEmail(
            $request->input('email'),
            'Registration complete',
            $content
        );

        return response()->json([
            'message' => 'Registration complete. PLease check your email for the next steps.',
            'professional' => $professional,
            'professionalDetail' => $professionalDetail,
        ]);
    }
}
