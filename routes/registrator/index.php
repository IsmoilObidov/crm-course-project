<?php

use App\Http\Controllers\RegistratorController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

Route::get("/", [RegistratorController::class, "index"])->name("registrator.welcome");

Route::get("/teachers", [RegistratorController::class, "view_teachers"])->name("registrator.teachers");

Route::get('/staff/edit_staff/{id}', [RegistratorController::class, 'edit_staff'])->name('registrator.edit_staff');

Route::post('/staff/edit_save_create/{id}', [RegistratorController::class, 'edit_save_create'])->name('registrator.edit_save_create');

Route::get('view_groups/{id}', [RegistratorController::class, 'view_groups'])->name('registrator.view_groups');

Route::post('/create_group/{id}', [RegistratorController::class, 'create_group'])->name('registrator.create_group');

Route::get('/{id}/pupil', [RegistratorController::class, 'pupil'])->name('registrator.teacher.pupil');

Route::post('/save_pupil', [RegistratorController::class, 'save_pupil'])->name('registrator.save_pupil');

Route::get('/pupil_data/{id}', [RegistratorController::class, 'get_pupil'])->name('teacher.pupil_data');

Route::get('/delete_pupil/{id}', [StaffController::class, 'delete_pupil'])->name('registrator.delete_pupil');

Route::get('/edit_pupil/{id}', [RegistratorController::class, 'edit_pupil'])->name('registrator.edit_pupil');

Route::post('/edit_save_pupil/{id}', [RegistratorController::class, 'edit_save_pupil'])->name('registrator.edit_save_pupil');
