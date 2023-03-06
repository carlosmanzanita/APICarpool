<?php

namespace App\Http\Controllers;

use App\Models\Encuentro;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PhpParser\Node\Scalar\Encapsed;

class EncuentroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Encuentro::all();
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
    public function show(Encuentro $encuentro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Encuentro $encuentro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Encuentro $encuentro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Encuentro $encuentro)
    {
        //
    }
}
