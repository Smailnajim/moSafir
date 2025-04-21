<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ICategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(ICategory $categoryRep)
    {
        $this->categoryRepository = $categoryRep;
    }

    

}