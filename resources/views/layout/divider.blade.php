<section class="bg-theme-colored">
      <div class="container pt-0 pb-0">
        <div class="row">
          <div class="call-to-action pt-30 pb-20">
            <div class="col-sm-4 col-md-4">
              <div class="widget border-right mb-15"> <i class="fa fa-map text-white pull-left flip font-20 mr-30 mt-5"></i>
                <h5 class="text-white mb-5 font-14 font-weight-600"> 2 Ayo Rosiji Crescent, <br> Ikeja GRA, Lagos</h5>
              </div>
            </div>
            <div class="col-sm-4 col-md-4">
              <div class="widget mb-15"> <i class="fa fa-envelope-o text-white pull-left flip font-36 mr-30"></i>
                <h5 class="text-white mb-5 pt-5 font-weight-600 font-14"> support@mobilemedicalaid.com</h5>
              </div>
            </div>
            <div class="col-sm-4 col-md-4">
              <div class="widget mb-15"> 
                <!-- Mailchimp Subscription Form Starts Here -->
                <form id="mailchimp-subscription-form" class="newsletter-form mt-15">
                  <div class="input-group">
                    <input type="email" value="" name="EMAIL" placeholder="Your Email" class="form-control input-lg font-16" data-height="45px" id="mce-EMAIL1">
                    <span class="input-group-btn">
                      <button data-height="45px" class="btn btn-default btn-gray btn-xs font-14 m-0" type="submit">Subscribe</button>
                    </span> 
                  </div>
                </form>
                <!-- Mailchimp Subscription Form Validation--> 
                <script type="text/javascript">
                  $('#mailchimp-subscription-form').ajaxChimp({
                      callback: mailChimpCallBack,
                      url: '//thememascot.us9.list-manage.com/subscribe/post?u=a01f440178e35febc8cf4e51f&amp;id=49d6d30e1e'
                  });

                  function mailChimpCallBack(resp) {
                      // Hide any previous response text
                      var $mailchimpform = $('#mailchimp-subscription-form'),
                          $response = '';
                      $mailchimpform.children(".alert").remove();
                      if (resp.result === 'success') {
                          $response = '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + resp.msg + '</div>';
                      } else if (resp.result === 'error') {
                          $response = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + resp.msg + '</div>';
                      }
                      $mailchimpform.prepend($response);
                  }
                </script> 
                <!-- Mailchimp Subscription Form Ends Here --> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>