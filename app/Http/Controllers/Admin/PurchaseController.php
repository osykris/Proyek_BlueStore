<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Payment;
use App\Models\OrderDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index(){
        $orders =  DB::table('orders')
        ->join('users', 'orders.user_id', '=', 'users.id')
        ->select('users.name', 'orders.order_date', 'orders.status', 'orders.total_price', 'orders.code_unic', 'orders.id')
        ->get();
        return view('admin.purchase.index', compact('orders'));
    }

    public function seePayment($id){
        $order = Order::where('id', $id)->first();
        $payments = Payment::where('order_id', $order->id)->get();
    	return view('admin.purchase.seePayment', compact('order', 'payments'));
    }

    public function save(Request $request, $id){
        
        $order = Order::where('id', $id)->first();
        $order->resiPengiriman = $request->resiPengiriman;
        $order->status = $request->status;
        $order->update();
        alert()->success('Input data is successfull');
        return redirect('purchase');
    }

    public function detail($id)
    {
    	$order = Order::where('id', $id)->first();
    	$order_details = OrderDetail::where('order_id', $order->id)->get();
     	return view('admin.purchase.detailPurchase', compact('order','order_details'));
    }
}
