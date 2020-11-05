@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/product') }}"> List Product</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Product Detail</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card gambar-product">
                <div class="card-body bg-white"> 
                    <img src="{{ url('images/Products') }}/{{ $product->picture }}" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h2 style="font-size: 24pt; color: black; font-family: fantasy;">
                <strong>{{ $product->name }}</strong>
            </h2>
            <h4  style="color: black;">
                Rp. {{ number_format($product->price) }}
                @if($product->qty != null)
                <span class="badge badge-success"> <i class="fas fa-check"></i> Ready Stock</span>
                @else
                <span class="badge badge-danger"> <i class="fas fa-times"></i> Out of Stock</span>
                @endif
            </h4>

            <div class="row">
                <div class="col">
                    <table class="table" style="border-top : hidden">
                        <tr>
                            <td>Category</td>
                            <td>:</td>
                            <td>
                                <img src="{{ url('images/Categories') }}/{{ $product->category->picture }}" class="img-fluid"
                                    width="180">
                                {{ $product->category->name }}
                            </td>
                        </tr>
                        <tr>
                            <td>Type</td>
                            <td>:</td>
                            <td>{{ $product->type }}</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>:</td>
                            <td>{{ $product->description }}</td>
                        </tr>
                        <tr>
                            <td>Stock</td>
                            <td>:</td>
                            <td>{{ $product->qty }}</td>
                        </tr>
                        <tr>
                            <td>Order Quantity</td>
                            <td>:</td>
                            <td>
                                <form method="post" action="{{ url('/product/order') }}/{{ $product->id }}" >
                                <input type="text" name="total_order" class="form-control" required="" style="background-color: white;">
                                @csrf
                                <button type="submit" class="btn btn-dark btn-block mt-4" @if($product->is_ready !== 1) disabled @endif><i class="fas fa-shopping-cart"></i>  Put it in the cart</button>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection