@extends('layouts.adminApp')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="far fa-money-bill-alt"></i> Payment Data</h3><br>
                        </div>    
                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap" id="datatable">
                                <thead>
                                <tr>
                                    <th>Customer's Name</th>
                                    <th>Date</th>
                                    <th>Bank</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($payments as $payment)
                                <tr>
                                    <td>{{ $payment->pelanggan }}</td>
                                    <td>{{ $payment->order_date }}</td>
                                    <td>{{ $payment->bank }}</td>
                                    <td>Rp. {{ number_format($payment->total) }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ url('images/bukti') }}/{{ $payment->buktiPayment }}" width="400" alt="..."> 
    </section>
    @endforeach
    <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ url('purchase/seePayment') }}/{{ $order->id }}" enctype="multipart/form-data" >
                        @csrf    
                        <div class="form-group row">
                            <label for="resiPengiriman" class="col-md-2 col-form-label text-md-right">No. Delivery Receipt</label>

                            <div class="col-md-6">
                                <input placeholder="Enter Shipping Receipt.." style="background-color: #ecebeb; color: black;" id="nohp" type="text"  class="form-control @error('resiPengiriman') is-invalid @enderror" name="resiPengiriman" >

                                @error('resiPengiriman')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-md-2 col-form-label text-md-right">Status</label>
                            
                            <div class="col-md-6">
                                <select style="width: 475px;  padding: 12px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;  resize: vertical;" name="status">
                                    <option value="">Select status</option>
                                    <option value="Paid Off">paid off</option>
                                    <option value="Goods Shipped">Goods Shipped</option>
                                    <option value="Cancel">Cancel</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-0 mt-2">
                            <div class="col-md-8 offset-md-2" align="right">
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