<?php

namespace App\Repositories\Interfaces;

interface IOffer{
    public function topThreeVoyagesByCategory(string $category);
    public function searchByname(string $name);
    public function searchByCategory(array $categories);
}