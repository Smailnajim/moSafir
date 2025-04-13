<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if($user || $user->password == $request->password){
            $request->session()->put('loginId', $user->id);
            if($user->role_id == 1)
            return view('admin.index');
            return view('client.index');
        }
        back()->with('status', 'email or password unvalid');
    }
    public function loginView() {
        return view('auth.login');
    }


    public function register(Request $request){
        $request->validate([
            'email' => 'required|email',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required',
        ]);

        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->password   = $request->password;
        $user->email      = $request->email;
        $user->role_id    = Role::where('name', 'Client')->first()->id;
        $user->save();
        redirect('/home');
    }
    public function registerView() {
        return view('auth.register');
    }

    public function logout() {
        $key = session()->pull('loginId');
        dd($key);
    }
}
