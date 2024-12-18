<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Peticione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCategoriasController extends Controller
{
    public function index()
    {
        $content = Categoria::paginate(10);
        return view('admin.categorias.index', compact('content'));
    }

    public
    function show($id)
    {
        try {
            $content = Categoria::findOrFail($id);
            return view('admin.categorias.show', compact('content'));
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $content = Categoria::findOrFail($id);
        return view('admin.categorias.edit', compact('content'));
    }

    public function update(Request $request)
    {
        $input = $request->all();
        try {
            $categoria = Categoria::findOrFail($request->id);
            $categoria->nombre = $input['nombre'];
            $categoria->save();
            return redirect('admin/categorias/index');
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }

    public function delete($id)
    {
        try {
            $categoria = Categoria::findOrFail($id);
            if ($categoria->peticiones()->count() > 0) {
                return back()->withErrors('La categoría tiene peticiones asociadas.');
            }
            $categoria->delete();
            return redirect('admin/categorias/index');
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function create()
    {
        return view('admin.categorias.add');
    }

    public
    function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:255',
        ]);
        $input = $request['nombre'];
        try {
            $categorias = Categoria::all();
            foreach ($categorias as $categoria) {
                if ($categoria->nombre == $input) {
                    return back()->withErrors('La categoría ya existe');
                }
            }
            $category = new Categoria();
            $category->nombre = $input;
            $category->save();
            return redirect('admin/categorias/index');
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
}
