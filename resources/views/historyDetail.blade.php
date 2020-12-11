@extends('layouts.app')
@section('content')

<div class="container py-4">
    <div class="row">
    <div class="col-md-12">
            <a href="{{ url('history') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('history') }}">Order History</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Order Detail</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body" style="color: black;">
                    <p>For payment, please transfer to the account below:</p>
                    <div class="media">
                        <img class="mr-3" src="{{ url('images/bri.png') }}" alt="Bank BRI" width="60">
                        <div class="media-body">
                            <h5 class="mt-0" style="color: black;">BANK BRI</h5>
                            No. Rekening 025190-002-842 on behalf of the <strong>PT. Blue Store Indonesia</strong>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body" style="color: black;">
                    <h3 style="color: black;"><i class="fa fa-shopping-cart"></i> Order Detail</h3>
                    @if(!empty($order))
                    <p style="color: #008080">Shipping to {{ $order->namaKota }} / Address {{ $order->Shipaddress }} </p>
                    <p align="right">No. Purcase : {{ $order->id }} / Order Date : {{ $order->order_date }}</p>
                   
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Picture</th>
                                <th>Product Name</th>
                                <th>Total Order</th>
                                <th>Price</th>
                                <th>Total Price</th>                           
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($order_details as $order_detail)
                            <tr>
                                <td  style="color: black;" >{{ $no++ }}</td>
                                <td>
                                    <img src="{{ url('images/Products') }}/{{ $order_detail->product->picture }}" width="100" alt="...">
                                </td>
                                <td  style="color: black;">{{ $order_detail->product->name }}</td>
                                <td  style="color: black;">{{ $order_detail->total_order }} product</td>
                                <td  style="color: black;" >Rp. {{ number_format($order_detail->product->price) }}</td>
                                <td  style="color: black;" align="right">Rp. {{ number_format($order_detail->total_price) }}</td>
                                
                            </tr>
                            @endforeach

                            <tr>
                                <td style="color: black;" colspan="5" align="right"><strong>Total Price :</strong></td>
                                <td  style="color: black;" align="right"><strong>Rp. {{ number_format($order->total_price) }}</strong></td>
                                
                            </tr>
                            <tr>
                                <td style="color: black;" colspan="5" align="right"><strong>Postal Fee :</strong></td>
                                <td  style="color: black;" align="right"><strong>Rp. {{ number_format($order->tarif) }}</strong></td>
                                
                            </tr>
                            <tr>
                                <td style="color: black;" colspan="5" align="right"><strong>Code Unic :</strong></td>
                                <td style="color: black;" align="right"><strong>Rp. {{ number_format($order->code_unic) }}</strong></td>
                                
                            </tr>
                             <tr>
                                <td style="color: black;" colspan="5" align="right"><strong>Total that must be transferred :</strong></td>
                                <td style="color: black; font-weight: bold; " align="right"><strong>Rp. {{ number_format($order->code_unic+$order->total_price+$order->tarif) }}</strong></td>
                                
                            </tr>
                        </tbody>
                    </table>
                    @endif
                    
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection