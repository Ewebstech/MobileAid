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
@include('layout.header')

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
                  <p class="text-center"><i>* We ensure absolute security for all patients medical Information<br>Please ensure you provide accurate details</i></p>
                  <hr>
                    <div class="form-group" id="signup-msg"></div>
                  <form id="signup-form" enctype="multipart/form-data">
                  {{csrf_field()}}
                   <input type="hidden" name="view" value="1" />
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
                        <select class="form-control" name="role" required>
                          <option value="patient">I'd Like To Join As A Patient</option>
                          <option value="doctor">I'd Like To Join As A Doctor</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label>Email <small>*</small></label>
                      <input name="email" type="email" placeholder="Enter a valid Email Address" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Choose Password <small>*</small></label>
                      <input id="password" name="password" type="password" placeholder="Choose Password"  class="form-control col-md-10">
                      <i id="toggle-password" class="col-md-2 fa fa-eye" onclick="togglepass()" style="float: right; margin-top: -30px; font-size: 13pt; "></i>
                    </div>
                    <br><br>
                    <div class="form-group">
                      <input name="form_botcheck" class="form-control" type="hidden" value="" />
                      <button type="submit" class="btn btn-block btn-dark btn-theme-colored btn-sm mt-20 pt-10 pb-10">Signup Now</button>
                    </div>
                  </form>
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
          <p class="mb-0">Copyright &copy; 2018 Mobile Medical Aid. All Rights Reserved</p>
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
<script src="/js/ajax.js"></script>
<script>

// toggle password visibility
  function togglepass(){
      //$(this).closest("#toggle-password").toggleClass("fa-eye fa-eye-slash");
      $("#toggle-password").toggleClass("fa-eye fa-eye-slash");
      var pwdfield = document.getElementById('password');
      if (pwdfield.type === "password"){
          pwdfield.type = "text";
      } else{
          pwdfield.type = "password";
      }
  }

  $("#signup-form").submit(function (e) {
      e.preventDefault();
      submit_reg_form('signup-form', "{{ route('register') }}", 'signup-msg', true);
  });
</script>
</body>

</html>