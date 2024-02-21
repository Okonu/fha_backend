<?php

namespace App\Http\Controllers\API\Registration;

use App\Http\Controllers\Controller;
use App\Http\Requests\Registration\Investor\StoreInvestorRequest;
use App\Models\Registration\Investor;
use App\Models\Registration\InvestorDetail;
use Illuminate\Http\Request;

class InvestorAPIController extends Controller
{
    public function investorRegistration(StoreInvestorRequest $request)
    {
        $validatedData = $request->validated();

        $existingEmail = Investor::where('email', $validatedData['email'])->first();

        if ($existingEmail) {
            return response()->json([
                'message' => 'The email is already in use.',
                'error' => 'email_already_in_use',
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

        return response()->json([
            'message' => 'Registration was successful',
            'investor' => $investor,
            'investoreDetails' => $investorDetails
        ]);
    }
}
