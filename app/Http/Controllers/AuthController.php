<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\IUser;
use App\Repositories\Interfaces\IRole;
use App\Repositories\Interfaces\IStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{   
    private IUser $userRep;
    private IRole $roleRep;
    private IStatus $statusR;

    public function __construct(IUser $userR, IRole $roleR, IStatus $statusR)
    {
        $this->userRep = $userR;
        $this->roleRep = $roleR;
        $this->statusR = $statusR;
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) 
        {
            $user = Auth::user();
            // dd($user->role->name);
            
            if ($user->role->name == 'Client') 
                return redirect('/home/morocoo')->with('status', 'welcom ' . $user->last_name);
            else if ($user->role->name == 'Admin') 
                return redirect('admin/index')->with('status', 'welcom Admin');
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
            'name' => 'required|unique:profiles',
            'password' => 'required',
            'confirm_password' => 'required',
        ]);
        if($this->userRep->getByEmail($request->email) !== null)
            return back()->with('status', 'email existe');

        $user = $this->userRep->registerUser([
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'password' => Hash::make($request->password),
            'role_id' => $this->roleRep->getByCulomn('name', 'Client')->id,
            'status_id' => $this->statusR->idOfActiv(),
        ], $request->name);
        
        
        Auth::login($user);
        return redirect('/home/morocoo')->with('status',  'welcom ' . $user->last_name);
    }
    public function registerView() {
        return view('auth.register');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/home/morroco');
    }
}
