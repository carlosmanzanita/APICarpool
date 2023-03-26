<?php

namespace App\Http\Controllers;

use App\Models\Modalidad;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ModalidadController extends Controller
{
    /**
     * Muestra las modalidades mientras no hayan sido eliminadas. GET
     */
    public function index()
    {
        return Modalidad::where('baja',0)->get();
    }


    /**
     *Almacena una nueva modalidad. POST
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);
        $modalidad = Modalidad::create($request->all());
        return $modalidad;
    }

    /**
     * Muestra una modalidad por ID. GET
     */
    public function show($modalidad_id)
    {
        $modalidad = Modalidad::where('baja',0)->where('id',$modalidad_id)->get();
        return $modalidad;
    }

    /**
     * Actualiza una modalidad por ID. PUT
     */
    public function update(Request $request, $modalidad_id)
    {
        $modalidad = Modalidad::find($modalidad_id);
        $modalidad->update($request->all());
        $modalidad->save();
        return $modalidad;

    }

    /**
     * Elimina una modalidad por ID. DELETE
     */
    public function destroy($modalidad_id)

    {
        $modalidad = Modalidad::find($modalidad_id);
        $modalidad->baja=1;
        $modalidad->save();
        return true;
    }
}
