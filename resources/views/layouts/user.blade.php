<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{csrf_token()}}">
	<title>Jalur Mandiri | User</title>
	<!-- core:css -->
	<link rel="stylesheet" href="{{ asset('assets/vendors/core/core.css') }}">
	<!-- endinject -->
	<!-- plugin css for this page -->
	<link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendors/owl.carousel/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendors/owl.carousel/owl.theme.default.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendors/animate.css/animate.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendors/animate.css/animate.min.css') }}">
	<!-- end plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
	<!-- endinject -->
	<!-- Layout styles -->  
	<link rel="stylesheet" href="{{ asset('assets/css/demo_1/style.css') }}">
	<!-- End layout styles -->
	<link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
	<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.js"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

	<link href="{{ asset('assets-guest/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<style type="text/css">
		.section {
			padding-bottom: 50px;
			position: relative;
		}
		.pricing-box {
			padding: 30px 24px;
			position: relative;
		}

		.pricing-badge {
			position: absolute;
			top: 0;
			z-index: 999;
			right: 0;
			width: 100%;
			display: block;
			font-size: 15px;
			padding: 0;
			overflow: hidden;
			height: 100px;
		}

		.pricing-badge .badge {
			float: right;
			-webkit-transform: rotate(45deg);
			transform: rotate(45deg);
			right: -67px;
			top: 17px;
			position: relative;
			text-align: center;
			width: 200px;
			font-size: 13px;
			margin: 0;
			padding: 7px 10px;
			font-weight: 500;
			color: #ffffff;
			background: #4252f9;
		}
		.pricing-tab-border {
			border: 1px solid #e6effe;
		}

		.big{ width: 20px; height: 20px; }
		.form-check-label{margin-left: 1rem !important;}

		video {
			width: 100%;
			height: auto;
			object-fit: fill; // use "cover" to avoid distortion
			position: absolute;
		}

	</style>


</head>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper">
			<!--Page Navbar Start-->
			@include('layouts.user.navbar')
			<!--Page Navbar Ends-->
			<!--Page Sidebar Start-->
			@include('layouts.user.sidebar')
			<!--Page Sidebar Ends-->
			<!--Page Content Start-->
			@yield('content')
			<!--Page Content Ends-->
			<!--Page Footer Start-->
			@include('layouts.user.footer')
			<!--Page Footer Ends-->
		</div>
	</div>

	<!-- core:js -->
	<script src="{{ URL::asset('/assets/vendors/core/core.js') }}"></script>
	<!-- endinject -->
	<!-- plugin js for this page -->
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
	<script src="{{ URL::asset('/assets/vendors/chartjs/Chart.min.js') }}"></script>
	<script src="{{ URL::asset('/assets/vendors/jquery.flot/jquery.flot.js') }}"></script>
	<script src="{{ URL::asset('/assets/vendors/jquery.flot/jquery.flot.resize.js') }}"></script>
	<script src="{{ URL::asset('/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
	<script src="{{ URL::asset('/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
	<script src="{{ URL::asset('/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="{{ URL::asset('/assets/vendors/owl.carousel/owl.carousel.min.js') }}"></script>
	<script src="{{ URL::asset('/assets/vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ URL::asset('/assets/vendors/chartjs/Chart.min.js') }}"></script>
	<script src="{{ URL::asset('/assets/js/template.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<!-- endinject -->
	<!-- custom js for this page -->
	<script src="{{ URL::asset('/assets/js/dashboard.js') }}"></script>
	<script src="{{ URL::asset('/assets/js/carousel.js') }}"></script>

	<script type="text/javascript">
		$('video').attr('controlsList', 'nodownload')
	</script>

	<!-- <script type="text/javascript">
		$(document).ready(function(){
			$(document).keydown(function (event) {
				if (event.keyCode == 123) { 
					return false;
				} else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {      
					return false;
				}
			});

			$(document).on("contextmenu", function (e) {        
				e.preventDefault();
			});
		})
	</script> -->
	<!-- end custom js for this page -->
</body>
</html>    
