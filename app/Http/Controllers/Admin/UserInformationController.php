<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Image;
use App\Models\Song;
use App\Models\Group;
use App\Models\Emotion;
use App\Models\Period;


class UserInformationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

    }

    public function dashboard()
    {
        $users = User::get();
        $images = Image::get();
        $songs = Song::get();
        $emotions = Emotion::get();
        $periods = Period::get();
        $groups = Group::get();

        return view ('admin.dashboard', compact('users', 'images', 'songs','emotions', 'periods', 'groups'));

    }

    public function index()
    {
        $users = User::orderBy('created_at', 'asc')->get();

        return view ('admin.user.index', compact('users'));

    }
}
