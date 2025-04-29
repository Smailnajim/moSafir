<?php

namespace App\DTOs;


class OffertDto {
    public string $image; 
    public string $name;

    private function __construct(
        string $image,
        string $name

    ){
        $this->image = $image;
        $this->name = $name;
        
    }

    public static function createPostDto(string $image, string $name): OffertDto
    {
        return new self(
            $image,
            $name
        );
    }
}