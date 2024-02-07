<?php

use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('backend');
});
Route::get('/groups', [StaffController::class, 'groups'])->name('teacher.groups');
Route::post('/create_group', [StaffController::class, 'create_group'])->name('teacher.create_group');

Route::get('/{id}/pupil', [StaffController::class, 'pupil'])->name('teacher.pupil');
Route::post('/create_pupil', [StaffController::class, 'create_pupil'])->name('teacher.create_pupil');

Route::post('/save_pupil', [StaffController::class, 'save_pupil'])->name('teacher.save_pupil');

Route::get('/delete_pupil/{id}', [StaffController::class, 'delete_pupil'])->name('delete_pupil');


Route::get('/edit_pupil/{id}', [StaffController::class, 'edit_pupil'])->name('teacher.edit_pupil');
Route::post('/edit_save_pupil/{id}', [StaffController::class, 'edit_save_pupil'])->name('teacher.edit_save_pupil');


Route::get('/pupil_data/{id}', [StaffController::class, 'get_pupil'])->name('teacher.pupil_data');