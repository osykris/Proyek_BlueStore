@extends('layouts.adminApp')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Categories</h3><br>
                        </div>    
                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                            <div class="card-sub">
                                <a href="{{ url('categories/addCategory') }}" class="btn btn-danger btn-sm">Add New Categories</a>
                            </div>
                            <table class="table table-hover text-nowrap" id="datatable">
                                <thead>
                                <tr>
                                    <th> No. </th>
                                    <th> Name </th>
                                    <th> Id </th>
                                    <th> Picture </th>
                                    <th> Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->id }}</td>
                                        <td><img src="{{ url('images/Categories') }}/{{ $category->picture }}" width="100" alt="..."></td>
                                        <td>
                                        <form action="{{ url('categories') }}/{{ $category->id }}" method="post">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete data?');"><i class="fa fa-trash"></i></button><br></br>
                                        </form>
                                            <a class="btn btn-info btn-sm" href="{{ url('categories/edit') }}/{{ $category->id }}"><i class="fas fa-edit"></i></a>
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