<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create()
    {
        return view('login');
    }
    public function store(Request $request){
        $credentials = $request->validate([
            'EMAIL' => ['required', 'email', 'max:150'],
            'MATKHAU' => ['required','string'],
        ],[
            'EMAIL.required' => 'Vui lòng nhập email',
            'EMAIL.email' => 'Email không hợp lệ',
            'MATKHAU.required' => 'Vui lòng nhập mật khẩu',
        ]);
        
        $loggedIn = auth()->attempt([
            'EMAIL' => $credentials['EMAIL'],
            'password' => $credentials['MATKHAU'],
            'TRANGTHAI' => 'active',
        ]);
         if (! $loggedIn) {
            return back()
                ->withErrors(['EMAIL' => 'Email hoặc mật khẩu không đúng, hoặc tài khoản không hoạt động.'])
                ->onlyInput('EMAIL');
        }

        $request->session()->regenerate();

        return redirect()->intended(route('home'));
    }

    public function destroy(Request $request)
    {
    auth()->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('home');
    }
}
