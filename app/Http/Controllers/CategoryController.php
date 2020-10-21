<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function cari(Request $request){
        $name = $request->name;
        $products = Product::where('name','like',"%".$name."%")->paginate(2);
        return view('product', [
            'products' => $products,
            'categories' => Category::all(),
            'title' => 'List Product'
        ]);

    }

    public function render($category)
    {
        $products = DB::table('products')->where('category_id', $category)->get();
        return view('product', [
            'products' => $products,
            'categories' => Category::all(),
            'title' => 'Category Product '.$category
        ]);
       
    }
}
