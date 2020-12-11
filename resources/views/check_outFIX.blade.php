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
                    <li class="breadcrumb-item"><a href="{{ url('view-cart') }}">Shopping Cart</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 style="color: black;"><i class="fa fa-shopping-cart" style="color: black;"></i> Check Out</h3>
                    @if(!empty($order))
                    <p align="right">Tanggal Pesan : {{ $order->order_date }}</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
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
                                <td>{{ $no++ }}</td>
                                <td>
                                    <img src="{{ url('images/Products') }}/{{ $order_detail->product->picture }}" width="100" alt="...">
                                </td>
                                <td>{{ $order_detail->product->name }}</td>
                                <td>{{ $order_detail->total_order }} product</td>
                                <td align="right">Rp. {{ number_format($order_detail->product->price) }}</td>
                                <td align="right">Rp. {{ number_format($order_detail->total_price) }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" align="right"><strong>Total Price :</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($order->total_price)}}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                    <h3 style="color: black;"><i class="fas fa-hands" style="color: black;"></i> Receiver</h3>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td width="10">:</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td>No HP</td>
                                <td>:</td>
                                <td>{{ $user->phoneNumber }}</td>
                            </tr>
                            <tr>
                                <td>Shipping Address</td>
                                <td>:</td>
                                <td align="right">
                                    <form method="POST" action="/konfirmasi-check-out">
                                        @csrf
                                        <select class="custom-select" name="id_ongkir">
                                            <option selected>Select Shipping Post</option>
                                            @foreach($ongkirs as $ongkir)
                                            <option value="{{ $ongkir->id }}">{{ $ongkir->namaKota }} - Rp. {{number_format($ongkir->tarif)}}</option>
                                            @endforeach
                                        </select>
                                        <textarea name="shipaddress" style="color: white;" placeholder="Enter the Shipping Address.." class="form-control @error('Shipaddress') is-invalid @enderror" required=""></textarea>
                                        <button type="submit" class="btn btn-success mt-4" onclick="return confirm('Are you sure you want to check out?');">
                                            <i class="fa fa-shopping-cart"></i> Check Out
                                        </button>
                                    </form>
                                    @error('Shipaddress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    @csrf
                                    </form>
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