@extends('layouts.adminApp')

@section('content')

<div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-body">
                <h4 style="color: black;"><i class="far fa-plus-square"></i> Add Data</h4><br>
                    <form method="POST" action="{{ url('categories/saveCategory') }}" enctype="multipart/form-data">
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

@endsection