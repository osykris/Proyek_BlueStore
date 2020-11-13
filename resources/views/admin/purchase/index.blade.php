@extends('layouts.adminApp')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Blue Store Purchase</h3><br>
                        </div>    
                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap" id="datatable">
                                <thead>
                                <tr>
                                <th>Customer's Name</th>
                                <th>Date</th>
                                <th>Purchase Status</th>
                                <th>Total</th>
                                <th>Code Unic </th>
                                <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->order_date }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>Rp. {{ number_format($order->total_price) }}</td>
                                        <td>Rp. {{ $order->code_unic }}</td>
                                        <td>
                                        <a href="{{ url('purchase/detail') }}/{{ $order->id }}" class="btn btn-primary"><i class="fa fa-info"></i> Detail</a>
                                        @if($order->status != 'Waiting for payment')
                                            <a href="{{ url('purchase/seePayment') }}/{{ $order->id }}" class="btn btn-primary"><i class="fa fa-info"></i> See Payment</a>
                                        @endif
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