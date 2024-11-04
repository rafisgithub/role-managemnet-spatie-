<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('permissions', PermissionController::class);
Route::get('/permissions/{id}/delete', [PermissionController::class, 'destroy'])->name('permissions.destroy');


Route::resource('roles', RoleController::class);
Route::get('/roles/{id}/delete', [RoleController::class, 'destroy'])->name('roles.destroy');
Route::get('/roles/{id}/add-permission', [RoleController::class, 'addPermissionToRole'])->name('roles.add-permission');
Route::post('/roles/{id}/update-permission', [RoleController::class, 'updatePermissionToRole'])->name('roles.update-permission');


Route::resource('users', UserController::class);


require __DIR__.'/auth.php';
