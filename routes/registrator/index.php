<?php

use App\Http\Controllers\RegistratorController;
use Illuminate\Support\Facades\Route;

Route::get("/", [RegistratorController::class, "index"])->name("registrator.welcome");
Route::get("/teachers", [RegistratorController::class, "view_teachers"])->name("registrator.teachers");
