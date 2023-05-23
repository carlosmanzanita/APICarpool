<?php

namespace App\Http\Controllers;

use App\Models\Confirmar;
use App\Models\Panico;
use App\Models\Pie;
use App\Models\PieTag;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pies = Pie::with("user","encuentro","destino")->where("baja", 0)
        ->where('baja', 0)
        ->get()
        ->toArray();
        foreach ($pies as $key => $pie) {
            $unirse = Confirmar::with("user")
            ->where('pie_id', $pies[$key]['id'])
            ->get();
            $pies[$key]['unirse'] = $unirse;
        }
        $user = Auth::user();
        $user_id = $user->id;
        $user_name = $user->name;
        return compact('pies', 'user_id','user_name');
        return Pie::whit("user","encuentro","destino")->Where("baja", 0)->get();
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
        $destino_id =$request->destino_id;
        $encuentro_id = $request->encuentro_id;
        $user = Auth::user();
        $pie = Pie::create([
            "destino_id" => $destino_id,
            "encuentro_id" => $encuentro_id,
            "user_id" => $user->id,
        ]);
        $tags = $request->tags;
            foreach ($tags as $key => $value){
            $eltag = Tag::where ("nombre", $value)->first();
            PieTag::create([
                "pie_id"=> $pie->id,
                "tag_id" => $eltag->id,
            ]);
        }
    return $pie;
    }

    /**
     * Display the specified resource.
     */
    public function show(Pie $pie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pie $pie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $pie_id)
    {
        $confirma = Confirmar::create([
            'user_id' => $request->user_id,
            'pie_id' => $pie_id,
        ]);
        return $confirma;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pie $pie)
    {
        {
            $pie->baja = 1;
            $pie->save();
            return $pie;
        }
    }

    public function confirmaSolicitud(Request $request, $pie_id){
        $confirmadillo = Confirmar::where('pie_id', $pie_id)->where('user_id', $request->user_id)->first();
        $confirmadillo->confirma = $request->estado;
        $confirmadillo->save();
        return $confirmadillo;
    }

    public function activacionPanico(Request $request){
        date_default_timezone_set("America/Mexico_City");
        // almacenar los datos de pánico
        $hora = date("H:i:s");
        Panico::create([
            'hora' => $hora,
            'user_id' => $request->user_id,
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
        ]);
    }
    public function panicosActivados(){
        $user_id = Auth::user()->id;
        $panicos_activados = Panico::with('user')->where('activo', 1)->get();
        
        $mis_panicos_activados = Panico::with('user')
        ->where('user_id', $user_id)
        ->where('activo', 1)->get();
        
        return compact('panicos_activados', 'mis_panicos_activados');
    }

    public function quitarPanico(){
        $user_id = Auth::user()->id;
        $panicos = Panico::where('user_id', $user_id)->get();

        foreach ($panicos as $p => $panucho) {
            $panucho->activo = 0;
            $panucho->save();
        }
    }
}
