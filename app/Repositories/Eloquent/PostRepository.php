<?php

namespace App\Repositories\Eloquent;

use App\Models\Post;
use App\Models\User;
use App\Repositories\Interfaces\IPost;

class PostRepository extends FloorRepository implements IPost{
    
    public function __construct(Post $post)
    {
        parent::__construct($post);
    }

    public function postsByIds(array $ids){
        return $this->model->whereIn('id', $ids)->get();
    }
}