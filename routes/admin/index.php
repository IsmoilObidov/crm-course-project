<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin/admin_dash');
});

Route::get('/staff', [StaffController::class, 'index'])->name('admin.staff');
Route::post('/staff/create', [StaffController::class, 'store'])->name('admin.create_user');

Route::get('/staff/edit_staff/{id}', [StaffController::class, 'edit_staff'])->name('admin.edit_staff');

Route::post('/staff/edit_save_create/{id}', [StaffController::class, 'edit_save_create'])->name('admin.edit_save_create');

Route::get('/subjects', [AdminController::class,'view_subjects'])->name('admin.subjects');
