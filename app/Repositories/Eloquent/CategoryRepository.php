<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\Interfaces\ICategory;
use Illuminate\Support\Facades\DB;

class CategoryRepository extends FloorRepository implements ICategory{

    public function __construct(Category $category)
    {
        parent::__construct($category);
    }
}