<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Ongkir;
use Auth;
use Illuminate\Support\Facades\DB;
use Alert;
use App\Models\User;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }


	public function order(Request $request, $id)
    {	
        $product = Product::where('id', $id)->first();
    	$date = Carbon::now();

    	//jika melebihi stok
    	if($request->total_order > $product->qty)
    	{
    		return redirect('/product/'.$id);
        } 

    	//cek validasi
        $check_order = Order::where('user_id', Auth::user()->id)->where('status','pending')->first();
    	//menyimpang ke database Order
    	if(empty($check_order))
    	{
    		$order = new Order;
            $order->user_id = Auth::user()->id;
	    	$order->order_date = $date;
            $order->status = 'pending';
	    	$order->total_price = 0;
            $order->code_unic = mt_rand(100, 999);
	    	$order->save();
    	}
    	

    	//simpan ke databaseOrderdetail
    	$new_order = Order::where('user_id', Auth::user()->id)->where('status','pending')->first();

    	//cek Orderdetail
        $check_order_detail = OrderDetail::where('product_id', $product->id)->where('order_id', $new_order->id)->first();
    	if(empty($check_order_detail))
    	{
    		$order_detail = new OrderDetail;
            $order_detail->product_id = $product->id;
            $order_detail->prouctName = $product->name;
	    	$order_detail->order_id = $new_order->id;
            $order_detail->total_order = $request->total_order;
            $order_detail->price = $product->price;
	    	$order_detail->total_price = $product->price*$request->total_order;
	    	$order_detail->save();
    	}else 
    	{
    		$order_detail = OrderDetail::where('product_id', $product->id)->where('order_id', $new_order->id)->first();

    		$order_detail->total_order = $order_detail->total_order+$request->total_order;

    		//harga sekarang
    		$newPrice_order_detail = $product->price*$request->total_order;
	    	$order_detail->total_price = $order_detail->total_price+$newPrice_order_detail;
	    	$order_detail->update();
    	}

    	//jumlah total
    	$order = Order::where('user_id', Auth::user()->id)->where('status','pending')->first();
    	$order->total_price = $order->total_price+$product->price*$request->total_order;
        $order->update();
		alert()->success('Order successfully entered the cart', 'Success');
    	return redirect('view-cart');

	}
	
	public function cart()
    {
        $order = Order::where('user_id', Auth::user()->id)->where('status','pending')->first();
        $categories = Category::all();
 		$order_details = [];
        if(!empty($order))
        {
            $order_details = OrderDetail::where('order_id', $order->id)->get();

        }
        
        return view('check_out', compact('order', 'order_details', 'categories'));
    }
    
	public function check_out()
    {
        $order = Order::where('user_id', Auth::user()->id)->where('status','pending')->first();
        $user = User::where('id', Auth::user()->id)->first();
        $categories = Category::all();
        $ongkirs = Ongkir::all();
 		$order_details = [];
        if(!empty($order))
        {
            $order_details = OrderDetail::where('order_id', $order->id)->get();

        }
        
        return view('check_outFIX', compact('order', 'order_details', 'categories', 'user', 'ongkirs'));
    }

    public function delete($id)
    {
        $order_detail = OrderDetail::where('id', $id)->first();

        $order = Order::where('id',  $order_detail->order_id)->first();
        $order->total_price =  $order->total_price- $order_detail->total_price;
        $order->update();


        $order_detail->delete();

        alert()->error('Your order has been successfully deleted', 'Deleted');
        return redirect('product');
    }

    public function konfirmasi(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();

        if(empty($user->address))
        {
            alert()->error('Identity please complete', 'Error');
            return redirect('profile');
        }

        if(empty($user->phoneNumber))
        {
            alert()->error('Identity please complete', 'Error');
            return redirect('profile');
        }

        $order = Order::where('user_id', Auth::user()->id and 'ongkir_id', $request->id_ongkir)->where('status','pending')->first();
        $ongkirs = Ongkir::where('id', $request->id_ongkir)->first();
        $order_id =  $order->id;
        $order->status = 'Waiting for payment';
        $order->ongkir_id  = $request->id_ongkir;
        $order->namaKota = $ongkirs->namaKota;
        $order->tarif = $ongkirs->tarif;
        $order->shipaddress  = $request->shipaddress;
        $order->total_price = $order->total_price + $ongkirs->tarif;
        $order->update();

        $order_details = OrderDetail::where('order_id',  $order_id)->get();
        foreach ($order_details as $order_detail) {
            $product = Product::where('id', $order_detail->product_id)->first();
            $product->qty = $product->qty-$order_detail->total_order;
            $product->update();
        }



        alert()->success('Order Successful Check Out Please Continue The Payment Process', 'Success');
        return redirect('history/'.$order_id);

    }

}
