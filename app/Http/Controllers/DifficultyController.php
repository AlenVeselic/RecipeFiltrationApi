<?php

namespace App\Http\Controllers;

use App\Models\Zahtevnost;
use Illuminate\Http\Request;

class DifficultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all difficulty levels

        return Zahtevnost::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // create a difficulty level

        $request -> validate([
            "naziv" => 'required'
        ]);

        return Zahtevnost::create($request-> all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Zahtevnost  $zahtevnost
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get one difficulty level

        return Zahtevnost::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Zahtevnost  $zahtevnost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // update a difficulty level

        $updatedDifficulty = Zahtevnost::find($id);
        $updatedDifficulty -> update($request -> all());
        return $updatedDifficulty;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Zahtevnost  $zahtevnost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete a difficulty level

        return Zahtevnost::destroy($id);
    }
}
