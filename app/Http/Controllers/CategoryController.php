<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // $categories = [
        //     [
        //         'id' => 1,
        //         'name' => 'Information Technology',
        //     ],
        //     [
        //         'id' => 2,
        //         'name' => 'Travel',
        //     ],
        //     [
        //         'id' => 3,
        //         'name' => 'Food & Receipes',
        //     ],
        //     [
        //         'id' => 4,
        //         'name' => 'Health & Fitness',
        //     ],
        //     [
        //         'id' => 5,
        //         'name' => 'Education',
        //     ],

        // ];
        // dd($categories);

        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::find($id);

        return view('categories.show', compact('category'));
    }
}
