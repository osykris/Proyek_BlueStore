<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function ajaxSearch(Request $request){
        $keyword = $request->get('q');
       $categories = Category::where("name", "LIKE", "%$keyword%")->get();
        return $categories;
       }

    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function indexAdd()
    {
        return view('admin.categories.addData');
    }

    public function addCategory(Request $request){
        $new_category = new Category;
        $new_category->name = $request->name;
        $file = $request->file('picture');
        // Mendapatkan Nama File
        $nama_file = $file->getClientOriginalName();
     
        // Mendapatkan Extension File
        $extension = $file->getClientOriginalExtension();
    
        // Mendapatkan Ukuran File
        $ukuran_file = $file->getSize();
     
        // Proses Upload File
        $destinationPath = 'images\Categories';
        $file->move($destinationPath,$file->getClientOriginalName());
        $new_category->picture = $nama_file;
        $new_category->save();
        alert()->success('Add Category is successfull');
        return redirect('categories');
    }

    
    public function indexEdit($id)
    {
        $category = Category::where('id', $id)->first();
    	return view('admin.categories.editData', compact('category'));
    }

    
    public function save(Request $request, $id)
    {
        $new_category = Category::findOrFail($id);
        $new_category->name = $request->name;
        $new_category->update();
        alert()->success('Category Data Updated');
        return redirect('categories');
    }

    public function delete($id)
{
    $category = Category::findOrFail($id);
    $category->delete();
    alert()->error('Your category has been successfully deleted', 'Deleted');
    return redirect('categories');
}

}
