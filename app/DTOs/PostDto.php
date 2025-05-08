<?php

namespace App\DTOs;


class PostDto {
    public string $userImage; 
    public string $fullName;
    public string $time;
    public string $description;
    public string $image;

    private function __construct(
        string $userImage,
        string $fullName,
        string $time,
        string $description,
        string $image
    ){
        $this->userImage = $userImage;
        $this->fullName = $fullName;
        $this->time = $time;
        $this->description = $description;
        $this->image = $image;
    }

    public static function createPostDto(string $userImage, string $fullName, string $time, string $description, string $image): PostDto
    {
        return new self(
            $userImage,
            $fullName,
            $time,
            $description,
            $image,
        );
    }
}