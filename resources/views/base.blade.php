<!doctype html>
<html lang="en" dir="ltr">
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<meta name="msapplication-TileColor" content="#0f75ff">
		<meta name="theme-color" content="#2ddcd3">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<link rel="icon" href="favicon.ico" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

		<!-- Title -->
		<title>Mobile Medical Aid | @yield('title')</title>

		<meta name="csrf-token" content="{{ csrf_token() }}">

		<link rel="stylesheet" href="/assets/fonts/fonts/font-awesome.min.css">

		<!-- Font family -->
		<link href="../../../fonts.googleapis.com/css6618.css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

		<!-- Sidemenu Css -->
		<link href="/assets/plugins/fullside-menu/css/style.css" rel="stylesheet" />
		<link href="/assets/plugins/fullside-menu/waves.min.css" rel="stylesheet" />

		<!-- Bootstrap Css -->
		<link href="/assets/plugins/bootstrap-4.1.3/css/bootstrap.min.css" rel="stylesheet" />

		<!-- Dashboard Css -->
		<link href="/assets/css/dashboard.css" rel="stylesheet" />

		<!-- Custom scroll bar css-->
		<link href="/assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />

		<!---Font icons-->
		<link href="/assets/plugins/iconfonts/plugin.css" rel="stylesheet" />

		<!-- Favicon and Touch Icons -->
		<link href="/images/favicon.ico" rel="shortcut icon" type="image/png">

		@yield('style')

	
	</head>

	<body>
		<div id="loading"></div>
		<div class="page">
			<div class="page-main">
				{{-- header --}}
				   @include('layout.appheader')
				{{-- header ends --}}
				<div class="wrapper">
					<!-- Sidebar Holder -->
					<?php $role = $sessiondata["role"]; ?>
					@section('sidebar')
						@include($role.'/sidebar')
					@show

					{{-- content begins here --}}

					@yield('content')
							
					{{-- content ends here --}}

				</div>
			</div>

			<!--footer-->
			<footer class="footer">
				<div class="container">
					<div class="row align-items-center flex-row-reverse">
						<div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center">
							Copyright © 2018 <a href="#">Mobile Medical Aid </a>. Designed by <a href="#">Ewebs Team</a> All rights reserved.
						</div>
					</div>
				</div>
			</footer>
			<!-- End Footer-->
		</div>
		<!-- Back to top -->
		<a href="#top" id="back-to-top" ><i class="fa fa-angle-up"></i></a>


		<!-- Dashboard Core -->
		<script src="assets/js/vendors/jquery-3.2.1.min.js"></script>
		<script src="assets/plugins/bootstrap-4.1.3/popper.min.js"></script>
		<script src="assets/plugins/bootstrap-4.1.3/js/bootstrap.min.js"></script>
		<script src="assets/js/vendors/jquery.sparkline.min.js"></script>
		<script src="assets/js/vendors/selectize.min.js"></script>
		<script src="assets/js/vendors/jquery.tablesorter.min.js"></script>
		<script src="assets/js/vendors/circle-progress.min.js"></script>
		<script src="assets/plugins/rating/jquery.rating-stars.js"></script>

		<!-- Fullside-menu Js-->
		<script src="assets/plugins/fullside-menu/jquery.slimscroll.min.js"></script>
		<script src="assets/plugins/fullside-menu/waves.min.js"></script>

		<!-- ECharts Plugin -->
		<script src="assets/plugins/echarts/echarts.js"></script>

		<!-- Input Mask Plugin -->
		<script src="assets/plugins/input-mask/jquery.mask.min.js"></script>

		<!--Counters -->
		<script src="assets/plugins/counters/counterup.min.js"></script>
		<script src="assets/plugins/counters/waypoints.min.js"></script>

		<!-- Custom scroll bar Js-->
		<script src="assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

        <!-- Index Scripts -->
		<script src="assets/js/index4.js"></script>

		<!-- Custom-->
		<script src="assets/js/custom.js"></script>
		<script src="/js/ajax.js"></script>
		<!--Counters js-->
		<script>
			$('.count').countUp();
		</script>

		@yield('scripts')
	</body>

</html>