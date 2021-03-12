<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return response()->json(Auth::user(), 200);
        }

        throw ValidationException::withMessages([
            'password' => ['The provided credentials are incorrect.']
        ]);
    }

    public function logout()
    {
        Auth::logout();
    }
}
