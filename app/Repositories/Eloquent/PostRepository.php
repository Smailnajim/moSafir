<?php

namespace App\Repositories\Eloquent;

use App\DTOs\PostDto;
use App\Models\Post;
use App\Models\User;
use App\Repositories\Interfaces\IPost;

class PostRepository extends FloorRepository implements IPost{
    
    public function __construct(Post $post)
    {
        parent::__construct($post);
    }

    public function randomTenPosts(){
        $ids = [];
        $postsDto = [];
        while (count($ids) < 10){

            $id = rand($this->model->min('id'), $this->model->max('id')); 
            if($this->checkIdIfExiste($id))
            $ids[] = $id;
        }
        $posts = $this->model->whereIn('id', $ids)->get();
        $users = User::whereIn('id', $ids)->get();
        PostDto::createPostDto();
    }
}