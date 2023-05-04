<?php

namespace App\Http\Controllers;

use App\Models\PieTag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class PieTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PieTag::all();
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

        try {
            $user = Auth::user();
            $pieTag = [
                'pie_id' => $request->pie_id,
                'tag_id' => $request->tag_id,
            ];
            $pieTag = PieTag::create($pieTag);
            
            $validate = Validator::make($request->all(), 
            [
                'pie_id' => 'required',
                'tag_id' => 'required'
            ]);

            return $pieTag;

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show($pieTag)
    {
        $pieTag = PieTag::where('baja',0)->where('id',$pieTag)->get();
        return $pieTag;
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PieTag $pieTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PieTag $pieTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PieTag $pieTag)
    {
        //
    }
}
