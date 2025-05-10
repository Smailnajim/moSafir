<?php

namespace App\DTOs;


class ProfilleDto {


    public string $image;
    public string $first_name;
    public string $last_name;
    public string $name;
    public string $posts;
    public string $followers;
    public string $following;

    private function __construct(
        string $image,
        string $first_name,
        string $last_name,
        string $name,
        string $posts,
        string $followers,
        string $following
    ){
        $this->image = $image;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->name = $name;
        $this->posts = $posts;
        $this->followers = $followers;
        $this->following = $following;
    }

    public static function createProfilleDto(
        string $image,
        string $first_name,
        string $last_name,
        string $name,
        string $posts,
        string $followers,
        string $following
    ): ProfilleDto {
        return new self(
            $image,
            $first_name,
            $last_name,
            $name,
            $posts,
            $followers,
            $following
        );
    }
}




