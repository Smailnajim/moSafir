<?php

namespace App\Repositories\Interfaces;

interface IOffer extends IRepository{
    public function topThreeVoyagesByCategory(string $category);
    public function searchByname(string $name);
    public function allCategories();
    public function checkCategoryIfExiste(string $category);
    public function searchByCategory(array $categories);
}