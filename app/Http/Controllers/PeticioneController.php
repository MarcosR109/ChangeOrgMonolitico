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
}
