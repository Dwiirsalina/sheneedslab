<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    
    public function register(Request $request)
    {
        try {
            $user = new User();
            $user->username = $request->username;
            $user->password = bcrypt($request->password);
            // $user->role = 
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

        return view('login');
    }
}
