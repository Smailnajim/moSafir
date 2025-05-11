<?php

namespace App\DTOs;


class UserDto {
    public int $id; 
    public string $image; 
    public string $first_name;
    public string $last_name;
    public string $role;
    public string $status;

    private function __construct(
        int $id,
        string $image,
        string $first_name,
        string $last_name,
        string $role,
        string $status
    ){
        $this->id = $id;
        $this->image = $image;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->role = $role;
        $this->status = $status;
    }

    public static function createUsertDto(
        int $id,
        string $image,
        string $first_name,
        string $last_name,
        string $role,
        string $status
    ): UserDto {
        return new self(
            $id,
            $image,
            $first_name,
            $last_name,
            $role,
            $status
        );
    }
}




