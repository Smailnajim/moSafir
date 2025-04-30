<?php

namespace App\Repositories\Eloquent;

use App\Models\Reaction;
use App\Repositories\Interfaces\IReaction;

class ReactionRepository extends FloorRepository implements IReaction{
    
    public function __construct(Reaction $reaction)
    {
        parent::__construct($reaction);
    }

    public function alredyReactioned(int $user_id, int $post_id){
        $reaction = $this->model
        ->where('user_id', '=', $user_id)
        ->where('post_id', '=', $post_id)
        ->get();

        if(count($reaction) != 0)
            return True;
        return false;
    }
}