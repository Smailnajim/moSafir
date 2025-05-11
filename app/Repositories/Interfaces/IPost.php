<?php

namespace App\Repositories\Interfaces;

interface IPost extends IRepository{
    public function postsByIds(array $ids);
    public function deletetPostsByIds(array $ids);
    public function countPosts(int $id);
}