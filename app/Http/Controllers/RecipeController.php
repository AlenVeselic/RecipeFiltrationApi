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
        // get all recipes
        return Recept::with('sestavine', 'priprave', 'zahtevnost', 'diete')->get();
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
        return Recept::with('sestavine', 'priprave', 'zahtevnost', 'diete')->find($id);
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
        //return Recept::destroy($id);
        return ["Message" => "Recipe: " . (string) $id. " destroyed."];
    }

    public function search(Request $request){
        $request -> validate([
            "ingredients" => "required"
        ]);

        $recipes = Recept::with('sestavine','priprave', 'zahtevnost', 'diete');

        if(count($request->ingredients) == 1 && $request->ingredients[0] == ""){
        }else if(count($request->ingredients) == 1){
            $recipes = $recipes->whereRelation('sestavine', 'ime', $request->ingredients[0]);
            
        }else if(count($request->ingredients) > 1){
            $recipes = $recipes->whereHas("sestavine", function($query) use ($request){
                $query->whereIn('ime', $request->ingredients) ;
            },"=",count($request->ingredients));
        }
        
        if(count($request->preparationTypes) == 1 && $request->preparationTypes[0] == ""){

        }else if(count($request->preparationTypes) == 1){

            $recipes = $recipes -> whereRelation('priprave', 'naziv', $request->preparationTypes[0]);

        }else if(count($request->preparationTypes) > 1){

            $recipes = $recipes->whereHas("priprave", function($query) use ($request){
                $query->whereIn('naziv', $request->preparationTypes);
            },"=",count($request->preparationTypes));

        }

        if(count($request->difficultyLevel) == 1 && $request->difficultyLevel[0] != ""){
            $recipes = $recipes -> whereRelation('zahtevnost', 'naziv', $request->difficultyLevel[0]);
        }
        
        if($request->searchQuery){
            $recipes = $recipes -> where('ime', 'ILIKE', "%{$request->searchQuery}%");
        }
        return $recipes->paginate(25);

    }

    public function ids(){
        $recipes = Recept::get();

        return $recipes -> map(function($recipe){ return $recipe->only('idrecepta')['idrecepta']; });


    }
}
