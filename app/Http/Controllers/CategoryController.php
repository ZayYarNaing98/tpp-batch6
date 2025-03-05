<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryUpdateRequest;
use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->middleware('auth');
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->index();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
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

        $this->categoryRepository->store($data);

        return redirect()->route('categories.index');
    }

    public function show($id)
    {
        $category = $this->categoryRepository->show($id);

        return view('categories.show', compact('category'));
    }

    public function edit($id)
    {
        $category = $this->categoryRepository->show($id);

        return view('categories.edit', compact('category'));
    }

    public function update(CategoryUpdateRequest $request)
    {
        $validatedData = $request->validated();

        $category = $this->categoryRepository->show($request->id);

        $category->update($validatedData);

        return redirect()->route('categories.index');
    }

    // public function delete($id)
    // {
    //     $category = $this->categoryRepository->show($id);

    //     $category->delete();

    //     return redirect()->route('categories.index');
    // }
}
