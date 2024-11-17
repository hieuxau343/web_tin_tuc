<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('backend.auth.login');
    }
    public function login(AuthRequest $request)
    {
        $crdentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')

        ];
        if (
            Auth::attempt($crdentials)
        ) {
            return redirect()->route('dashboard.index');
        } else
            return redirect()->route('auth.admin')->with('error', "Email hoặc mật khẩu không chính xác");
    }
}
