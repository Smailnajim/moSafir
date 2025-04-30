<?php

namespace App\DTOs;


class OffertDto {
    public string $id;
    public string $name;
    public string $title;
    public string $price;
    public string $stars;
    public string $image; 
    public string $adress;
    public string $description;

    private function __construct(
        string $image,
        string $id,
        string $name,
        string $title,
        string $price,
        string $stars,
        string $adress,
        string $description,
    ){
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
        $this->title = $title;
        $this->stars = $stars;
        $this->price = $price;
        $this->adress = $adress;
        $this->description = $description;
        
    }

    public static function createPostDto(string $image,
    string $id, string $name, string $title, string $price, string $stars, string $adress, string $description): OffertDto
    {
        return new self(
            $id,
            $name,
            $title,
            $price,
            $stars,
            $image,
            $adress,
            $description,
        );
    }
}