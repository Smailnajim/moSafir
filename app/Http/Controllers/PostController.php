<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\IPost;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private  $postR;

    public function __construct(IPost $PostRepository)
    {
        $this->postR = $PostRepository;
    }

    public function render(){
        $posts = $this->postR->randomTenPosts();
        return view('clinet.Community');
    }
}
