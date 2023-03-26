<?php

namespace App\Http\Controllers;

use App\Models\Destino;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DestinoController extends Controller
{
    /**
     * Muestra los destinos mientras no hayan sido eliminados. GET
     */
    public function index()
    {
        return Destino::where('baja',0)->get();
    }


    /**
     *Almacena un nuevo destino. POST
     */
    public function store(Request $request)
    {
        $destino = Destino::create($request->all());
        $res = $request->validate([
            'nombre'=>'required',
            'latitud'=>'required',
            'longitud'=>'required',
            'tipo'=>'required',
        ]);
        // return $res;
        /**/
        return $destino;
    }

    /**
     * Muestra un destino por ID. GET
     */
    public function show($destino_id)
    {
        $destino = Destino::where('baja',0)->where('id',$destino_id)->get();
        return $destino;
    }

    /**
     * Actualiza un destino por ID. PUT
     */
    public function update(Request $request, $destino_id)
    {
        $destino = Destino::find($destino_id);
        $destino->update($request->all());
        $destino->save();
        return $destino;

    }

    /**
     * Elimina un destino por ID. DELETE
     */
    public function destroy($destino_id)

    {
        $destino = Destino::find($destino_id);
        $destino->baja=1;
        $destino->save();
        return true;
    }
}
