<?php

namespace App\Http\Controllers;

use App\Models\Destinoemergente;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DestinoemergenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Destinoemergente::all();
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
    public function show(Destinoemergente $destinoemergente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Destinoemergente $destinoemergente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Destinoemergente $destinoemergente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Destinoemergente $destinoemergente)
    {
        //
    }
}
