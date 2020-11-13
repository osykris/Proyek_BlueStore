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

   //METHOD INI UNTUK MENG-GENERATE DATA ORDER 7 HARI TERAKHIR
   public function getChart()
   {
       //MENGAMBIL TANGGAL 7 HARI YANG TELAH LALU DARI TANGGAL HARI INI
       $start = Carbon::now()->subWeek()->addDay()->format('Y-m-d') . ' 00:00:01';
       //MENGAMBIL TANGGAL HARI INI
       $end = Carbon::now()->format('Y-m-d') . ' 23:59:00';
       
       //SELECT DATA KAPAN RECORDS DIBUAT DAN JUGA TOTAL PESANAN
       $order = Order::select(DB::raw('date(created_at) as order_date'), DB::raw('count(*) as total_order'))
           //DENGAN KONDISI ANTARA TANGGAL YANG ADA DI VARIABLE $start DAN $end 
           ->whereBetween('created_at', [$start, $end])
           //KEMUDIAN DI KELOMPOKKAN BERDASARKAN TANGGAL
           ->groupBy('created_at')
           ->get()->pluck('total_order', 'order_date')->all();
       
       //LOOPING TANGGAL DENGAN INTERVAL SEMINGGU TERAKHIR
       for ($i = Carbon::now()->subWeek()->addDay(); $i <= Carbon::now(); $i->addDay()) {
           //JIKA DATA NYA ADA 
           if (array_key_exists($i->format('Y-m-d'), $order)) {
               //MAKA TOTAL PESANANNYA DI PUSH DENGAN KEY TANGGAL
               $data[$i->format('Y-m-d')] = $order[$i->format('Y-m-d')];
           } else {
               //JIKA TIDAK, MASUKKAN NILAI 0
               $data[$i->format('Y-m-d')] = 0;
           }
       }
       return response()->json($data);
   }
}