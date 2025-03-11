<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResoruce;
use App\Http\Controllers\API\BaseController;

class CategoryController extends BaseController
{
    public function index()
    {
        $categories = Category::get();

        $data = CategoryResoruce::collection($categories);

        return $this->success($data, 'Category Retrieved Successfully', 200);
    }

    public function show($id)
    {
        $category = Category::where('id', $id)->first();

        $data = new CategoryResoruce($category);

        return $this->success($data, "Category Show Successfully", 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'image' => 'required',
        ]);

        if($request->hasFile('image'))
        {
            $imageName = time(). '.' . $request->image->extension();

            $request->image->move(public_path('categoryImages'), $imageName);

            $data = array_merge($data, ['image' => $imageName]);
        }

        $category =  Category::create($data);

        return $this->success($category, "Category Created Successfully", 201);
    }
    public function delete($id)
    {
        $category = Category::where('id', $id)->first();

        $category->delete();

        return $this->success($category, 'Category Destory Successfully', 200);
    }

}
