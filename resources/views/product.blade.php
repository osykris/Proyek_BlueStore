@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background-color: transparent; padding: 0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-light">Home</a></li>
                    <li class="breadcrumb-item active text-light" aria-current="page" >List Product</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9" >
            <h2> {{ $title }}</h2>
        </div>
        <div class="col-md-3">
            <div class="input-group mb-3">
            <form action="{{ url('cari') }}" method="GET">
                <input type="text" name="name" placeholder="Looking for what?" class="form-control">
            </form>
                <div class="input-group-prepend">
                    <span class="input-group-text"  style="background-color:	#008080;" id="basic-addon1">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <section class="products mb-5" >
        <div class="row mt-4">
            @foreach($products as $product)
            <div class="col-md-3 mb-3">
                <div class="card"  style="background-color: black">
                    <div class="card-body text-center">
                        <img src="{{ url('images/Products') }}/{{ $product->picture }}" class="img-fluid">
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <h5><strong>{{ $product->name }}</strong> </h5>
                                <h5>Rp. {{ number_format($product->price) }}</h5>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <a href="{{ route('product.detail', $product->id) }}" class="btn btn-light btn-block"><i class="fas fa-eye"></i> Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>

@endsection