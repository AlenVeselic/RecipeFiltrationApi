<?php

namespace App\Http\Controllers;

use App\Models\Sestavina;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all ingredients

        return Sestavina::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // create an ingredient
        $request->validate([
            'ime' => 'required'
        ]);

        return Sestavina::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sestavina  $sestavina
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get one ingredient

        return Sestavina::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sestavina  $sestavina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // update an ingredient
        $updatedSestavina = Sestavina::find($id);
        $updatedSestavina -> update($request -> all());
        return $updatedSestavina;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sestavina  $sestavina
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete an ingredient
        return Sestavina::destroy($id);

    }
}
