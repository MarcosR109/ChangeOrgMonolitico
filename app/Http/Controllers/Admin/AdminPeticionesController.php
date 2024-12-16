<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\File;
use App\Models\Peticione;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminPeticionesController extends Controller
{

    /*
    Route::get('admin', 'index')->name('admin.home');
    Route::get('admin/peticiones/index', 'index')->name('adminpeticiones.index');
    Route::get('admin/peticiones/{id}', 'show')->name('adminpeticiones.show');
    Route::get('admin/peticion/add', 'create')->name('adminpeticiones.create');
    Route::get('admin/peticiones/edit/{id}', 'edit')->name('adminpeticiones.edit');
    Route::post('admin/peticiones', 'store')->name('adminpeticiones.store');
    Route::delete('admin/peticiones/{id}', 'delete')->name('adminpeticiones.delete');
    Route::put('admin/peticiones/{id}', 'update')->name('adminpeticiones.update');
    Route::put('admin/peticiones/estado/{id}', 'cambiarEstado')->name('adminpeticiones.estado');
    */
    public function index()
    {
        $content = Peticione::paginate(10);
        return view('admin.peticiones.index', compact('content'));
    }

    public
    function show($id)
    {
        //$content = Peticione::query()->where('id', '=', $id)->get()->first();
        try {
            $content = Peticione::findOrFail($id);
            return view('admin.peticiones.show', compact('content'));
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
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
            return redirect('admin/peticiones/index');
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }

    public function delete($id)
    {
        try {
            $peticion = Peticione::findOrFail($id);
            if ($peticion->firmas()) {
                $peticion->firmas()->delete();
            }
            if ($peticion->file) {
                $peticion->file->delete();
            }
            $peticion->delete();
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function create(){
        $categorias = Categoria::all();
        return view('admin.peticiones.add',compact('categorias'));
    }
    public
    function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'destinatario' => 'required',
            'categoria' => 'required',
            'foto' => 'required',
        ]);
        $input = $request->all();
        try {
            $category = Categoria::query()->findOrFail($input['categoria']);
            $user = Auth::user(); //asociarlo al usuario authenticado
            $peticion = new Peticione($input);
            $peticion->categoria()->associate($category);
            $peticion->user()->associate($user);
            $peticion->firmantes = 0;
            $peticion->estado = 'pendiente';
            $res = $peticion->save();
            if ($res) {
                $res_file = $this->fileUpload($request, $peticion->id);
                if ($res_file) {
                    return redirect('admin/peticiones/index');
                }
                return back()->withError('Error creando la peticion')->withInput();
            }
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }


    public
    function fileUpload(Request $req, $peticione_id = null)
    {
        $file = $req->file('foto');
        $fileModel = new File;
        $fileModel->peticione_id = $peticione_id;
        if ($req->file('foto')) {
            //return $req->file('file');

            $filename = $fileName = time() . '_' . $file->getClientOriginalName();
            //      Storage::put($filename, file_get_contents($req->file('file')->getRealPath()));
            $file->move('peticiones', $filename);

            //  Storage::put($filename, file_get_contents($request->file('file')->getRealPath()));
            //   $file->move('storage/', $name);


            //$filePath = $req->file('file')->storeAs('/peticiones', $fileName, 'local');
            //    $filePath = $req->file('file')->storeAs('/peticiones', $fileName, 'local');
            // return $filePath;
            $fileModel->name = $filename;
            $fileModel->file_path = $filename;
            $res = $fileModel->save();
            return $fileModel;
            if ($res) {
                return 0;
            } else {
                return 1;
            }
        }
        return 1;
    }
    public function cambiarEstado($id)
    {
        try {
            $peticion = Peticione::findOrFail($id);
            $peticion->estado = "aceptada";
            $peticion->save();
            return back();
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }
}
