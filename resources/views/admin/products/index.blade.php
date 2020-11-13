@extends('layouts.adminApp')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Products</h3><br>
                        </div>    
                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                            <div class="card-sub">
                                <a href="{{ url('products/addProduct') }}" class="btn btn-danger btn-sm">Add New Products</a>
                            </div>
                            <table class="table table-hover text-nowrap" id="datatable">
                                <thead>
                                <tr>
                                    <th> No. </th>
                                    <th> Picture </th>
                                    <th> Id </th>
                                    <th> Name </th>
                                    <th> Category </th>
                                    <th> Price </th>
                                    <th> Stock </th>
                                    <th> Description </th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td><img src="{{ url('images/Products') }}/{{ $product->picture }}" width="100" alt="..."></td>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->category_id }}</td>
                                        <td>Rp. {{ number_format($product->price) }}</td>
                                        <td>{{ $product->qty }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>
                                        <form action="{{ url('products') }}/{{ $product->id }}" method="post">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete data?');"><i class="fa fa-trash"></i></button><br></br>
                                        </form>
                                            <a class="btn btn-info btn-sm" href="{{ url('products/edit') }}/{{ $product->id }}"><i class="fas fa-edit"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection