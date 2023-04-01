<?php

namespace App\Http\Controllers;

use App\Models\Encuentro;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Scalar\Encapsed;

class EncuentroController extends Controller
{
/**
     * Muestra los autos mientras no hayan sido eliminados. GET
     */
    public function index()
    {
        return Encuentro::where('baja',0)->get();
    }

    /**
     * Almacena un nuevo auto. POST
     */
    public function store(Request $request)
    {

        try {
            $user = Auth::user();
            $encuentro_nuevo = [
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'latitud' => $request->latitud,
                'longitud' => $request->longitud,
                'tipo' => $request->tipo,
            ];
            $auto = Encuentro::create($encuentro_nuevo);
            
            $validate = Validator::make($request->all(), 
            [
                'nombre' => 'required',
                'descripcion' => 'required',
                'latitud' => 'required',
                'longitud' => 'required',
                'tipo' => 'required',
            ]);

            return $auto;

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Muestra un auto por ID. GET
     */
    public function show($auto_id)
    {
        $auto = Encuentro::where('baja',0)->where('id',$auto_id)->get();
        return $auto;
    }

    /**
     * Actualiza un auto por ID. PUT
     */
    public function update(Request $request, $auto_id)
    {
        try {
            $validate = Validator::make($request->all(), 
            [
                'nombre' => 'required',
                'descripcion' => 'required',
                'latitud' => 'required',
                'longitud' => 'required',
                'tipo' => 'required',
            ]);

            $user = Auth::user();
            $encuentro_editado = [
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'latitud' => $request->latitud,
                'longitud' => $request->longitud,
                'tipo' => $request->tipo,
            ];
            
            $auto = Encuentro::find($auto_id);
            $auto->update($encuentro_editado);
            $auto->save();
            
            return $auto;

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Elimina un auto por ID. DELETE
     */
    public function destroy($auto_id)
    {
        
        $auto = Encuentro::where('id', $auto_id)->first();
        $auto->baja=1;
        $auto->save();
        return true;
    }
}
