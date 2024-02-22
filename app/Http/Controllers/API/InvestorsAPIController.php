<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registration\Investor;

class InvestorsAPIController extends Controller
{
    public function index()
    {
        $investors = Investor::with('investorDetail')->get();
        return response()->json($investors);
    }
}
