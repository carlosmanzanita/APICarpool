<?php

namespace App\Http\Controllers;

use App\Models\Aventon;
use App\Models\AventonTag;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AventonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Aventon::with("user","encuentro","destino","auto","modalidad")->
        where("baja", 0)->get();
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

    /**
     * Display the specified resource.
     */
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
    public function update(Request $request, Aventon $aventon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aventon $aventon)
    {
        //
    }
}
