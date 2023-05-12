<?php

namespace App\Http\Controllers;

use App\Models\Aventon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AventonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Aventon::all();
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
    public function store(Request $request)
    {
        return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(Aventon $aventon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aventon $aventon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aventon $aventon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aventon $aventon)
    {
        //
    }
}
