<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }
    
    public function login(Request $request)
    {
        if(Auth::attempt(['username' => $request->input('username'),
        'password' => $request->input('password')])){
            return redirect('/home');
        }
        return redirect('/')->with('error','User atau password salah');
    }

    public function home()
    {
        $data['user'] = Auth::user();
        switch(Auth::user()->level){
            case 'admin':
                return view('pages.admin.index', $data);
                break;
            case 'kajur':
                return view('pages.guru.index', $data);
                break;
            case 'user':
                return view('pages.proktor.index', $data);
                break;
            default:
                Auth::logout();
                return redirect('/')->with('error','User tidak dikenali');
        }
    }

    public function logout(Request $request)
    {
        $user = Auth::User();
        Auth::logout();
    }
}
