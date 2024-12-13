<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\PagesController::class, 'home'])->name('home');

Route::get('/users/firmas', [\App\Http\Controllers\UserController::class, 'peticionesFirmadas'])->middleware('auth');
Route::controller(\App\Http\Controllers\PeticioneController::class)->group(function () {
    Route::get('peticiones/index', 'index')->name('peticiones.index');
    Route::get('mispeticiones', 'listMine')->name('peticiones.mine');
    Route::get('peticionesfirmadas', 'peticionesFirmadas')->name('peticiones.peticionesfirmadas');
    Route::get('peticiones/{id}', 'show')->name('peticiones.show');
    Route::get('peticion/add', 'create')->name('peticiones.create');
    Route::post('peticion', 'store')->name('peticiones.store');
    Route::delete('peticiones/{id}', 'delete')->name('peticiones.delete');
    Route::put('peticiones/{id}', 'update')->name('peticiones.update');
    Route::post('peticiones/firmar/{id}', 'firmar')->name('peticiones.firmar');
    Route::get('peticiones/edit/{id}', 'edit')->name('peticiones.edit');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('admin')->controller(\App\Http\Controllers\Admin\AdminPeticionesController::class)->group(function () {
    Route::get('admin', 'index')->name('admin.home');
    Route::get('admin/peticiones/index', 'index')->name('adminpeticiones.index');
    Route::get('admin/peticiones/{id}', 'show')->name('adminpeticiones.show');
    Route::get('admin/peticion/add', 'create')->name('adminpeticiones.create');
    Route::get('admin/peticiones/edit/{id}', 'edit')->name('adminpeticiones.edit');
    Route::post('admin/peticiones', 'store')->name('adminpeticiones.store');
    Route::delete('admin/peticiones/{id}', 'delete')->name('adminpeticiones.delete');
    Route::put('admin/peticiones/{id}', 'update')->name('adminpeticiones.update');
    Route::put('admin/peticiones/estado/{id}', 'cambiarEstado')->name('adminpeticiones.estado');
});

Route::middleware('admin')->controller(\App\Http\Controllers\Admin\AdminUsersController::class)->group(function () {
    //Route::get('admin', 'index')->name('admin.home');
    Route::get('admin/users/index', 'index')->name('adminusers.index');
    Route::get('admin/users/{id}', 'show')->name('adminusers.show');
    Route::get('admin/user/add', 'create')->name('adminusers.create');
    Route::get('admin/users/edit/{id}', 'edit')->name('adminusers.edit');
    Route::post('admin/user', 'store')->name('adminusers.store');
    Route::delete('admin/user/{id}', 'delete')->name('adminusers.delete');
});
//follow the same for categories and users


require __DIR__ . '/auth.php';

