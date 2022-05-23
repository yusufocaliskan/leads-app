<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Include the controller namespaces
use App\Http\Controllers\Users;
use App\Http\Controllers\Leads;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*********************************** | Leads App Router | *****************************************/

//List all leads located in the database
//Prefix will helps us to create more readable urls.
Route::post('/leads',[Leads::class, 'index']);
Route::prefix('/lead')->group(function(){

    //selects by id.  /leads/1
    Route::get('/{id}',[Leads::class,'show']);

    //updates by id.
    //The sent data will be saved by using id
    Route::put('/update/{id}',[Leads::class,'update']);

    //Destroys given id
    Route::delete('/destroy/{id}',[Leads::class,'destroy']);

});

/*********************************** | User | *****************************************/

//Login.
Route::post('/users/login',[Users::class,'login']);

//Logout
Route::post('/users/logout',[Users::class,'logout']);

