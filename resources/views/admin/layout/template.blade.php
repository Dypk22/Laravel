<!DOCTYPE html>

<html lang="en">

   <head>

      <!-- Favicon Icon -->

      <link rel="icon" type="image/png" href="">

      <meta charset="utf-8">

      <meta http-equiv="X-UA-Compatible" content="IE=edge">

      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <title>{{config('constants.site_name').' | Management Panel'}}</title>

      <link href="{{asset('admin/assets/css/styles.css')}}" rel="stylesheet">

      <link href="{{asset('admin/assets/css/admin-style.css')}}" rel="stylesheet">

      <link href="{{asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

      <link href="{{asset('admin/assets/vendor/toastr_alert/toastr.css')}}" rel="stylesheet">

      <link href="{{asset('admin/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">

      <link href="{{asset('admin/assets/vendor/datatable/jquery.dataTables.min.css')}}" rel="stylesheet">

      @stack('css')

   </head>

   <body class="sb-nav-fixed">

		@include('admin.layout.header')

		<div id="layoutSidenav">

		   <div id="layoutSidenav_nav">

			@include('admin.layout.sidebar')

		   </div>

		   <div id="layoutSidenav_content">

		      @section('content')

		      @show

			  @include('admin.layout.footer')      

		   </div>

		</div>

		<script src="{{asset('admin/assets/js/jquery-3.4.1.min.js')}}"></script>

		<script src="{{asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

		<script src="{{asset('admin/assets/vendor/chart/highcharts.js')}}"></script>

		<script src="{{asset('admin/assets/vendor/chart/exporting.js')}}"></script>

		<script src="{{asset('admin/assets/vendor/chart/export-data.js')}}"></script>

		<script src="{{asset('admin/assets/vendor/chart/accessibility.js')}}"></script>

		<script src="{{asset('admin/assets/js/scripts.js')}}"></script>

		<script src="{{asset('admin/assets/js/chart.js')}}"></script>

		<script src="{{asset('admin/assets/js/main.js')}}"></script>

		<script src="{{asset('admin/assets/vendor/toastr_alert/toastr.min.js')}}"></script>

		

		<script src="{{asset('admin/assets/vendor/datatable/jquery.dataTables.min.js')}}"></script>



		@stack('scripts')

   </body>

</html>