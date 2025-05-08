<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\FloorRepository;
use App\Repositories\Interfaces\IUser;
use App\Repositories\Interfaces\IRole;

class AuthController extends Controller
{   
    private $userRep;
    private $roleRep;

    public function __construct(IUser $userR, IRole $roleR)
    {
        $this->userRep = $userR;
        $this->roleRep = $roleR;
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = $this->userRep->getByEmail($request->email);
        if($user && ($user->password == $request->password)){
            $request->session()->put('loginId', $user->id);
            if($user->role_id == 1)
                return redirect("/admin");
            
            return redirect()->route('home');
        }
        return back()->with('status', 'email or password unvalid');
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
            'confirm_password' => 'required',
        ]);

        $data = $request->all();
        $data["role_id"] = $this->roleRep->getByCulomn('name', 'Client')->id;
        $this->userRep->create($data);
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
