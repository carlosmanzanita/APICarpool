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
     *
     * Almacena ubicación de punto de encuentro POST
     */
    public function store(Request $request)
    {
        $encuentro = Encuentro::create($request->all());
        return $encuentro;
    }

    /**
     * Muestra un punto de encuentro por ID, GET 
     */
    public function show(Encuentro $encuentro)
    {
        $encuentro = Encuentro::where('Punto de encuentro',0)->where('id',$encuentro->id)->get();
        return $encuentro;
    }

    /**
     * Actualiza un punto de encuentro predefinido, PUT 
     */
    public function update(Request $request, Encuentro $encuentro)
    {
        $encuentro = Encuentro::find ($encuentro->id);
        $encuentro->update ($request->all());
        $encuentro->save();
        return $encuentro;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Encuentro $encuentro)
    {
        //
    }
}
