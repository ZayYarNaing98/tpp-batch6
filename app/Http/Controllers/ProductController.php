<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepositoryInterface;

class ProductController extends Controller
{
    protected $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function index()
    {
        $products = Product::with('category')->get();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        // dd($categories);
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
            'status' => 'nullable',
            'category_id' => 'required'
        ]);

        $data['status'] = $request->has('status') ? true : false;

        Product::create($data);

        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $categories = Category::get();

        $product = Product::with('category')->where('id', $id)->first();

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request)
    {
        $product = Product::find($request->id);

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status  == 'on' ? 1 : 0,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('products.index');

    }

    public function show($id)
    {
        $product = Product::find($id);

        return view('products.show', compact('product'));
    }

    public function delete($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->route('products.index');
    }
}
