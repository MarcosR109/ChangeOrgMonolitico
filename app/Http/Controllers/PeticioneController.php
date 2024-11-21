<?php

namespace App\Http\Controllers;

use App\Models\Peticione;
use App\Models\User;
use Illuminate\Http\Request;

class PeticioneController extends Controller
{
    public function index()
    {
        $content = Peticione::all();
        $users = User::all();
        return view('peticiones.index', compact('content', 'users'));
    }

    /*Route::controller(\App\Http\Controllers\PeticioneController::class)->group(function () {
    Route::get('peticiones/index', 'index')->name('peticiones.index');
    Route::get('mispeticiones', 'listMine')->name('peticiones.mine');
    Route::get('peticionesfirmadas', 'peticionesFirmadas')->name('peticiones.peticionesfirmadas');
    Route::get('peticiones/{id}', 'show')->name('peticiones.show');
    Route::get('peticion/add', 'create')->name('peticiones.create');
    Route::post('peticion', 'store')->name('peticiones.store');
    Route::delete('peticiones/{id}', 'delete')->name('peticiones.delete');
    Route::put('peticiones/{id}', 'update')->name('peticiones.update');
    Route::post('peticiones/firmar/{id}', 'firmar')->name('peticiones.firmar');
    Route::get('peticiones/edit/{id}', 'update')->name('peticiones.edit');
});
*/

    public function listMine()
    {
        $id = 1;
        $content = Peticione::query()->where('user_id', '=', $id)->get();
        if ($content) {
            return view('peticiones.mine', compact('content'));
        } else {
            $content = Peticione::all();
            return view('peticiones.index', compact('content'));
        }
    }

    public function peticionesFirmadas()
    {
        $content = Peticione::query()->where('estado', '=', 'aceptada')->get();
        return view('peticiones.firmadas', compact('content'));
    }

    public function create()
    {
        return view('peticiones.create');
    }

    public function update(Request $request)
    {
    }

    public function store(Request $request)
    {
    }

    public function delete(Peticione $peticione)
    {
    }
}
