<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'integer', 'min:0'],
            'in_Stock' => ['required', 'integer', 'min:0'],
        ]);

        Product::create($validateData);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product created Successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validateData = $request->validate([
        'name' => ['required', 'string', 'max:20'],
        'description' => ['nullable', 'string'],
        'price' => ['required', 'integer', 'min:0'],
        'in_Stock' => ['required', 'integer', 'min:0'],
    ]);

    $product->update($validateData);
    return redirect()
        ->route('products.index')
        ->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Product deleted successfully!');
    }
}
