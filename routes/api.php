<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RecipeController;
use App\Http\Controllers\DietController;
use App\Http\Controllers\PrepTypeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\DifficultyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function () {

    Route::post('/recipes/search', [RecipeController::class, 'search']);
    Route::apiresource('recipes', RecipeController::class);

    Route::apiresource('diets', DietController::class);

    Route::apiresource('preparation-types', PrepTypeController::class);

    Route::apiresource('ingredients', IngredientController::class);

    Route::apiresource('difficulty-levels', DifficultyController::class);

});

    








Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
