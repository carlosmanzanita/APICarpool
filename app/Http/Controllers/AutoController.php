<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AutoController extends Controller
{
    /**
     * Muestra los autos mientras no hayan sido eliminados. GET
     */
    public function index()
    {
        return Auto::where('baja',0)->get();
    }

    /**
     * Almacena un nuevo auto. POST
     */
    public function store(Request $request)
    {
        $auto = Auto::create($request->all());
        return $auto;
    }

    /**
     * Muestra un auto por ID. GET
     */
    public function show($auto_id)
    {
        $auto = Auto::where('baja',0)->where('id',$auto_id)->get();
        return $auto;
    }

    /**
     * Actualiza un auto por ID. PUT
     */
    public function update(Request $request, $auto_id)
    {
        $auto = Auto::find($auto_id);
        $auto->update($request->all());
        $auto->save();
        return $auto;
    }

    /**
     * Elimina un auto por ID. DELETE
     */
    public function destroy($auto_id)
    {
        $auto = Auto::find($auto_id);
        $auto->baja=1;
        $auto->save();
        return true;
    }
}
