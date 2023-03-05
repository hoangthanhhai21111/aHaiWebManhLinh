<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class login extends Controller
{
    function login(){
        if (Auth::check()) {
            return redirect()->route('users.index');
        } else {
            return view('backend.login.login');
        }
    }
    function loginProcessing(Request $request){
        $data=[
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($data)) {
            return redirect()->route('users.index');
        } else {
            $kq='tài khoản, hoặc mật khẩu không đúng';
            return redirect()->route('login')->with($kq);
        }
    }
    function logout(Request $request){
        $request->session()->flush();
        return redirect()->route('login');
    }
}
