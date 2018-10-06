<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends EloquentRepository
{
    public function __construct(Category $category)
    {
        parent::__construct($category);
    }
}
