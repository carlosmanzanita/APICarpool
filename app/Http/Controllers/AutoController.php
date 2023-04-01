<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AutoController extends Controller
{
    /**
     * Muestra los autos mientras no hayan sido eliminados. GET
     */
    public function index()
    {
        $user = Auth::user();
        return Auto::where('baja',0)->where('user_id', $user->id)->get();
    }

    /**
     * Almacena un nuevo auto. POST
     */
    public function store(Request $request)
    {

        try {
            $user = Auth::user();
            $auto_nuevo = [
                'tipo' => $request->tipo,
                'placa' => $request->placa,
                'color' => $request->color,
                'marca' => $request->marca,
                'user_id' => $user->id,
            ];
            $auto = Auto::create($auto_nuevo);
            
            $validate = Validator::make($request->all(), 
            [
                'tipo' => 'required',
                'placa' => 'required',
                'color' => 'required',
                'marca' => 'required',
                'user_id' => 'required',
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
        $user = Auth::user();
        $auto = Auto::where('baja',0)->where('id',$auto_id)->where('user_id', $user->id)->get();
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
                'tipo' => 'required',
                'placa' => 'required',
                'color' => 'required',
                'marca' => 'required',
                'user_id' => 'required',
            ]);

            $user = Auth::user();
            $auto_editado = [
                'tipo' => $request->tipo,
                'placa' => $request->placa,
                'color' => $request->color,
                'marca' => $request->marca,
                'user_id' => $user->id,
            ];
            
            $auto = Auto::find($auto_id);
            $auto->update($auto_editado);
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
        
        $user = Auth::user();
        $auto = Auto::where('user_id', $user->id)->where('id', $auto_id)->first();
        $auto->baja=1;
        $auto->save();
        return true;
    }
}
