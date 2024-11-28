<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Peticione;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
    public function delete(Peticione $id)
    {
        $this->delete($id);
    }

    public function firmar($peticioneId)
    {
        $userId = 2;
        $peticione = Peticione::query()->findOrFail($peticioneId);
        $peticione->firmantes = $peticione->firmantes + 1;
        $peticione->save();
        //   var_dump($peticione->firmantes);
        $user = User::query()->find($userId);
        $user->firmas()->attach($peticione->id);
        $user->save();
        return response()->json(['Message' => 'Petición firmada', 'Data' => $peticione]);
    }

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

    public function show($id)
    {
        $content = Peticione::query()->where('id', '=', $id)->get()->first();
        return view('peticiones.show', compact('content'));
    }

    public function peticionesFirmadas(Request $request)
    {
        try {
            $id = Auth::id();
            $usuario = User::findOrFail($id);
            $peticiones = $usuario->firmas;
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('peticiones.index', compact('peticiones'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('peticiones.create', compact('categorias'));
    }

    public function update(Request $request)
    {
    }

    public function store(Request $request)
    {
        try {
            $userid = 1;
            $categoria = 1;
            $estado = "pendiente";
            $firmantes = 0;
            $validator = Validator::make($request->all(), [
                'titulo' => 'string|required',
                'descripcion' => 'string|required',
                'destinatario' => 'string|required',
            ]);
            $validator->validate();
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
        $peticion = new Peticione();
        $peticion['titulo'] = $request->get('titulo');
        $peticion['user_id'] = $userid;
        $peticion['categoria_id'] = $categoria;
        $peticion['estado'] = $estado;
        $peticion['descripcion'] = $request->get('descripcion');
        $peticion['destinatario'] = $request->get('destinatario');
        $peticion['firmantes'] = $firmantes;
        $peticion->save();
        $content = $peticion;
        return view('peticiones.show', compact('content'));
    }
}
