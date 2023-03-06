<?php

namespace App\Http\Controllers;

use App\Models\AventonTag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AventonTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return AventonTag::all();
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AventonTag $aventonTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AventonTag $aventonTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AventonTag $aventonTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AventonTag $aventonTag)
    {
        //
    }
}
