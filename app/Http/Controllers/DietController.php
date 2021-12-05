<?php

namespace App\Http\Controllers;

use App\Models\Dieta;
use Illuminate\Http\Request;

class DietController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all diets

        return Dieta::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // create a diet

        $request->validate([
            'ime' => 'required'
        ]);

        return Dieta::create($request -> all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dieta  $dieta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get a diet
        return Dieta::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dieta  $dieta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // update a diet
        $updatedDieta = Dieta::find($id);
        $updatedDieta -> update($request -> all());
        return $updatedDieta;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dieta  $dieta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete a diet

        return Dieta::destroy($id);
    }
}
