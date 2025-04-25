<?php

namespace App\DTOs;


class PostDto {

    private function __construct(
        public string $userImage,
        public string $fullName,
        public string $time,
        public string $description,
        public string $image,
    )
    {
    }

    public static function createPostDto(string $userImage, string $fullName, string $time, string $description, string $image): PostDto
    {
        return new self(
            userImage: $userImage,
            fullName: $fullName,
            time: $time,
            description: $description,
            image: $image,
        );
    }
}