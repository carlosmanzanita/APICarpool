<?php

namespace App\Http\Controllers;

use App\Models\Confirmar;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ConfirmarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Confirmar::all();
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
    public function show($confirmar_id)
    {
        $confirmar = Confirmar::find($confirmar_id);
        return $confirmar;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Confirmar $confirmar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Confirmar $confirmar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Confirmar $confirmar)
    {
        //
    }
}
