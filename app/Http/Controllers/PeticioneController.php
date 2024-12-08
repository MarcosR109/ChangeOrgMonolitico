<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\File;
use App\Models\Peticione;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class PeticioneController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Request $request)
    {
        //$categoriaId = $request->input('categoria');
        $content = Peticione::all();
        return view('peticiones.index', compact('content'));
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
    public function delete($id = null)
    {
        try {
            $id = Peticione::query()->findOrFail($id);
            $id->file->delete();
            $id->delete();
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
        $categoria = Categoria::all();
        $content = Peticione::all();
        return redirect()->route('peticiones.index', compact('content', 'categoria'));
    }

    public function firmar(Request $request, $id)
    {
        try {
            $peticion = Peticione::findOrFail($id);
            $user = Auth::user();
            $firmas = $peticion->firmas;
            foreach ($firmas as $firma) {
                if ($firma->id == $user->id) {
                    return back()->withError("Ya has firmado esta petición")->withInput();
                }
            }
            $user_id = [$user->id];
            $peticion->firmas()->attach($user_id);
            $peticion->firmantes = $peticion->firmantes + 1;
            $peticion->save();
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return redirect()->back();
    }


    public
    function listMine()
    {
        try {
            $id = Auth::id();
            $content = Peticione::query()->where('user_id', '=', $id)->get();
            if ($content) {
                return view('peticiones.listMine', compact('content'));
            } else {
                $content = Peticione::all();
                return view('peticiones.index', compact('content'));
            }
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
    }

    public
    function show($id)
    {
        //$content = Peticione::query()->where('id', '=', $id)->get()->first();
        try {
            $content = Peticione::findOrFail($id);
            return view('peticiones.show', compact('content'));
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
    }

    public
    function peticionesFirmadas(Request $request)
    {
        try {
            $id = Auth::id();
            $usuario = User::findOrFail($id);
            $content = $usuario->firmas;
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('peticiones.peticionesFirmadas', compact('content'));
    }

    public
    function create()
    {
        $categorias = Categoria::orderBy('nombre', 'asc')->get();
        //$content=[];
        return view('peticiones.create', compact('categorias'));
    }

    /*public
    function edit($request){
        $categorias = Categoria::orderBy('nombre','asc')->get();
        $content = Peticione::query()->findOrFail($request);
        var_dump($content);
        return view('peticiones.create',compact('categorias','content'));
    }

    public
    function update(Request $request)
    {
        $categorias = Categoria::orderBy('nombre','asc')->get();
        $content = Peticione::query()->findOrFail($request);
    }*/

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
                    return redirect('/mispeticiones');
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
}
