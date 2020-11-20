@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active text-dark" aria-current="page" >List Product</li>
                    <div class="col-md-7" style="position: absoulte; top: 5%; left: 62%">
                        <div class="input-group mb-3">
                        <form action="{{ url('cari') }}" method="GET">
                            <input type="text" name="name" placeholder="Searching...." class="form-control bg-white" >
                        </form>
                            <div class="input-group-prepend">
                                <span class="input-group-text"  style="background-color: #008B8B" id="basic-addon1">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </ol>
                    
            </nav>
        </div>
    </div>


    <section class="products mb-5" >
        <div class="container">
			<div class="row">
				<div class="section-heading text-center col-md-12">
					<h2 style="color: black">"BlueStore <strong>Products</strong>"</h2>
				</div>
			</div>
			<div class="filters">
                <ul>
                    <li><a style="font-size: 14pt; color: 	#008B8B" href="/product">All Products</li>
                    @foreach($categories as $category)
                    <li><a style="font-size: 14pt; color: 	#008B8B" href="{{ route('products.category', $category->id) }}">{{ $category->name }}</a></li>
                    @endforeach
				</ul>
			</div>
        </div>
        <div class="row mt-4">
            @foreach($products as $product)
            <div class="col-md-3 mb-3">
                <div class="card" >
                    <div class="card-body text-center">
                        <img src="{{ url('images/Products') }}/{{ $product->picture }}" class="img-fluid">
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <h5 style="font-size: 12pt; color: black"><strong>{{ $product->name }}</strong> </h5>
                                <h6>Rp. {{ number_format($product->price) }}</h6>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <a href="{{ route('product.detail', $product->id) }}" class="btn btn-dark btn-block"><i class="fas fa-eye"></i> Detail</a>
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