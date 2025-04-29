<?php

namespace App\Repositories\Interfaces;

interface IReaction{
    public function alredyReactioned(int $user_id, int $post_id);
}