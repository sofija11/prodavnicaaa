<?php

namespace App\Http\Controllers;

use App\Providers\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = UserService::getAllUsers();
        return view('users', ['users' => $users]);
    }

    public function registerOrLogin() {
        if (auth()->user() === null) {
            return view('auth.register');
        } else {
            return route('categories.index');
        }
    }
}
