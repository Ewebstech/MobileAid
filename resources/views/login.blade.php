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
	<title>Mobile Medical Aid | Login </title>
	<link rel="stylesheet" href="assets/fonts/fonts/font-awesome.min.css">

	<!-- Font Family-->
	<link href="../../../fonts.googleapis.com/css6618.css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

	<!-- Bootstrap Css -->
	<link href="assets/plugins/bootstrap-4.1.3/css/bootstrap.min.css" rel="stylesheet" />
	
	<!-- Sidemenu Css -->
	<link href="assets/plugins/fullside-menu/css/style.css" rel="stylesheet" />
	<link href="assets/plugins/fullside-menu/waves.min.css" rel="stylesheet" />

	<!-- Dashboard css -->
	<link href="assets/css/dashboard.css" rel="stylesheet" />

	<!-- c3.js Charts Plugin -->
	<link href="assets/plugins/charts-c3/c3-chart.css" rel="stylesheet" />

	<!---Font icons-->
	<link href="assets/plugins/iconfonts/plugin.css" rel="stylesheet" />

	<!-- Favicon and Touch Icons -->
	<link href="/images/favicon.ico" rel="shortcut icon" type="image/png">

</head>
	<body class="">
		<div id="loading"></div>

		<div class="overlay"></div>
		<div class="background login-img"></div>
		<div class="masthead">
			<div class="masthead-bg"></div>
			<div class="container h-100">
				<div class="row h-100">
					<div class="col-12 my-auto">
						<div class="masthead-content text-dark py-5 py-md-0">
							<form id="login-form" class="">
									{{csrf_field()}}
								<div class="text-center mb-3" style="background: #fff; padding: 6px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                                        <a href='./'><img src="/site/img/MAlogo.JPG" alt="" style="width: 100px; height: 60px !important; margin:5px; "></a>
								</div>
								<div class="card">
									<div class="card-body">
										<div class="card-title text-center text-dark">Login to your Account</div>
										<?php if(isset($_REQUEST['cont'])){ ?>
											<div class="alert alert-danger" style="font-size: 12px !important; text-align: center;"><i class="fa fa-sign-in"></i> Please Sign-in to Continue</div>
										<?php } ?>
										<div id="login-msg" style="font-size: 10px !important;"></div>
										<div class="form-group">
											<label class="form-label text-dark">Email Address / Phone Number</label>
											<input type="text" name="loginparam" class="form-control" placeholder="Email -/- Phonenumber " required>
										</div>
										<div class="form-group">
											<label class="form-label text-dark">Password</label>
											<input type="password" name="password" required class="form-control" id="password" placeholder="Password">
										</div>
										<div class="form-group">
											<label class="custom-control custom-checkbox">
												<a href="forgot-password.html" class="float-right small text-dark">Forgot password?</a>
												<input type="checkbox" name="remember" class="custom-control-input" />
												<span class="custom-control-label text-dark">Remember me</span>
											</label>
										</div>
										<input type="hidden" name="view" value="1" />
										<div class="form-footer mt-2">
											<button type="submit" class="btn btn-success btn-block">Sign In</>
										</div>
										<div class="text-center  mt-3 text-dark">
											No Account Yet? Please - <a href="/signup" style='font-weight: bold; color: #999;'>Sign-Up</a>
										</div>
										<hr class="divider">
										<div class="mt-2">
											<a href="https://www.facebook.com/" class="btn btn-facebook btn-block">Sign In via Facebook</a>
											<a href="./" class="btn btn-info btn-block">Go to Homepage</a>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>



		<!-- Dashboard js -->
		<script src="assets/js/vendors/jquery-3.2.1.min.js"></script>
		<script src="assets/plugins/bootstrap-4.1.3/popper.min.js"></script>
		<script src="assets/plugins/bootstrap-4.1.3/js/bootstrap.min.js"></script>
		<script src="assets/js/vendors/jquery.sparkline.min.js"></script>
		<script src="assets/js/vendors/selectize.min.js"></script>
		<script src="assets/js/vendors/jquery.tablesorter.min.js"></script>
		<script src="assets/js/vendors/circle-progress.min.js"></script>
		<script src="assets/plugins/rating/jquery.rating-stars.js"></script>
		
		<!-- Custom scroll bar Js-->
		<script src="assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>
		
		<!-- Fullside-menu Js-->
		<script src="assets/plugins/fullside-menu/jquery.slimscroll.min.js"></script>
		<script src="assets/plugins/fullside-menu/waves.min.js"></script>

		<!-- Custom Js-->
		<script src="assets/js/custom.js"></script>
		<script src="/js/ajax.js"></script>

		<script>
			$("#login-form").submit(function (e) {
				e.preventDefault();
				submit_form('login-form', "{{ route('login') }}", 'login-msg', true);
			});
		</script>
	
	</body>
</html>