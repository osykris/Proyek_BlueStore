@extends('layouts.adminApp')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Home</h1>
                </div>
            </div>
        </div>
    </div>
    ​
    <!-- Main content -->
    <section class="content" id="dw">
        <div class="container-fluid">

            <!-- ABAIKAN DULU LINE INI KARENA AKAN DI MODIFIKASI SELANJUTNYA -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $product }}</h3>
                            <p><i class="fas fa-tshirt fa-3x"></i> Product</p>
                        </div> ​
                    </div>
                </div>
                ​
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $order }}</h3>
                            <p><i class="fas fa-shopping-bag fa-3x"></i> Order</p><br>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $user }}</h3>
                            <p><i class="fas fa-users fa-3x"></i> Customer</p><br>
                        </div>
                    </div>
                </div>
                <!-- SAMPAI LINE INI -->

                <!-- YANG PERLU DIPERHATIKAN ADALAH LINE DIBAWAH -->
                <div class="row">
                    <!-- CHART.JS MEMINTA ELEMENT YANG MEMILIKI ID dw-chart -->
                    <canvas id="dw-chart"></canvas>
                </div>
            </div>
    </section>
</div>

@endsection

@section('js')
<!-- LOAD FILE dashboard.js -->
<script src="{{ asset('js/dashboard.js') }}"></script>
@endsection

<!-- <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
</div> -->