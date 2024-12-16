<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peticione;
use App\Models\User;

class AdminUsersController extends Controller
{
    public function index()
    {
        $content = User::paginate(10);
        return view('admin.users.index', compact('content'));
    }

    public function show($id)
    {
        $content = User::findOrFail($id);
        return view('admin.users.show', compact('content'));
    }

    public function delete($id)
    {
        try {
            $usuario = User::findOrFail($id);
            if($usuario->peticiones()){
               return back()->withErrors('El usuario ha firmado peticiones');
            }
            $usuario->delete();
            return back();
        }catch (\Exception $e){
            return back()->with('error','No se pudo eliminar el usuario');
        }
    }
}
