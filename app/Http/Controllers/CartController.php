<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Auth;
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

    	//validasi apakah melebihi stok
    	if($request->total_order > $product->qty)
    	{
    		return redirect('/product/order'.$id);
    	}

    	//cek validasi
    	$check_order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();
    	//simpan ke database pesanan
    	if(empty($check_order))
    	{
    		$order = new Order;
	    	$order->user_id = Auth::user()->id;
	    	$order->order_date = $date;
	    	$order->status = 0;
	    	$order->total_price = 0;
            $order->code_unic = mt_rand(100, 999);
	    	$order->save();
    	}
    	

    	//simpan ke database pesanan detail
    	$new_order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();

    	//cek pesanan detail
    	$check_order_detail = OrderDetail::where('product_id', $product->id)->where('order_id', $new_order->id)->first();
    	if(empty($check_order_detail))
    	{
    		$order_detail = new OrderDetail;
	    	$order_detail->product_id = $product->id;
	    	$order_detail->order_id = $new_order->id;
	    	$order_detail->total_order = $request->total_order;
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
    	$order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();
    	$order->total_price = $order->total_price+$product->price*$request->total_order;
        $order->update();
		alert()->success('Order successfully entered the cart', 'Success');
    	return redirect('check-out');

	}
	
	public function check_out()
    {
        $order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();
 		$order_details = [];
        if(!empty($order))
        {
            $order_details = PesananDetail::where('order_id', $order->id)->get();

        }
        
        return view('cart.check_out', compact('order', 'order_details'));
    }

    public function delete($id)
    {
        $pesanan_detail = PesananDetail::where('id', $id)->first();

        $pesanan = Order::where('id', $pesanan_detail->pesanan_id)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga-$pesanan_detail->jumlah_harga;
        $pesanan->update();


        $pesanan_detail->delete();

        Alert::error('Your order has been successfully deleted', 'Deleted');
        return redirect('check-out');
    }

    public function konfirmasi()
    {
        $user = User::where('id', Auth::user()->id)->first();

        if(empty($user->alamat))
        {
            Alert::error('Identitasi Harap dilengkapi', 'Error');
            return redirect('profile');
        }

        if(empty($user->nohp))
        {
            Alert::error('Identitasi Harap dilengkapi', 'Error');
            return redirect('profile');
        }

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        $pesanan_id = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();

        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan_id)->get();
        foreach ($pesanan_details as $pesanan_detail) {
            $barang = Barang::where('id', $pesanan_detail->barang_id)->first();
            $barang->stok = $barang->stok-$pesanan_detail->jumlah;
            $barang->update();
        }



        Alert::success('Pesanan Sukses Check Out Silahkan Lanjutkan Proses Pembayaran', 'Success');
        return redirect('history/'.$pesanan_id);

    }

}
