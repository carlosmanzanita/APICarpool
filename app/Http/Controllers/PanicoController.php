<?php

namespace App\Http\Controllers;

use App\Models\Panico;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PanicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Panico::all();
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
    public function show(Panico $panico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Panico $panico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Panico $panico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Panico $panico)
    {
        //
    }
}
