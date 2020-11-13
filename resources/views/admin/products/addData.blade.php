@extends('layouts.adminApp')

@section('footer-scripts')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
@endsection


@section('content')

<div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-body">
                <h4 style="color: black;"><i class="far fa-plus-square"></i> Add Data</h4><br>
                    <form method="POST" action="{{ url('products/saveProduct') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}          

                        <div class="form-group row" >
                            <label for="pelanggan" class="col-md-2 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input placeholder="Enter Product Name.." style="background-color: #ecebeb; color: black;"id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-2 col-form-label text-md-right">Price</label>

                            <div class="col-md-6">
                                <input placeholder="Enter Price Prodct.." style="background-color: #ecebeb; color: black;" id="email" type="text" class="form-control @error('price') is-invalid @enderror" name="price">

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="squareInput">Name Categoires</label>
                            <div class="col">
                            {!! Form::select('category_id',[''=>'Select a category']+App\Models\Category::pluck('name','id')->all(),null,['class'=>$errors->has('category_id') ? 'form-control is-invalid' : 'form-control', 'required' ]) !!}          
                        @if ($errors->has('category_id'))
                            <div class="alert alert-warning">
                            {{$errors->first('category_id')}}
                            </div>
                        @endif
                        </div></div>

                        <div class="form-group row">
                            <label for="ready" class="col-md-2 col-form-label text-md-right">Ready</label>

                            <div class="col-md-6">
                                <input placeholder="Product ready = 1, not ready = 0" style="background-color: #ecebeb; color: black;" id="nohp" type="text"  class="form-control @error('is_ready') is-invalid @enderror" name="is_ready" >

                                @error('is_ready')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-2 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <textarea placeholder="Enter Description Product.." style="background-color: #ecebeb; color: black;" id="nohp" type="text"  class="form-control @error('description') is-invalid @enderror" name="description" ></textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="stock" class="col-md-2 col-form-label text-md-right">Stock</label>

                            <div class="col-md-6">
                                <input placeholder="Enter Stock Product.." style="background-color: #ecebeb; color: black;" id="nohp" type="text"  class="form-control @error('qty') is-invalid @enderror" name="qty" >

                                @error('qty')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="picture" class="col-md-2 col-form-label text-md-right">Photo</label>

                            <div class="col-md-6">
                                <input value="Upload" placeholder="Enter Photo Product.." style="background-color: #ecebeb; color: black;" id="text" type="file" class="form-control @error('picture') is-invalid @enderror" name="picture">
                                
                                @error('picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            $('#categories').select2({ajax: {
            url: 'http://larashop.test/ajax/categories/search',
            processResults: function(data){
                return {
                results: data.map(function(item){return {id: item.id, text:
                item.name} })
                }
            }
            }
            });
         </script>
@endsection