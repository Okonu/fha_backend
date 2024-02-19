<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use App\Http\Requests\Registration\Founder\StoreFounderRequest;
use App\Http\Requests\Registration\Founder\UpdateFounderRequest;
use App\Models\Registration\Founder;

class FounderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFounderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Founder $founder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Founder $founder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFounderRequest $request, Founder $founder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Founder $founder)
    {
        //
    }
}
