@extends('layouts.app')

@section('content')
        <div>                
            <section class="site-hero" style="background-image: url(images/img.jpg); width: 100%;" id="section-home" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row intro-text align-items-center justify-content-center">
                        <div class="col-md-10 animated tada">
                            <h1 class="site-heading site-animate">Hello, Dear!!!<strong class="d-block">Welcome to Blue Store</strong></h1>
                            <strong class="d-block text-white text-uppercase letter-spacing">Happy Shopping :)</strong>
                        </div>
                    </div>
                </div>
            </section> 
        </div>
        <div>                
            <section class="site-hero1" style="background-image: url(images/add.png); width: 100%;" id="section-home" data-stellar-background-ratio="0.5">
            </section> 
        </div>
    <section class="pilih-category mt-4">
      <h1 style="color: black;"><center>Choose<strong> Category</strong><center></h1>
      <div class="row mt-4">
         @foreach($categories as $category)
         <div class="col">
         <a href="{{ route('products.category', $category->id) }}">
               <div class="card shadow">
                  <div class="card-body text-center">
                     <img src="{{ url('images/Categories') }}/{{ $category->picture }}" class="img-fluid">
                  </div>
               </div>
         </a>
               <div class="row mt-2">
                  <div class="col-md-12">
                     <h5 style="color: black;"><center><strong>"{{ $category->name }}"</strong></cemter></h5>
                  </div>
               </div>
         </div>
         @endforeach
      </div>
   </section>
   <section class="product mt-5">
      <h1 style="color: black;"><center>Best<strong> Product</strong><center></h1>
      <div class="row mt-4">
         @foreach($products as $product)
         <div class="col">
               <div>
                  <div class="card-body text-center">
                     <img src="{{ url('images/Products') }}/{{ $product->picture }}" class="img-fluid">
                     <div class="row mt-2">
                        <div class="col-md-12">
                           <h5 style="color: black;"><strong>"{{ $product->name }}"</strong> </h5>
                           <h6 style="color: black;">Rp. {{ number_format($product->price) }}</h6>
                        </div>
                     </div>
                     <div class="row mt-2">
                     <div class="col-md-12">
                        <a href="{{ route('product.detail', $product->id) }}" class="btn btn-dark btn-block"><i class="fas fa-eye"></i><strong>Detail</strong></a>
                     </div>
                  </div>
                  </div>
               </div>
         </div>
         @endforeach
      </div>
   </section> 
@endsection
