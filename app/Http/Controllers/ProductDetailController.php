<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
    	$product = Product::where('id', $id)->first();
        $categories = Category::all();
    	return view('productDetail', compact('product', 'categories'));
    }

    

}
