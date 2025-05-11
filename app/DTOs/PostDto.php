<?php

namespace App\DTOs;


class PostDto {
    public string $userImage; 
    public string $fullName;
    public string $time;
    public string $description;
    public string $image;
    public string $status;
    public int $id;
    public int $user_id;

    private function __construct(
        string $userImage,
        string $fullName,
        string $time,
        string $description,
        string $image,
        string $status,
        int $id,
        int $user_id
    ){
        $this->userImage = $userImage;
        $this->fullName = $fullName;
        $this->time = $time;
        $this->description = $description;
        $this->image = $image;
        $this->status = $status;
        $this->id = $id;
        $this->user_id = $user_id;
    }

    public static function createPostDto(string $userImage, string $fullName, string $time, string $description, string $image,string $status, int $id, int $user_id): PostDto
    {
        return new self(
            $userImage,
            $fullName,
            $time,
            $description,
            $image,
            $status,
            $id,
            $user_id,
        );
    }
}