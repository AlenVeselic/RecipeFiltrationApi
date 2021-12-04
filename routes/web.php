<?php

use Illuminate\Support\Facades\Route;

use App\Models\Priprava;
use App\Models\Zahtevnost;
use App\Models\Recept;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $recept = Recept::find(55);

    return $recept;
});
