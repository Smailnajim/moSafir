<?php

namespace App\Repositories\Eloquent;

use App\Models\Post;
use App\Models\Reaction;
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

    public function deletetPostsByIds(array $ids){
        $rectionsIds = [];
        $posts = $this->postsByIds($ids);

        foreach ($posts as $post) {
            foreach ($post->reactions as $reaction) {
                $rectionsIds[] = $reaction->id;
            }
        }
        $this->deletetGroupById($ids);
        return $rectionsIds;
    }
    
    // public function betweenIds(array $ids){
    //     $this->model->
    //     return $rectionsIds;
    // }
}