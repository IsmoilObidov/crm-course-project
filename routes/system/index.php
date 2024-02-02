<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('backend');
});


// Route::get('/save_account', [ 'save_account'])->name('/save_account');

Route::get('/admins', function () {
    return view('system.admins', ['admins' => User::where('role_id', 2)->get()]);
})->name('admins');

Route::view('/sys_dash', 'system/system_dash')->name('system_dash');

Route::get('/staff/edit_staff/{id}', [UserController::class, 'edit_staff'])->name('system.edit_staff');

Route::post('/staff/edit_save_create/{id}', [UserController::class, 'edit_save_create'])->name('system.edit_save_create');

Route::post('/create_admin', [UserController::class, 'create_admin'])->name('create_admin');

Route::get('/admin_staff/{id}', [StaffController::class, 'system_admin_staff'])->name('system.admin_staff');

Route::post('/change_block_status', [StaffController::class, 'change_block_status'])->name('system.change_block_status');
