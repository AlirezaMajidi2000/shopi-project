<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('is_featured', true)
            ->latest()
            ->take(8)
            ->get();

        return view('index', compact('products'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        return view('product', compact('product'));
    }
}
