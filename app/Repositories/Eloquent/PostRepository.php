<?php

namespace App\Repositories\Eloquent;

use App\Models\Post;
use App\Repositories\Interfaces\IPost;

class PostRepository extends FloorRepository implements IPost{
    
    public function __construct(Post $post)
    {
        parent::__construct($post);
    }

    public function randomTenPosts(){
        $id = rand(Post::min('id'), Post::max('id'));
    }
}