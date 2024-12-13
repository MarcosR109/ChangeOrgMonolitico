<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Peticione;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminPeticionesController extends Controller
{
    public function index()
    {
        $content = Peticione::paginate(10);
        return view('admin.peticiones.index', compact('content'));
    }

    public function delete($id)
    {
        try {
            $peticion = Peticione::findOrFail($id);
            if ($peticion->firmas()->count() > 0) {
                $peticion->firmas()->detach();
            }
            if ($peticion->file) {
                $peticion->file->delete();
            }
            $peticion->delete();
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
        $content = Peticione::paginate(10);
        return redirect()->route('admin.home', compact('content'));
    }

    /* Route::get('admin', 'index')->name('admin.home');
    Route::get('admin/peticiones/index', 'index')->name('adminpeticiones.index');
    Route::get('admin/peticiones/{id}', 'show')->name('adminpeticiones.show');
    Route::get('admin/peticion/add', 'create')->name('adminpeticiones.create');
    Route::get('admin/peticiones/edit/{id}', 'edit')->name('adminpeticiones.edit');
    Route::post('admin/peticiones', 'store')->name('adminpeticiones.store');
    Route::delete('admin/peticiones/{id}', 'delete')->name('adminpeticiones.delete');
    Route::put('admin/peticiones/{id}', 'update')->name('adminpeticiones.update');
    Route::put('admin/peticiones/estado/{id}', 'cambiarEstado')->name('adminpeticiones.estado');*/
    public function cambiarEstado($id)
    {
        $peticion = Peticione::findOrFail($id);
        $peticion->estado = "aceptada";
        $peticion->save();
        return $this->index();
    }

    public function edit($id)
    {
        $content = Peticione::findOrFail($id);
        $categorias = Categoria::all();
        return view('admin.peticiones.edit', compact('content', 'categorias'));
    }

    public function update(Request $request)
    {

        $this->validate($request, [
            'descripcion' => 'required',
            'destinatario' => 'required',
        ]);
        $input = $request->all();
        try {
            $user = Auth::user();
            $peticion = Peticione::findOrFail($request->id);
            $peticion->descripcion = $input['descripcion'];
            $peticion->destinatario = $input['destinatario'];
            $peticion->save();
            return redirect('/mispeticiones');
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
}
