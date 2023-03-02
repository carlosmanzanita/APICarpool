<?php

namespace App\Http\Controllers;

use App\Models\Modalidad;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ModalidadController extends Controller
{
    /**
     * Muestra todas las modalidades
     */
    public function index()
    {
        return Modalidad::all();
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
    public function show($modalidad_id)
    {
        $modalidad = Modalidad::find($modalidad_id);
        return $modalidad;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modalidad $modalidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Modalidad $modalidad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modalidad $modalidad)
    {
        //
    }
}
