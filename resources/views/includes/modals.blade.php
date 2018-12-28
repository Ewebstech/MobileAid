	<!-- Add Doctors Modal -->
    <div class="modal fade" id="addDoctors" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="example-Modal3"><i class="fa fa-user-md"></i> Exclusive Doctor's Registration</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="docsignup-form" enctype="multipart/form-data">
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
                            <label>Email <small>*</small></label>
                            <input name="email" type="email" placeholder="Enter a valid Email Address" required="required" class="form-control">
                          </div>
        
                          <div class="form-group" id="signup-msg"></div>
                          <input type="hidden" name="role" value="doctor"/> 
                          <div class="form-group">
                            <input name="form_botcheck" class="form-control" type="hidden" value="" />
                            <button type="submit" class="btn btn-block btn-blue"><i class="fa fa-check-circle"></i> Add Doctor</button>
                          </div>
                        </form>
                </div>
               
            </div>
        </div>
    </div>

    	<!-- Add Doctors Modal -->
      <div class="modal fade" id="caseReports" tabindex="-1" role="dialog"  aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="example-Modal3"><i class="fa fa-user-md"></i> Case Report Sheet for - <b><span id="clientName"></span></b></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                     
                      <form id="report-form" enctype="multipart/form-data">
                          {{csrf_field()}}
                  
                          <div class="row">
                              <div class="col-sm-6" style="float: left;">
                                <label style="font-weight: bold;"><i class="fa fa-user"></i> Client Name: </label><br>
                                <input type="text" class="form-control" name="Name" value="" readonly/>
                              </div>
                              <div class="col-sm-6">
                               <label style="font-weight: bold;">Case ID: </label><br><input type="text" class="form-control" name="caseId" value="" readonly/>
                              </div>
                          </div>
                      
                           <input type="hidden" name="view" value="1" />
                            <div class="row" style="margin-top: 8px;">
                              <div class="col-sm-12">
                                <div class="form-group">
                                  <label><b>Case Report</b> <small>*</small></label>
                                  <textarea  id="textreport"  required="required" class="form-control"></textarea>
                                </div>
                              </div>
                            </div>          
                            <div class="form-group" id="report-msg"></div>
                            <input type="hidden" name="role" value="doctor"/> 
                            <div class="form-group">
                              <input name="form_botcheck" class="form-control" type="hidden" value="" />
                              <button type="submit" class="btn btn-block btn-blue"><i class="fa fa-check-circle"></i> Save Report</button>
                            </div>
                          </form>
                  </div>
                 
              </div>
          </div>
      </div>

    <!-- external javascripts -->
<script src="/site/js/jquery-2.2.4.min.js"></script>
<script src="/site/js/jquery-ui.min.js"></script>
<script src="/site/js/bootstrap.min.js"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="/site/js/jquery-plugin-collection.js"></script>

<!-- Revolution Slider 5.x SCRIPTS -->
<script src="/site/js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
<script src="/site/js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>

<script src="/js/toastr/toastr.min.js"></script>

<script src="/js/ajax.js"></script>

<script src="/ckeditor/ckeditor.js"></script>
<script>
    $("#docsignup-form").submit(function (e) {
       // alert("lalslas");
        e.preventDefault();
        submit_reg_form('docsignup-form', "{{ route('registerdoc') }}", 'signup-msg', true);
    });

    CKEDITOR.replace('textreport');
    
    $("#report-form").submit(function (e) {
        e.preventDefault();
        var data = [CKEDITOR.instances.textreport.getData()];
        submit_form('report-form', "{{ route('saveReport') }}", 'report-msg', true, false, data);
    });

</script>