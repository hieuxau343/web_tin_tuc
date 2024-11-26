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

    // public function index()
    // {

    //     return view('backend.auth.login&register');
    // }
    // public function login(AuthRequest $request)
    // {
    //     $crdentials = [
    //         'email' => $request->input('email'),
    //         'password' => $request->input('password')

    //     ];
    //     // Đã mã hóa sau khi qua attempt
    //     // Đúng thì vào dashboard có hiện thông báo flashcard
    //     if (Auth::attempt($crdentials)) {
    //         if (Auth::user()->role === 'ADMIN') {
    //             flash()->addSuccess("Đăng nhập thành công");

    //             return redirect()->route('dashboard.index');
    //         }


    //     } else {  //Ko đúng thì quay vẫn ở lại trang đăng nhập và hiên thông báo


    //         flash()->addError("Email hoặc mật khẩu không chính xác");
    //         return view('backend.auth.login&register');
    //     }
    // }

    // public function logout(Request $request)
    // {
    //     Auth::logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();
    //     return redirect()->route('auth.admin');

    // }
    public function index()
    {
        return view('backend.auth.login&register');
    }

    // Xử lý đăng nhập
    public function login(AuthRequest $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if (Auth::attempt($credentials)) {
            flash()->addSuccess("Đăng nhập thành công");
            return redirect()->route('dashboard.index');
        } else {
            flash()->addError("Email hoặc mật khẩu không chính xác");
            return redirect()->route('auth.login');
        }
    }

    // Hiển thị form đăng ký
    public function showRegistrationForm()
    {
        return view('backend.auth.login&register');
    }

    // Xử lý đăng ký
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',  // Xác nhận mật khẩu
        ]);

        // Tạo người dùng mới
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Đăng nhập người dùng mới và chuyển hướng đến dashboard
        Auth::login($user);
        flash()->addSuccess("Đăng ký thành công, bạn đã được đăng nhập!");
        return redirect()->route('dashboard.index');
    }

    // Xử lý logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login');
    }
}
