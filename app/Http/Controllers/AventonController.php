<?php

namespace App\Http\Controllers;

use App\Models\Aventon;
use App\Models\AventonTag;
use App\Models\Confirmar;
use App\Models\Destinoemergente;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AventonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aventones = Aventon::with("user","encuentro","destino","auto","modalidad", "aventonTag","aventonTag.tag")->where("baja", 0)
        ->where('baja', 0)
        ->get()
        ->toArray();
        
        // ->where('confirma','<>', 2)
        foreach ($aventones as $key => $aventon) {
            $solicitando = Confirmar::with("user")
            ->where('aventon_id', $aventones[$key]['id'])
            ->get();
            $aventones[$key]['solicitando'] = $solicitando;
            
            foreach ($aventones[$key]['solicitando'] as $key2 => $value2) {
                $destino_emergente = Destinoemergente::with('destino')
                ->where('user_id', $value2->user_id)
                ->where('aventon_id', $value2->aventon_id)
                ->first();
                $aventones[$key]['solicitando'][$key2]['destino_emergente'] = $destino_emergente;
            }
        }
        


        $user = Auth::user();
        $user_id = $user->id;
        $user_name = $user->name;
        return compact('aventones', 'user_id','user_name');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        date_default_timezone_set('America/Mexico_City');
        $asientos = $request->asientos;
        $auto_id = $request->auto_id;
        $destino_id = $request->destino_id;
        $encuentro_id = $request->encuentro_id;
        $modalidad_id = $request->modalidad_id;
        $user = Auth::user();
        $aventon = Aventon::create([
            "asientos" => $asientos,
            "auto_id" => $auto_id,
            "destino_id" => $destino_id,
            "encuentro_id" => $encuentro_id,
            "modalidad_id" => $modalidad_id,
            "user_id" => $user->id,
        ]);
        $tags = $request->tags;
        foreach ($tags as $key => $value) {
            $eltag = Tag::where("nombre", $value)->first();
            AventonTag::create([
                'aventon_id'=>$aventon->id,
                'tag_id'=>$eltag->id,
            ]);
        }
    return $aventon;
    }

    public function show(Aventon $aventon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aventon $aventon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $aventon_id)
    {
        $confirma = Confirmar::create([
            'user_id' => $request->user_id,
            'aventon_id' => $aventon_id,
        ]);

        $destino_emergente = Destinoemergente::create([
            'user_id' => $request->user_id,
            'aventon_id' => $aventon_id,
            'destino_id' => $request->destino_id,
        ]);
        return $confirma;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aventon $aventon)
    {
        $aventon->baja = 1;
        $aventon->save();
        return $aventon;
    }

    public function confirmarSolicitud(Request $request, $aventon_id){
        $confirmadillo = Confirmar::where('aventon_id', $aventon_id)->where('user_id', $request->user_id)->first();
        $confirmadillo->confirma = $request->estado;
        $confirmadillo->save();
        return $confirmadillo;
    }
}
