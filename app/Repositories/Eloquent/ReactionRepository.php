<?php

namespace App\Repositories\Eloquent;

use App\Models\Reaction;
use App\Repositories\Interfaces\IReaction;

class ReactionRepository extends FloorRepository implements IReaction{
    
    public function __construct(Reaction $reaction)
    {
        parent::__construct($reaction);
    }
}