<?php

use App\Http\Controllers\RegistratorController;
use Illuminate\Support\Facades\Route;

Route::get("/", [RegistratorController::class, "index"])->name("registrator.welcome");
Route::get("/teachers", [RegistratorController::class, "view_teachers"])->name("registrator.teachers");


Route::get('/staff/edit_staff/{id}', [RegistratorController::class, 'edit_staff'])->name('registrator.edit_staff');

Route::post('/staff/edit_save_create/{id}', [RegistratorController::class, 'edit_save_create'])->name('registrator.edit_save_create');


Route::get('view_pupils/{id}',[RegistratorController::class,'view_pupils'])->name('registrator.view_groups');