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
}
