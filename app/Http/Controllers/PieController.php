<?php

namespace App\Http\Controllers;

use App\Models\Pie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Pie::all();
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
    public function show(Pie $pie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pie $pie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pie $pie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pie $pie)
    {
        //
    }
}
