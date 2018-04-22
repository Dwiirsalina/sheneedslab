<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Model\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('user.signin');
    }
    
    public function indexRegister()
    {
        return view('user.signup');
    }
    
    public function register(Request $request)
    {
        try {
            $isDuplicate = $this->checkUsername($request->username);
            if ($isDuplicate) {
                return redirect('/register')->with('error','NRP sudah pernah terdaftar !');
            }

            $user = new User();
            $user->username = $request->username;
            $user->password = bcrypt($request->password);
            $user->role_id = 3;
            $user->name = $request->name;
            $user->no_hp = $request->no_hp;
            $user->email = $request->email;
            $user->line = $request->line;
            $user->save();
            
        } catch (Exception $e) {
            return json_encode([
                'status' => 500,
                'error' => $e
            ]);
        }

        return redirect('/login');
    }

    protected function checkUsername($username)
    {
        $user = User::where('username',$username)->get();
        if ($user==null) {
            return TRUE;
        }
        else {
           return FALSE;
        }
    }

    public function login(Request $request)
    {
        if(Auth::attempt(['username' => $request->input('username'),
        'password' => $request->input('password')])){
            return redirect('/home');
        }
        return redirect('/login')->with('error','Username atau password salah');
    }

    public function home()
    {
        $data['user'] = Auth::user();
        // dd(Auth::user());
        switch(Auth::user()->role_id){
            case 2:
                return redirect('/admin/dashboard');
                break;
            // case 'kajur':
            //     return view('pages.guru.index', $data);
            //     break;
            case 3:
                return redirect('/user/dashboard');
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
        return redirect('/login')->with('error','Logout berhasil');
    }
}
