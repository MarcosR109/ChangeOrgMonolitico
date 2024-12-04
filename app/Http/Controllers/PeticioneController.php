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
        $categoriaId = $request->input('categoria');
        if ($categoriaId) {
            $content = Peticione::query()->where('categoria_id', '=', $categoriaId)->get();
        } else {
            $content = Peticione::all();
        }
        $categoria = Categoria::all();
        return view('peticiones.index', compact('content', 'categoria'));
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
        $userId = Auth::id();
        $peticione = Peticione::query()->findOrFail($peticioneId);
        $user = User::query()->find($userId);
        $categoria = Categoria::all();
        if (!$user->firmas()->where("peticione_id", "=", $peticione->id)->first()) {
            $user->firmas()->attach($peticione->id);
            $user->save();
            $content = peticione::all();
            $peticione->firmantes = $peticione->firmantes + 1;
            $peticione->save();
            return view('peticiones.index', compact('content', "categoria"));
        }
        $error = "Petición ya firmada";
        $content = $peticione->all();
        return back()->withErrors($error)->withInput();


    }


    public
    function listMine()
    {
        try {
            $id = Auth::id();
            $categoria = Categoria::all();
            $content = Peticione::query()->where('user_id', '=', $id)->get();
            if ($content) {

                return view('peticiones.index', compact('content', "categoria"));
            } else {
                $content = Peticione::all();

                return view('peticiones.index', compact('content', "categoria"));
            }
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
    }

    public
    function show($id)
    {
        $content = Peticione::query()->where('id', '=', $id)->get()->first();
        return view('peticiones.show', compact('content'));
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
        $categoria = Categoria::all();
        return view('peticiones.index', compact('content', 'categoria'));
    }

    public
    function create()
    {
        $categorias = Categoria::orderBy('nombre', 'asc')->get();
        return view('peticiones.create', compact('categorias'));
    }

    public
    function update(Request $request)
    {
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
