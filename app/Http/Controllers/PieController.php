<?php

namespace App\Http\Controllers;

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
    public function update(Request $request, Pie $pie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pie $pie)
    {
        //
    }
}
