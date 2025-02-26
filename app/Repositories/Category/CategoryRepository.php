<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function index()
    {
        $categories = Category::get();

        return $categories;
    }

    public function store($data)
    {
        return Category::create($data);
    }

    public function show($id)
    {
        $category = Category::find($id);

        return $category;
    }
}
