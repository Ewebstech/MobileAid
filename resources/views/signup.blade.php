<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>

<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="ThemeMascot" />

<!-- Page Title -->
<title>MobileAid | Register</title>

<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Favicon and Touch Icons -->
<link href="/site/images/favicon.png" rel="shortcut icon" type="image/png">
<link href="/site/images/apple-touch-icon.png" rel="apple-touch-icon">
<link href="/site/images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
<link href="/site/images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
<link href="/site/images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">

<!-- Stylesheet -->
<link href="/site/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/site/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link href="/site/css/animate.css" rel="stylesheet" type="text/css">
<link href="/site/css/css-plugin-collections.css" rel="stylesheet"/>
<!-- CSS | menuzord megamenu skins -->
<link id="menuzord-menu-skins" href="/site/css/menuzord-skins/menuzord-boxed.css" rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="/site/css/style-main.css" rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href="/site/css/preloader.css" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="/site/css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="/site/css/responsive.css" rel="stylesheet" type="text/css">
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
<!-- <link href="/site/css/style.css" rel="stylesheet" type="text/css"> -->

<!-- CSS | Theme Color -->
<link href="/site/css/colors/theme-skin-sky-blue.css" rel="stylesheet" type="text/css">

<!-- external javascripts -->
<script src="/site/js/jquery-2.2.4.min.js"></script>
<script src="/site/js/jquery-ui.min.js"></script>
<script src="/site/js/bootstrap.min.js"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="/site/js/jquery-plugin-collection.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="/site/https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="/site/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="">
<div id="wrapper" class="clearfix">
  <!-- preloader -->
  <div id="preloader">
    <div id="spinner">
      <div class="preloader-dot-loading">
        <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
      </div>
    </div>
    <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
  </div>

  <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: home -->
    <section id="home" class="divider bg-lighter">
      <div class="display-table">
        <div class="display-table-cell">
          <div class="container">
            <div class="row">
              <div class="col-md-6 col-md-push-3">
               
                <div class="bg-lightest border-1px p-30 mb-0">
                  <div class="text-center"><a href="/site/#" class=""><img src="/site/img/MAlogo.JPG" alt="" style="width: 150px; height: 70px !important; margin:5px"></a></div>
                  <hr>
                  <h3 class="text-theme-colored mt-0 text-center">Quick Signup</h3>
                  <p></p>
                  <hr>
                  <form id="" action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
                  
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Firstname <small>*</small></label>
                          <input type="text" name="firstname" placeholder="Enter First Name" required="required" class="form-control">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Lastname <small>*</small></label>
                          <input name="lastname" class="form-control required email" type="text" placeholder="Enter Last Name" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Email <small>*</small></label>
                      <input name="email" type="email" placeholder="Enter a valid Email Address" required="required" class="form-control">
                    </div>
                    <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Gender <small>*</small></label>
                          <select name="gender" class="form-control required">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Phone Number <small>*</small></label>
                          <input name="phonenumber" class="form-control required" type="number" placeholder="Ex. +234 903 000 4446" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <input name="form_botcheck" class="form-control" type="hidden" value="" />
                      <button type="submit" class="btn btn-block btn-dark btn-theme-colored btn-sm mt-20 pt-10 pb-10">Signup Now</button>
                    </div>
                  </form>

                  <!-- Job Form Validation-->
                  <script type="text/javascript">
                    $("#job_apply_form").validate({
                      submitHandler: function(form) {
                        var form_btn = $(form).find('button[type="submit"]');
                        var form_result_div = '#form-result';
                        $(form_result_div).remove();
                        form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                        var form_btn_old_msg = form_btn.html();
                        form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                        $(form).ajaxSubmit({
                          dataType:  'json',
                          success: function(data) {
                            if( data.status == 'true' ) {
                              $(form).find('.form-control').val('');
                            }
                            form_btn.prop('disabled', false).html(form_btn_old_msg);
                            $(form_result_div).html(data.message).fadeIn('slow');
                            setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                          }
                        });
                      }
                    });
                  </script>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> 
  </div>  
  <!-- end main-content -->

  <!-- Footer -->
  <footer id="footer" class="footer bg-black-222">
    <div class="container p-20">
      <div class="row">
        <div class="col-md-12 text-center">
          <p class="mb-0">Copyright &copy;2018 Mobile Medical Aid. All Rights Reserved</p>
        </div>
      </div>
    </div>
  </footer>
  <a class="scrollToTop" href="/site/#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script src="/site/js/custom.js"></script>

</body>

</html>