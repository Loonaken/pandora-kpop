<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UserInformationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

    }

    public function index()
    {
        $users = User::orderBy('created_at', 'asc')->get();

        return view ('admin.user.index', compact('users'));

    }
}
