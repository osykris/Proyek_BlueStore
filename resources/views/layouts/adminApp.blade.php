<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="{!! asset('css/bootstrap.css') !!}" rel="stylesheet" type="text/css">
    
     <!-- FONTAWESOME STYLES-->
    <link href="{!! asset('css/font-awesome.css') !!}" rel="stylesheet" type="text/css">
     <!-- MORRIS CHART STYLES-->
    <link href="{!! asset('js/morris/morris-0.4.3.min.css') !!}" rel="stylesheet" type="text/css">
        <!-- CUSTOM STYLES-->
    <link href="{!! asset('css/custom.css') !!}" rel="stylesheet" type="text/css">
     <!-- GOOGLE FONTS-->
     <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a87e9d7c5f.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin Store</a> 
            </div>
        <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;">
            <form action="{{route('logoutAdmin')}}" method="POST">
            @csrf
                <button class="dropdown-item bg-danger" style="cursor:pointer">Log Out</button>
            </form>

        </div>
        </nav>   
           <!-- /. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				    <li class="text-center">
                    <img src="{!! asset('images/admin.png') !!}" class="user-image img-responsive"/>
					</li>
                    <li>
                        <a  href="{{ route('home') }}"><i class="fas fa-home fa-2x"></i> Home</a>
                    </li>
                    <li>
                        <a  href="{{ route('categories') }}"><i class="fas fa-icicles fa-2x"></i> Category</a>
                    </li>
                    <li>
                        <a  href="{{ route('product') }}"><i class="fas fa-tshirt fa-2x"></i> Product</a>
                    </li>
                    <li>
                        <a  href="{{ route('purchase') }}"><i class="fas fa-shopping-bag fa-2x"></i> Purchase</a>
                    </li>
					<li>
                        <a  href="{{ route('customers') }}"><i class="fas fa-users fa-2x"></i> Customer</a>
                    </li>	
                </ul>
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        @yield('content')
                    </div>
                </div>              
               
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert') 
    @yield('footerscripts')
</body>
</html>
