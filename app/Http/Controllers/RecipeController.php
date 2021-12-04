<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Recept;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all posts
        return Recept::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // create a recipe

        $request->validate([
            'message' => 'required'
        ]);

        // return Recept::create($request->all());
        return ["message" => "Recipe '" .  $request->input('message') . "' created." ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // show a recipe
        return Recept::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // update a recipe
        $recept = Recept::find($id);
        $recept -> update($request->all());
        return $recept;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete a recipe
        return Recept::destroy($id);
    }
}
