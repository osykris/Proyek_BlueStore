@extends('layouts.adminApp')
@section('content')
<div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <h4 style="color: black;"><i style="color: black;" class="fa fa-pencil-alt"></i> Edit Data</h4>
                    <br>
                    <form method="POST" action="{{ url('categories/edit') }}/{{ $category->id }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row" >
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input  style="background-color: #ecebeb; color: black;"id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $category->name }}" required autocomplete="name" autofocus>

                                @error('name')
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
        
    </div>
</div>
@endsection