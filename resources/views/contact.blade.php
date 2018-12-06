<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>

<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="DrPonits - Nonprofit, Crowdfunding & Charity HTML5 Template" />
<meta name="keywords" content="emergency,cough,health,wellness" />
<meta name="author" content="Emmanuel C. Paul" />

<!-- Page Title -->
<title>2MA | Contact</title>

<!-- Favicon and Touch Icons -->
<link href="/site/images/favicon.png" rel="shortcut icon" type="image/png">
<link href="/site/images/apple-touch-icon.png" rel="apple-touch-icon">
<link href="/site/images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
<link href="/site/images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
<link href="/site/images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- header -->
    @include('layout.header')

    <section class="inner-header divider parallax layer-overlay overlay-white-8" data-bg-img="/site/img/health-insurance-min.jpg">
      <div class="container pt-10 pb-10">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center">
            
              <ol class="breadcrumb text-center text-black text-bold mt-10">
                <li><a href="/">Home</a></li>
                <li class="active text-theme-colored">Contact Us</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>
   <!-- Section: About  -->
   <section>
       
      <div class="container">
        <div class="section-content">
          <div class="row">
               <!-- Divider: Contact -->
    <section class="divider">
            <div class="container">
              <div class="row pt-30">
                <div class="col-md-4">
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="icon-box left media bg-deep p-30 mb-20"> <a class="media-left pull-left" href="#"> <i class="pe-7s-map-2 text-theme-colored"></i></a>
                        <div class="media-body">
                          <h5 class="mt-0">Our Office Location</h5>
                          <p>GRA, Ikeja, Lagos</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-12">
                      <div class="icon-box left media bg-deep p-30 mb-20"> <a class="media-left pull-left" href="#"> <i class="pe-7s-call text-theme-colored"></i></a>
                        <div class="media-body">
                          <h5 class="mt-0">Contact Number</h5>
                          <p>+234-814-990-6511</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-12">
                      <div class="icon-box left media bg-deep p-30 mb-20"> <a class="media-left pull-left" href="#"> <i class="pe-7s-mail text-theme-colored"></i></a>
                        <div class="media-body">
                          <h5 class="mt-0">Email Address</h5>
                          <p>support@mobilemedicalaid.com</p>
                        </div>
                      </div>
                    </div>
              
                  </div>
                </div>
                <div class="col-md-8">
                  <h3 class="line-bottom mt-0 mb-30">Interested in discussing?</h3>
                  <!-- Contact Form -->
                  <div id="contact-msg"></div>
                  <form id="contact_form" name="contact_form">
                    {{csrf_field()}}
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Full Name <small>*</small></label>
                          <input name="name" class="form-control" type="text" placeholder="Enter Full Name" required="">
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Email <small>*</small></label>
                          <input name="email" class="form-control required email" type="email" placeholder="Enter Email">
                        </div>
                      </div>
                    </div>
                      
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Subject <small>*</small></label>
                          <input name="subject" class="form-control required" type="text" placeholder="Enter Subject">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Phone</label>
                          <input name="phone" class="form-control" type="text" placeholder="Enter Your Phone Number">
                        </div>
                      </div>
                    </div>
      
                    <div class="form-group">
                      <label>Message</label>
                      <textarea name="message" class="form-control required" rows="5" placeholder="Enter Message"></textarea>
                    </div>
                    
                    <div class="form-group">
                      <input name="form_botcheck" class="form-control" type="hidden" value="" />
                      <button type="submit" class="btn btn-dark btn-theme-colored btn-flat mr-5" >Send your message</button>
                    </div>
                  </form>
      
                  <!-- Contact Form Validation-->
                  <script type="text/javascript">
                        $("#contact_form").submit(function (e) {
                            e.preventDefault();
                            submit_form_no_reload('contact_form', "{{ route('contactPage') }}", 'contact-msg', true);
                            $('#contact_form')[0].reset();
                        });
                  </script>
                </div>
              </div>
            </div>
          </section>
          </div>
        </div>
      </div>
    </section>

  <!-- Divider: Call To Action -->
  @include('layout.divider')
  </div>
  <!-- end main-content -->
  
  <!-- Footer -->
    @include('layout.footer')

  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script src="/site/js/custom.js"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
      (Load Extensions only on Local File Systems ! 
       The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="/site/js/revolution-slider/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="/site/js/revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="/site/js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="/site/js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="/site/js/revolution-slider/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="/site/js/revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="/site/js/revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="/site/js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="/site/js/revolution-slider/js/extensions/revolution.extension.video.min.js"></script>

</body>
</html>