@extends('layouts.adminApp')

@section('content')
<div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <h4 style="color: black;"><i style="color: black;" class="fa fa-pencil-alt"></i> Edit Data</h4>
                    <br>
                    <form method="POST" action="{{ url('products/edit') }}/{{ $product->id }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row" >
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input  style="background-color: #ecebeb; color: black;"id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row" >
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input  style="background-color: #ecebeb; color: black;"id="name" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price }}" required autocomplete="price" autofocus>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row" >
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea  style="background-color: #ecebeb; color: black;"id="name" type="text" class="form-control @error('description') is-invalid @enderror" name="description" >{{ $product->description }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="squareInput">Name Categoires</label>
                            {!! Form::select('category_id',[''=>'Select a category']+App\Models\Category::pluck('name','id')->all(),null,['class'=>$errors->has('category_id') ? 'form-control is-invalid' : 'form-control', 'required' ]) !!}
                        </div>
                        @if ($errors->has('category_id'))
                            <div class="alert alert-warning">
                            {{$errors->first('category_id')}}
                            </div>
                        @endif

                        <div class="form-group row" >
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Ready') }}</label>

                            <div class="col-md-6">
                                <input  style="background-color: #ecebeb; color: black;"id="name" type="text" class="form-control @error('is_ready') is-invalid @enderror" name="is_ready" value="{{ $product->is_ready }}" required autocomplete="is_ready" autofocus>

                                @error('is_ready')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row" >
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Stock') }}</label>

                            <div class="col-md-6">
                                <input  style="background-color: #ecebeb; color: black;"id="name" type="text" class="form-control @error('qty') is-invalid @enderror" name="qty" value="{{ $product->qty }}" required autocomplete="qty" autofocus>

                                @error('qty')
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
@section('footer-scripts')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $('#categories').select2({
        ajax: {
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

@endsection