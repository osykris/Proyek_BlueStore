<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class HomeController extends Controller
{

    public function index()
    {
        
        $product = Product::count();
        $order = Order::count();
        $user = User::count();
        return view('Admin.index', compact('product', 'order', 'user'));
    }

}