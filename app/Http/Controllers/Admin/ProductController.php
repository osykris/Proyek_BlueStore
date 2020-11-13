<?php

namespace App\Http\Controllers\Admin;
use Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Yajra\Datatables\Datatables;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function indexAdd()
    {
        return view('admin.products.addData');
    }

    public function addProduct(Request $request){
        $new_product = new Product;
        $new_product->name = $request->name;
        $new_product->price = $request->price;
        $new_product->category_id = $request->category_id;
        $new_product->description = $request->description;
        $new_product->is_ready = $request->is_ready;
        $new_product->qty = $request->qty;
        $file = $request->file('picture');
        // Mendapatkan Nama File
        $nama_file = $file->getClientOriginalName();
     
        // Mendapatkan Extension File
        $extension = $file->getClientOriginalExtension();
    
        // Mendapatkan Ukuran File
        $ukuran_file = $file->getSize();
     
        // Proses Upload File
        $destinationPath = 'images\Products';
        $file->move($destinationPath,$file->getClientOriginalName());
        $new_product->picture = $nama_file;
        $new_product->save();
        alert()->success('Add Product is successfull');
        return redirect('products');
       }

       public function indexEdit($id)
    {
        $product = Product::where('id', $id)->first();
    	return view('admin.products.editData', compact('product'));
    }
       
       public function save(Request $request, $id)
        {
            $new_product = Product::findOrFail($id);
            $new_product->name = $request->name;
            $new_product->price = $request->price;
            $new_product->category_id = $request->category_id;
            $new_product->description = $request->description;
            $new_product->is_ready = $request->is_ready;
            $new_product->qty = $request->qty;
        
            $new_product->update();
            alert()->success('Purchase Data Updated');
            return redirect('purchase');
        }

        public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        alert()->error('Your data has been successfully deleted', 'Deleted');
        return redirect('products');
    }


}
