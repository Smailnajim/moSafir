<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\IPost;
use App\Repositories\Interfaces\IReaction;
use Illuminate\Http\Request;

class ReactionController extends Controller
{
    private IReaction $reactionR;
    private IPost $postR;

    public function __construct(IReaction $reactionR, IPost $postR)
    {
        $this->reactionR = $reactionR;
        $this->postR = $postR;
    }

    public function like(int $id){
        $post = $this->postR->getById($id);
        if($post === null)
            return back()->with('status', 'Post not funde!');
        $this->reactionR->
    }

    public function alredyReactioned(int $user_id, int $post_id){
        
    }
}
