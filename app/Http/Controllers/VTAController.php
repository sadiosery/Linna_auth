<?php

namespace App\Http\Controllers;

use App\Models\VTA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use Validator;

class VTAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getVTA()
    {
        $vtaList = DB::table('vta')
        ->select('value')
        ->where('corp_id', 1)
        ->orderBy('value')
        ->get(); 
        return response()->json($vtaList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VTA  $vTA
     * @return \Illuminate\Http\Response
     */
    public function show(VTA $vTA)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VTA  $vTA
     * @return \Illuminate\Http\Response
     */
    public function edit(VTA $vTA)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VTA  $vTA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VTA $vTA)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VTA  $vTA
     * @return \Illuminate\Http\Response
     */
    public function destroy(VTA $vTA)
    {
        //
    }
}
