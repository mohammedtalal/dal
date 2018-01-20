<?php

namespace App\Repositories;

use App\Category;
use App\Interfaces\CategoryRepositoryInterface as CategoryInterface;
use App\Repositories\CategoryRepository;

class CategoryRepository implements CategoryInterface {
    public $category;
    function __construct(Category $category) {
        $this->category = $category;
    }   

    public function findCat($id) {
        return $this->category->find($id);
    }
}