<?php

use App\Http\Controllers\Api\User\ApiUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(ApiUserController::class)
->prefix("user")
->group(function () {
    Route::get("/", "index");
    Route::get("/{id}", "show");
    Route::post("/", "store");
    Route::put("/{id}", "update");
    Route::delete("/{id}", "destroy");
});
