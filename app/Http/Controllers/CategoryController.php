<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use Illuminate\Support\Collection;

class CategoryController extends Controller
{
    /**
     * @var CategoryRepository
     */
    private $categories;

    public function __construct(CategoryRepository $categories)
    {
        $this->categories = $categories;
    }

    public function index(): Collection
    {
        return $this->categories->findAll();
    }
}
