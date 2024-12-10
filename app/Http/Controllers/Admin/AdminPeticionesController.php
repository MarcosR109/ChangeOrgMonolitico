<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminPeticionesController extends Controller
{
    public function index(){
        return view('admin.home');
    }
}
