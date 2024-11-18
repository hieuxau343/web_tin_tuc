<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Flasher\Prime\FlasherInterface;


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
        if (Auth::attempt($crdentials)) {
            flash()->addSuccess("Đăng nhập thành công");

            return redirect()->route('dashboard.index');
        } else {


            flash()->addError("Email hoặc mật khẩu không chính xác");
            return view('backend.auth.login');
        }
    }
}
