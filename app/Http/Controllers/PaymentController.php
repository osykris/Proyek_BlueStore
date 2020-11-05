<?php

namespace App\Http\Controllers;
use Auth;
use Alert;
use Carbon\Carbon;
use App\Models\Payment;
use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $order = Order::where('id', $id)->first();
        $payment = Payment::where('order_id', $order->id)->first();
    	return view('payment', compact('order', 'payment'));
    }

    public function save(Request $request, $id)
    {
        $date = Carbon::now();
        $order = Order::where('id', $id)->first();
        $payment = Payment::where('order_id', $order->id)->first();

        $payment = new Payment;
        $payment->order_id = $order->id;
        $payment->order_date = $date;
        $payment->pelanggan = $request->pelanggan;
        $payment->bank = $request->bank;
        $payment->total = $request->total;
        $file = $request->file('buktiPembayaran');
        // Mendapatkan Nama File
        $nama_file = $file->getClientOriginalName();
     
        // Mendapatkan Extension File
        $extension = $file->getClientOriginalExtension();
    
        // Mendapatkan Ukuran File
        $ukuran_file = $file->getSize();
     
        // Proses Upload File
        $destinationPath = 'images\bukti';
        $file->move($destinationPath,$file->getClientOriginalName());
        $payment->buktiPayment = $nama_file;
        $payment->save();
        alert()->success('Thank you for sending payment');
        return redirect('history');
    }

    
}
