<?php

namespace App\Repositories\Interfaces;

interface IReaction extends IRepository{
    public function alredyReactioned(int $user_id, int $post_id);
}