<?php

namespace App\Http\Controllers;

use App\Models\PieTag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PieTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PieTag::all();
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
    public function show(PieTag $pieTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PieTag $pieTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PieTag $pieTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PieTag $pieTag)
    {
        //
    }
}
