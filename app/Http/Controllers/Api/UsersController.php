<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function login(Request $request)
    {
        if (!$this->checkLogin($request)) {
            return response(['login' => ['Email o contraseña incorrectos']], 401);
        }

        return Auth::user();
    }

    private function checkLogin($request)
    {
        return Auth::guard()->attempt($request->only(['email', 'password']));
    }
}
