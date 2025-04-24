<?php

namespace App\DTOs;


class PostDto {

    public function __construct(
        public string $userImage,
        public string $fullName,
        public string $time,
        public string $description,
        public string $image,
    ) 
    {
    }
}