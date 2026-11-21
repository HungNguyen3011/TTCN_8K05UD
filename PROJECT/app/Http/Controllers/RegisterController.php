<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'HOTEN' => ['required', 'string', 'max:100'],
            'EMAIL' => ['required', 'email', 'max:150', 'unique:nguoidung,EMAIL'],
            'MATKHAU' => ['required', 'string', 'confirmed', Password::min(8)],
        ], [
            'HOTEN.required' => 'Vui lòng nhập họ tên.',
            'EMAIL.required' => 'Vui lòng nhập email.',
            'EMAIL.email' => 'Email chưa đúng định dạng.',
            'EMAIL.unique' => 'Email này đã được đăng ký.',
            'MATKHAU.confirmed' => 'Mật khẩu không khớp.',
            'MATKHAU.min' => 'Mật khẩu cần có ít nhất 8 ký tự.',
        ]);

        $user = User::create([
            'HOTEN' => $data['HOTEN'],
            'EMAIL' => $data['EMAIL'],
            'MATKHAU' => $data['MATKHAU'],
            'VAITRO' => 'member',
            'TRANGTHAI' => 'active',
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('home');
    }
}