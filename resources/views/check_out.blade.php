@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('/') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>     
                    <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card" >
                <div class="card-body">
                    <h3 style="color: black;"><i class="fa fa-shopping-cart" style="color: black;"></i> Your Shooping Cart</h3>
                    @if(!empty($order))
                    <p align="right">Tanggal Pesan : {{ $order->order_date }}</p>
                    <table class="table table-striped"">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Picture</th>
                                <th>Product Name</th>
                                <th>Total Order</th>
                                <th>Price</th>
                                <th>Total Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody >
                            <?php $no = 1; ?>
                            @foreach($order_details as $order_detail)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    <img src="{{ url('images/Products') }}/{{ $order_detail->product->picture }}" width="100" alt="...">
                                </td>
                                <td>{{ $order_detail->product->name }}</td>
                                <td>{{ $order_detail->total_order }} product </td>
                                <td align="right">Rp. {{ number_format($order_detail->product->price) }}</td>
                                <td align="right">Rp. {{ number_format($order_detail->total_price) }}</td>
                                <td>
                                    <form action="{{ url('view-cart') }}/{{ $order_detail->id }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete data?');"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" align="right"><strong>Total Price :</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($order->total_price) }}</strong></td>
                                <td>
                                    <a href="{{ url('check-out') }}" class="btn btn-success">
                                        <i class="fa fa-shopping-cart"></i> Check Out
                                    </a>
                                </td>
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