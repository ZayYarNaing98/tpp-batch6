<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController;

class CategoryController extends BaseController
{
    public function index()
    {
        $categories = Category::get();

        return $this->success($categories, 'Category Retrieved Successfully', 200);
    }

    public function show($id)
    {
        $category = Category::where('id', $id)->first();

        return $this->success($category, "Category Show Successfully", 200);
    }

    public function delete($id)
    {
        $category = Category::where('id', $id)->first();

        $category->delete();

        return $this->success($category, 'Category Destory Successfully', 200);
    }

}
