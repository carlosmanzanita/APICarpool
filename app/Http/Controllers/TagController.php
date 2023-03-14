<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TagController extends Controller
{
    /**
     * Muestra los tags mientras no hayan sido eliminados. GET
     */
    public function index()
    {
        return Tag::where('baja',0)->get();
    }


    /**
     *Almacena un nuevo tag. POST
     */
    public function store(Request $request)
    {
        $tag = Tag::create($request->all());
        return $tag;
    }

    /**
     * Muestra un tag por ID. GET
     */
    public function show($tag_id)
    {
        $tag = Tag::where('baja',0)->where('id',$tag_id)->get();
        return $tag;
    }

    /**
     * Actualiza un tag por ID. PUT
     */
    public function update(Request $request, $tag_id)
    {
        $tag = Tag::find($tag_id);
        $tag->update($request->all());
        $tag->save();
        return $tag;

    }

    /**
     * Elimina un tag por ID. DELETE
     */
    public function destroy($tag_id)

    {
        $tag = Tag::find($tag_id);
        $tag->baja=1;
        $tag->save();
        return true;
    }
}
