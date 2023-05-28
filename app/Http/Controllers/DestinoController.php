<?php

namespace App\Http\Controllers;

use App\Models\Destino;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DestinoController extends Controller
{
    /**
     * Muestra los destinos mientras no hayan sido eliminados. GET
     */
    public function index()
    {
        
        $user = Auth::user();
        return Destino::where('baja',0)->where('user_id', $user->id)->get();
    }


    /**
     *Almacena un nuevo destino. POST
     */
    public function store(Request $request)
    {
        return "torpene";
        try{
        $user = Auth::user();
        $destino_nuevo = [
            'nombre' => $request->nombre,
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
            'user_id' => $user->id,
        ];
        $destino = Destino::create($destino_nuevo);

        $validate = Validator::make($request->all(), 
            [
                'nombre' => 'required',
                'latitud' => 'required',
                'longitud' => 'required',
            ]);
        return $destino;
        } catch(\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Muestra un destino por ID. GET
     */
    public function show($destino_id)
    {
        $destino = Destino::where('baja',0)->where('id',$destino_id)->first();
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
