<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\IUser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userR;
    public function __construct(IUser $userR)
    {
        $this->userR = $userR;
    }
    public function aboutus(){
        return view('clinet.aboutus');
    }
    public function test(){
        return view('clinet.test');
    }
    public function psttest(Request $request){
        $
        dd($request);    
    }
}
