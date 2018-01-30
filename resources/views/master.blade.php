<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{ asset('dist/css/skins/skin-blue.min.css') }}">

<!-- my Custom Css  -->
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="skin-blue">
<div class="wrapper">

    <!-- Header -->
    @include('partials.header')

    <!-- Sidebar -->
    @include('partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('header')
            </h1>
        </section>
        @include('partials.flashMessage')
        <!-- Main content -->

        <section class="content">

            @if(Request::path() == 'admin')
               <!-- Your Page Content Here -->
               <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <a href="{{ route('categories.index') }}">
                    <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion-ios-keypad-outline"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Categories</span>
                      <span class="info-box-number">{{ $allCategories }}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                  </a>
                </div>
                <!-- /.col -->
                
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <a href="{{ route('subCategories.index') }}">
                    <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion-ios-grid-view-outline"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Sub-Categories</span>
                      <span class="info-box-number">{{ $allSubCategories }}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  </a>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                
                <div class="col-md-3 col-sm-6 col-xs-12">
                 <a href="{{ route('companies.index') }}">
                    <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-building"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Companies</span>
                      <span class="info-box-number">{{ $allCompanies }}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                 </a>
                </div>
                <!-- /.col -->
                
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <a href="{{ route('branches.index') }}">
                    <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-industry"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Branches</span>
                      <span class="info-box-number">{{ $allBranches }}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                  </a>
                </div>
                <!-- /.col -->
              </div>
            @endif
            @yield('content')

           
        </section><!-- /.content -->

    </div><!-- /.content-wrapper -->

    <!-- Footer -->
    @include('partials.footer')

</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

<!-- my Custom Js  -->
<script src="{{ asset('js/customJs.js') }}"></script>

</body>
</html>