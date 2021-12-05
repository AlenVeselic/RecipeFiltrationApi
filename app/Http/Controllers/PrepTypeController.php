<?php

namespace App\Http\Controllers;

use App\Models\Priprava;
use Illuminate\Http\Request;

class PrepTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all preparation types
        return Priprava::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create a preparation type

        $request->validate([
            'naziv' => 'required'
        ]);

        return Priprava::create($request -> all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Priprava  $priprava
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get a preparation type

        return Priprava::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Priprava  $priprava
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // update a preparation type
        $updatedPriprava = Priprava::find($id);
        $updatedPriprava -> update($request -> all());
        return $updatedPriprava;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Priprava  $priprava
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete a priprava

        return Priprava::destroy($id);
    }
}
