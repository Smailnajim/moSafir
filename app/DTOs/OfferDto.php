<?php

namespace App\DTOs;


class OfferDto {
    public int $id;
    public string $title;
    public string $price;
    public string $stars;
    public string $image; 
    public string $adress;
    public string $description;

    private function __construct(
        string $image,
        int $id,
        string $title,
        string $price,
        string $stars,
        string $adress,
        string $description
    ){
        $this->id = $id;
        $this->image = $image;
        $this->title = $title;
        $this->stars = $stars;
        $this->price = $price;
        $this->adress = $adress;
        $this->description = $description;
        
    }

    public static function createPostDto(string $image, int $id, string $title, string $price, string $stars, string $adress, string $description): OfferDto
    {
        return new self(
            $image,
            $id,
            $title,
            $price,
            $stars,
            $adress,
            $description
        );
    }
}