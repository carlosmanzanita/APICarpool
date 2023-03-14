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
     * Muestra los puntos de encuentro mientras no hayan sido eliminados. GET
     */
    public function index()
    {
        return Encuentro::where('baja',0)->get();
    }

    /**
     *
     * Almacena un nuevo punto de encuentro. POST
     */
    public function store(Request $request)
    {
        $encuentro = Encuentro::create($request->all());
        return $encuentro;
    }

    /**
     * Muestra un punto de encuentro por ID. GET 
     */
    public function show($encuentro_id)
    {
        $encuentro = Encuentro::where('baja',0)->where('id',$encuentro_id)->get();
        return $encuentro;
    }

    /**
     * Actualiza un punto de encuentro por ID. PUT 
     */
    public function update(Request $request, $encuentro_id)
    {
        $encuentro = Encuentro::find($encuentro_id);
        $encuentro->update($request->all());
        $encuentro->save();
        return $encuentro;

    }

    /**
     * Elimina un encuentro por ID. DELETE
     */
    public function destroy($encuentro_id)
    {
        $encuentro = Encuentro::find($encuentro_id);
        $encuentro->baja=1;
        $encuentro->save();
        return true;
    }
}
