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

//Lists all leads located in the database
Route::post('/leads',[Leads::class, 'index']);

//Prefix will help us to create more readable urls.
Route::prefix('/lead')->group(function(){

    //selects by id.  /leads/1
    Route::post('/show/{id}',[Leads::class,'show']);

    //Create new on
    Route::post("/create",[Leads::class,'create']);

    //updates by id.
    //The sent data will be saved by using id
    Route::put('/update/{id}',[Leads::class,'update']);

    //Destroys given id
    Route::post('/delete/{id}',[Leads::class,'destroy']);

});

/*********************************** | User | *****************************************/

//Login.
Route::post('/users/login',[Users::class,'login']);

//Logout
Route::post('/users/logout',[Users::class,'logout']);

