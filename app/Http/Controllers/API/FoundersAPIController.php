<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registration\Founder;

class FoundersAPIController extends Controller
{
    public function index()
    {
        $founders = Founder::with('detail')->get();
        return response()->json($founders);
    }
}
