<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontendController\loginController;

Route::group(['prefix' => '/'], function() {

    Route::get("/",[loginController::class,"login"])->name("frontend.login");

    Route::post("/loginPost",[loginController::class,"loginPost"])->name("frontend.loginPost");

    Route::get("/logout",[loginController::class,"logout"])->name("logout");
});