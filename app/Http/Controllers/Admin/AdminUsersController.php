<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Peticione;
use App\Models\User;
use Illuminate\Http\Request;

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
            if($usuario->peticiones()->count()>0){
               return back()->withErrors('El usuario ha tiene peticiones asociadas.');
            }
            if($usuario->firmas()->count()>0){
                return back()->withErrors('El usuario ha firmado peticiones.');
            }
            $usuario->delete();
            return back();
        }catch (\Exception $e){
            return back()->with('error','No se pudo eliminar el usuario');
        }
    }
    public function edit($id){
        $content = User::findOrFail($id);
        return view('admin.users.edit',compact('content'));
    }
    public function update(Request $request)
    {
      $input =  $request->all();
        try {
            $user = User::findOrFail($request->id);
            $input=$request->all();
            $user->name = $input['nombre'];
            $user->save();
            return redirect('admin/users/index');
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
}
