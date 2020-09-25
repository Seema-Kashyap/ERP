

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="images/favicon.ico" type="image/ico" />
        <title>WeExpan ERP</title>
        <!-- Bootstrap -->
        <link href="{{ asset('public/backEnd/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{ asset('public/backEnd/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <!-- NProgress -->
        <link href="{{ asset('public/backEnd/nprogress/nprogress.css" rel="stylesheet') }}">
        <!-- iCheck -->
        <link href="{{ asset('public/backEnd/iCheck/skins/flat/green.css') }}" rel="stylesheet">
        <!-- bootstrap-progressbar -->
        <link href="{{ asset('public/backEnd/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
        <!-- JQVMap -->
        <link href="{{ asset('public/backEnd/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
        <!-- bootstrap-daterangepicker -->
        <link href="{{ asset('public/backEnd/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
        <!-- bootstrap-datetimepicker -->
        <link href="{{ asset('public/backEnd/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css')}}" rel="stylesheet">
        <!-- Datatables -->
    
        <link href="{{ asset('public/backEnd/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/backEnd/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/backEnd/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/backEnd/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/backEnd/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
        
        <!-- Custom Theme Style -->
        <link href="{{ asset('public/backEnd/build/css/custom.min.css')}}" rel="stylesheet">
        <!-- Toaster -->
        <link href="{{ asset('public/backEnd/toastr.min.css')}}" rel="stylesheet">
        <!-- Sweet Alert -->
        <link href="{{ asset('public/backEnd/sweetalert2.min.css')}}" rel="stylesheet">
        <!-- Light Gallery -->
        <link href="{{ asset('public/backEnd/lightgallery.css')}}" rel="stylesheet">

        <!-- jQuery -->
        <script src="{{ asset('public/backEnd/jquery/dist/jquery.min.js')}}"></script>
    </head>
    <body class="nav-md">
        <div class="loader_fixed" style="display: none;">
            <div class="loader"></div>
        </div>
        <div class="container body">
            <div class="main_container">
                <!-- /top navigation -->
                <!-- page content -->
                <div class="right_col" role="main" style="margin-left:0px !important">
                    <div class="">
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 ">
                                <div class="x_panel">
                                    <div class="x_content">
                                        <img src="{{asset('public/images/logo.png')}}" style="display: block;margin: 0 auto;width: 250px;/*! height: 200px; */">
                                        <!-- End SmartWizard Content -->
                                        <h2>Employee Form Step 3</h2>
                                        <!-- Tabs -->
                                        <div style="border-top: 1px solid #e5e5e5;" id="wizard_verticle" class="form_wizard wizard_verticle">
                                            <ul class="list-unstyled wizard_steps col-md-3">
                                                <li style="margin-top: 60px;">
                                                    <a class="done" href="#step-1" isdone="1" rel="1">
                                                    <span class="step_no">1</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="done" href="#step-2" isdone="1" rel="2">
                                                    <span class="step_no">2</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="selected" href="#step-3" isdone="1" rel="3">
                                                    <span class="step_no">3</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="disabled" href="#step-4" isdone="0" rel="4">
                                                    <span class="step_no">4</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div id="step-2" class="col-md-9">
                                                <h2 class="StepTitle"></h2>
                                                <form method="post" action=""  data-parsley-validate class="employee_form_step_3" enctype="multipart/form-data">
                                                    <span style="margin: 10px auto;" class="section">Your Personal Documents Upload Step 3</span>
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Passport Size Images Preview</label>
                                                        <div class="col-md-6 col-sm-6 mb-50 ">
                                                            <div class="col-sm-12 col-md-12 passport_size_images " style="padding: 0; border: 1px solid #ced4da">

                                                                <?php if(!empty($employee_documents_edit->emp_img)){

                                                                    $passport_size_images = explode(",",$employee_documents_edit->emp_img);

                                                                    foreach ($passport_size_images as $key => $value) {
                                                                ?>
                                                                <a href="{{employeePassportImagePath.'/'.$value}}">
                                                                    <img src="{{employeePassportImagePath.'/'.$value}}" width="40%" height="100%">
                                                                </a>

                                                                <?php } }else{ ?>
                                                                    <img style="display: block !important; margin:0 auto !important" src="{{DefaultImgPath}}" width="40%" height="100%" id="old_images_passport"  alt="No image"  >
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Passport Size Images Upload</label>
                                                        <div class="col-md-6 col-sm-6 mb-3">
                                                            <input type="file" class="form-control img_upload_passport_images" name="passport_size_images[]" multiple accept=".jpg, .jpeg, .png" />
                                                        </div>
                                                    </div>
                                                    <?php 
                                                        if(!empty($employee_documents_edit->emp_pan_card)) {

                                                            $image = employeePancardImageBasePath.'/'.$employee_documents_edit->emp_pan_card;
                                                        }else{
                                                            $image = DefaultImgPath;
                                                        }
                                                    ?>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Pan Card Image Preview</label>
                                                        <div class="col-md-6 col-sm-6 mb-50">
                                                            <div class="col-sm-12 pan_card_div " style="padding: 0; border: 1px solid #ced4da;text-align: center;">
                                                                <a href="{{url($image)}}">
                                                                    
                                                                    <img src="{{url($image)}}" width="40%" height="100%" id="old_image_pan_card"  alt="No image"  >
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Pan Card Image Upload</label>
                                                        <div class="col-md-6 col-sm-6 mb-3">
                                                            <input type="file" class="form-control img_upload_pan_card" name="pan_card_image" accept=".jpg, .jpeg, .png">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Passport Images Preview</label>
                                                        <div class="col-md-6 col-sm-6 mb-50 ">
                                                            <div class="col-sm-12 col-md-12 id_proof_passport_images" style="padding: 0; border: 1px solid #ced4da">

                                                                <?php if(!empty($employee_documents_edit->emp_passport)){

                                                                    $passport_images = explode(",",$employee_documents_edit->emp_passport);

                                                                    foreach ($passport_images as $key => $value) {
                                                                ?>
                                                                <a href="{{employeePassportImagesPath.'/'.$value}}">
                                                                    <img src="{{employeePassportImagesPath.'/'.$value}}" width="40%" height="100%">
                                                                </a>

                                                                <?php } }else{ ?>
                                                                    <img style="display: block !important; margin:0 auto !important;" src="{{DefaultImgPath}}" width="40%" height="100%" id="id_proof_old_passport_images"  alt="No image"  >
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Passport Images Upload (Optional)</label>
                                                        <div class="col-md-6 col-sm-6 mb-3">
                                                            <input type="file" class="form-control passport_images_file_upload" name="passport_images[]" multiple accept=".jpg, .jpeg, .png" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Aadhaar Card Images Preview</label>
                                                        <div class="col-md-6 col-sm-6 mb-50 ">
                                                            <div class="col-sm-12 col-md-12 id_proof_aadhaar_card_images light_gallery " style="padding: 0; border: 1px solid #ced4da">
                                                                <?php if(!empty($employee_documents_edit->emp_aadhaar_card)){

                                                                    $aadhaar_card_images = explode(",",$employee_documents_edit->emp_aadhaar_card);

                                                                    foreach ($aadhaar_card_images as $key => $value) {
                                                                ?>
                                                                <a href="{{employeeAadhaarCardImagesPath.'/'.$value}}">
                                                                    <img src="{{employeeAadhaarCardImagesPath.'/'.$value}}" width="40%" height="100%">
                                                                </a>

                                                                <?php } }else{ ?>
                                                                    <img style="display: block !important; margin:0 auto !important;" src="{{DefaultImgPath}}" width="40%" height="100%" id="id_proof_old_aadhaar_card_images"  alt="No image"  >
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Aadhaar Card Images Upload</label>
                                                        <div class="col-md-6 col-sm-6 mb-3">
                                                            <input type="file" class="form-control aadhaar_card_images_file_upload" name="aadhaar_card_images[]" multiple accept=".jpg, .jpeg, .png" />
                                                        </div>
                                                    </div>
                                                    <?php 
                                                        if(!empty($employee_documents_edit->emp_tenth_qualification_img)) {

                                                            $image = tenthQualificationImagePath.'/'.$employee_documents_edit->emp_tenth_qualification_img;
                                                        }else{
                                                            $image = DefaultImgPath;
                                                        }
                                                    ?>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Tenth Qualification Image Preview</label>
                                                        <div class="col-md-6 col-sm-6 mb-50">
                                                            <div class="col-sm-12 tenth_div" style="padding: 0; border: 1px solid #ced4da;text-align: center; ">
                                                                <a href="{{url($image)}}">
                                                                    <img src="{{$image}}" width="40%" height="100%" id="old_image_tenth"  alt="No image">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Tenth Qualification Image Upload</label>
                                                        <div class="col-md-6 col-sm-6 mb-3 ">
                                                            <input type="file" class="form-control img_upload_tenth" name="tenth_image" accept=".jpg, .jpeg, .png">
                                                        </div>
                                                    </div> 
                                                    <?php 
                                                        if(!empty($employee_documents_edit->emp_twelve_qualification_img)) {

                                                            $image = twelveQualificationImagePath.'/'.$employee_documents_edit->emp_twelve_qualification_img;
                                                        }else{
                                                            $image = DefaultImgPath;
                                                        }
                                                    ?>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">12th Qualification Image Preview</label>
                                                        <div class="col-md-6 col-sm-6 mb-50">
                                                            <div class="col-sm-12 twelve_div" style="padding: 0; border: 1px solid #ced4da;text-align: center;">
                                                                <a href="{{url($image)}}">
                                                                    <img src="{{$image}}" width="40%" height="100%" id="old_image_twelve"  alt="No image">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">12th Qualification Image Upload</label>
                                                        <div class="col-md-6 col-sm-6 mb-3">
                                                            <input type="file" class="form-control img_upload_twelve" name="twelve_image" accept=".jpg, .jpeg, .png">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Other Qualification Images Preview</label>
                                                        <div class="col-md-6 col-sm-6 mb-50 ">
                                                            <div class="col-sm-12 col-md-12 other_qualification_img " style="padding: 0; border: 1px solid #ced4da">
                                                                <?php if(!empty($employee_documents_edit->emp_other_qualification_img)){

                                                                    $emp_other_qualification_img = explode(",",$employee_documents_edit->emp_other_qualification_img);

                                                                    foreach ($emp_other_qualification_img as $key => $value) {
                                                                ?>
                                                                <a href="{{otherQualificationImagePath.'/'.$value}}">
                                                                    <img src="{{otherQualificationImagePath.'/'.$value}}" width="40%" height="100%">
                                                                </a>

                                                                <?php } }else{ ?>
                                                                    <img style="display: block !important; margin:0 auto !important;" src="{{DefaultImgPath}}" width="40%" height="100%" id="id_proof_other_qualification_img"  alt="No image">
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Other Qualification Images Upload (Optional)</label>
                                                        <div class="col-md-6 col-sm-6 mb-3">
                                                            <input type="file" class="form-control img_upload_other_qualification_img" name="other_qualification_img[]" multiple accept=".jpg, .jpeg, .png" />
                                                        </div>
                                                    </div> 
                                                    <?php 
                                                        if(!empty($employee_documents_edit->emp_graduation_img)) {

                                                            $image = graduationImagePath.'/'.$employee_documents_edit->emp_graduation_img;
                                                        }else{
                                                            $image = DefaultImgPath;
                                                        }
                                                    ?>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Graduation Image Preview</label>
                                                        <div class="col-md-6 col-sm-6 mb-50">
                                                            <div class="col-sm-12 graduation_div" style="padding: 0; border: 1px solid #ced4da;text-align: center;">
                                                                <a href="{{url($image)}}">
                                                                    <img src="{{$image}}" width="40%" height="100%" id="old_image_graduation"  alt="No image"  >
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Graduation Image Upload</label>
                                                        <div class="col-md-6 col-sm-6 mb-3">
                                                            <input type="file" class="form-control img_upload_graduation" name="graduation_image" accept=".jpg, .jpeg, .png">
                                                        </div>
                                                    </div>
                                                    <?php 
                                                        if(!empty($employee_documents_edit->emp_post_graduation_img)) {

                                                            $image = postGraduationImagePath.'/'.$employee_documents_edit->emp_post_graduation_img;
                                                        }else{
                                                            $image = DefaultImgPath;
                                                        }
                                                    ?>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Post Graduation Image Preview</label>
                                                        <div class="col-md-6 col-sm-6 mb-50">
                                                            <div class="col-sm-12 post_graduation_div" style="padding: 0; border: 1px solid #ced4da;text-align: center;">
                                                                <a href="{{url($image)}}">
                                                                    <img src="{{$image}}" width="40%" height="100%" id="old_image_post_graduation"  alt="No image">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Post Graduation Image Upload (Optional)</label>
                                                        <div class="col-md-6 col-sm-6 mb-3">
                                                            <input type="file" class="form-control img_upload_post_graduation" name="post_graduation_image" accept=".jpg, .jpeg, .png">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Other Documents Images Preview</label>
                                                        <div class="col-md-6 col-sm-6 mb-50 ">
                                                            <div class="col-sm-12 col-md-12 other_documents_img " style="padding: 0; border: 1px solid #ced4da">
                                                                <?php if(!empty($employee_documents_edit->emp_other)){

                                                                    $emp_other = explode(",",$employee_documents_edit->emp_other);

                                                                    foreach ($emp_other as $key => $value) {
                                                                ?>
                                                                    <a href="{{otherDocumentsImagePath.'/'.$value}}">
                                                                        <img src="{{otherDocumentsImagePath.'/'.$value}}" width="40%" height="100%">
                                                                    </a>

                                                                <?php } }else{ ?>

                                                                    <a href="{{url($image)}}">
                                                                        <img style="display: block !important; margin:0 auto !important;" src="{{$image}}" width="40%" height="100%" id="id_proof_other_documents_img"  alt="No image"  >
                                                                    </a>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Other Documents Images Upload (Optional)</label>
                                                        <div class="col-md-6 col-sm-6 mb-3">
                                                            <input type="file" class="form-control img_upload_other_documents_img" name="other_documents[]" multiple accept=".jpg, .jpeg, .png" />
                                                        </div>
                                                    </div>
                                                    <div class="ln_solid"></div>
                                                    <div class="item form-group">
                                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                                            <button style="float:right" type="submit" class="btn btn-success">Next</button>
                                                            <a href="{{url('employee-personal-form'.'/'.$user_id.'/'.$security_code.'/step-2')}}"><button class="btn btn-primary" type="button" type="">Previous</button></a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- End SmartWizard Content -->
                                    </div>
                                    <fieldset>
                                        <legend>
                                            Read Instructions
                                        </legend>
                                        <ul style="list-style-type:decimal; font-weight: bold; font-size:15px;">
                                            <li>Passport Size Images White Background and Size In Between 50 to 100KB</li>
                                            <li>Pan Card Image Size Should be 300KB to 500KB Only Single Image</li>
                                            <li>Passport Images Size Should be 300KB to 500KB Multiple Images</li>
                                            <li>Aadhaar Card Images Size Should be 300KB to 500KB Multiple Images</li>
                                            <li>Tenth Qualification Image Size Should be 300KB to 500KB Only Single Image</li>
                                            <li>12th Qualification Image Size Should be 300KB to 500KB Only Single Image</li>
                                            <li>Other Qualification Images Size Should be 300KB to 500KB Multiple Images For Example (Your Graduation DMC Images  Master Graduation DMC Images) It's Optional Not Mandatory</li>
                                            <li>12th Qualification Image Size Should be 300KB to 500KB Only Single Image</li>
                                            <li>Graduation Image Size Should be 300KB to 500KB Only Single Image</li>
                                            <li>Post Graduation Image Size Should be 300KB to 500KB Only Single Image It's Optional Not Mandatory</li>
                                            <li>Other Qualification Images Size Should be 300KB to 500KB Multiple Images For Example (Your Training Certificates) It's Optional Not Mandatory</li>
                                        </ul>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /page content -->
                <!-- footer content -->
                <footer style="margin-left: 0px;">
                    <div class="pull-right">
                        Copyright © <?php echo date('Y'); ?>. All rights reserved by WeExpan Business Consulting. Design and Development by <a href="javascript:;">Seema Kashyap & Ravjot Singh</a>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>
        
        <!-- Bootstrap -->
        <script src="{{ asset('public/backEnd/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
        <!-- FastClick -->
        <script src="{{ asset('public/backEnd/fastclick/lib/fastclick.js')}}"></script>
        <!-- NProgress -->
        <script src="{{ asset('public/backEnd/nprogress/nprogress.js')}}"></script>
        <!-- Chart.js -->
        <script src="{{ asset('public/backEnd/Chart.js/dist/Chart.min.js')}}"></script>
        <!-- gauge.js -->
        <script src="{{ asset('public/backEnd/gauge.js/dist/gauge.min.js')}}"></script>
        <!-- bootstrap-progressbar -->
        <script src="{{ asset('public/backEnd/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
        <!-- iCheck -->
        <script src="{{ asset('public/backEnd/iCheck/icheck.min.js')}}"></script>
        <!-- Skycons -->
        <script src="{{ asset('public/backEnd/skycons/skycons.js')}}"></script>
        <!-- Flot -->
        <script src="{{ asset('public/backEnd/Flot/jquery.flot.js')}}"></script>
        <script src="{{ asset('public/backEnd/Flot/jquery.flot.pie.js')}}"></script>
        <script src="{{ asset('public/backEnd/Flot/jquery.flot.time.js')}}"></script>
        <script src="{{ asset('public/backEnd/Flot/jquery.flot.stack.js')}}"></script>
        <script src="{{ asset('public/backEnd/Flot/jquery.flot.resize.js')}}"></script>
        <!-- Flot plugins -->
        <script src="{{ asset('public/backEnd/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
        <script src="{{ asset('public/backEnd/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
        <script src="{{ asset('public/backEnd/flot.curvedlines/curvedLines.js')}}"></script>
        <!-- DateJS -->
        <script src="{{ asset('public/backEnd/DateJS/build/date.js')}}"></script>
        <!-- JQVMap -->
        <script src="{{ asset('public/backEnd/jqvmap/dist/jquery.vmap.js')}}"></script>
        <script src="{{ asset('public/backEnd/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
        <script src="{{ asset('public/backEnd/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="{{ asset('public/backEnd/moment/min/moment.min.js')}}"></script>
        <script src="{{ asset('public/backEnd/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

        <!-- bootstrap-datetimepicker -->    
        <script src="{{ asset('public/backEnd/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
        <!-- Datatables -->
        <script src="{{ asset('public/backEnd/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('public/backEnd/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{ asset('public/backEnd/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{ asset('public/backEnd/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
        <script src="{{ asset('public/backEnd/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
        <script src="{{ asset('public/backEnd/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{ asset('public/backEnd/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{ asset('public/backEnd/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
        <script src="{{ asset('public/backEnd/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
        <script src="{{ asset('public/backEnd/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{ asset('public/backEnd/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
        <script src="{{ asset('public/backEnd/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
        <script src="{{ asset('public/backEnd/jszip/dist/jszip.min.js')}}"></script>
        <script src="{{ asset('public/backEnd/pdfmake/build/pdfmake.min.js')}}"></script>
        <script src="{{ asset('public/backEnd/pdfmake/build/vfs_fonts.js')}}"></script>
        <!-- Custom Theme Scripts -->
        <script src="{{ asset('public/backEnd/build/js/custom.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('public/backEnd/toastr.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('public/backEnd/jquery.validate.min.js')}}"></script>
        <!-- Sweet Alert -->
        <script type="text/javascript" src="{{ asset('public/backEnd/sweetalert2.all.min.js')}}"></script>
        <!-- Light Gallery -->
        <script type="text/javascript" src="{{ asset('public/backEnd/lightgallery-all.min.js')}}"></script>

        <!-- MouseWheel -->
        <script type="text/javascript" src="{{ asset('public/backEnd/jquery.mousewheel.min.js')}}"></script>
        <!-- <script src="{{ asset('public/backEnd/jQuery-Smart-Wizard/js/jquery.smartWizard.js')}}"></script> -->
    </body>
<!-- Employee Passport Size Images -->
<script type="text/javascript">
    $(document).ready(function(){
        var _URL = window.URL || window.webkitURL;
        $('.img_upload_passport_images').change(function(){

            var img_name = $(this).val();

            if(img_name != '' && img_name != null)
            {   
                for(var i = 0; i < this.files.length; i++) {
                    var file = this.files[i];

                    var img = new Image();

                    var file_size = file.size/1024;

                    if((file.type == 'image/jpeg' || file.type == 'image/jpg' || file.type == 'image/png') && (file_size > "50" && file_size < "100"))
                    {

                        $(".passport_size_images").empty();
                        var reader = new FileReader();
                        reader.onload = function(e)
                        {

                            $(".passport_size_images").append('<img src='+e.target.result+'  style="width:40%; height:100%;">')
                        }
                        reader.readAsDataURL(file);
                    
                    }else{
                        
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Please select an image of .jpeg, .jpg .png file format and size of image in between 50KB to 100KB.'
                        }).then(function() {
                            $(".passport_size_images").html('<img style="display: block !important; margin:0 auto; !important" src="{{DefaultImgPath}}" width="40%" height="100%" id="old_images_passport"  alt="No image">');
                        });

                        $(this).val('');
                    }
                    img.src = _URL.createObjectURL(file);
                } 
            }else{
                $(this).val('');
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select an image of .jpeg, .jpg .png file format.'
                })
            }
        });
    });
</script>
<!-- Employee Pan Card Image -->
<script type="text/javascript">
    $(document).ready(function(){
        function readURL(input)
        {
            if(input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function(e)
                {
                    $('#old_image_pan_card').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('.img_upload_pan_card').change(function(){

            var img_name = $(this).val();
            var file = this.files[0];

            if(img_name != '' && img_name != null)
            {
                var img_arr = img_name.split('.');

                var ext = img_arr.pop();
                ext = ext.toLowerCase();

                var file_size = file.size/1024;

                if((ext == 'jpeg' || ext == 'jpg' || ext == 'png') && (file_size > "299" && file_size < "501"))
                {
                    value = readURL(this);
                }else{

                    $('#old_image_pan_card').attr('src',"{{DefaultImgPath}}");

                    $(this).val('');

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please select an image of .jpeg, .jpg .png file format and size of image in between 300KB to 500KB.'
                    })
                }
            }else{
                $(this).val('');
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select an image of .jpeg, .jpg .png file format.'
                })
            }
        });
    });
</script>
<!-- Employee Passport Images -->
<script type="text/javascript">
    $(document).ready(function(){
        var _URL = window.URL || window.webkitURL;
        $('.passport_images_file_upload').change(function(){

            var img_name = $(this).val();

            if(img_name != '' && img_name != null)
            {   
                var count = 1;
                for(var i = 0; i < this.files.length; i++) {
                    var file = this.files[i];

                    var img = new Image();

                    var file_size = file.size/1024;

                    if((file.type == 'image/jpeg' || file.type == 'image/jpg' || file.type == 'image/png') && (file_size > "299" && file_size < "501"))
                    {

                        $(".id_proof_passport_images").empty();
                        
                        var reader = new FileReader();
                        reader.onload = function(e)
                        {

                            $(".id_proof_passport_images").append('<img src='+e.target.result+'  style="width:40%; height:100%;">')
                        }
                        reader.readAsDataURL(file);
                            
                        
                        count++;
                    }else{

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Please select an image of .jpeg, .jpg .png file format and size of image in between 300KB to 500KB.'
                        }).then(function() {
                            $(".id_proof_passport_images").html('<img style="display: block !important; margin:0 auto; !important" src="{{DefaultImgPath}}" width="40%" height="100%" id="id_proof_old_passport_images"  alt="No image">');
                            
                        });
                        $(this).val('');
                    }
                    img.src = _URL.createObjectURL(file);
                } 
            }else{
                $(this).val('');
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select an image of .jpeg, .jpg .png file format.'
                })
            }
        });
    });
</script>
<!-- Aadhaar Card Images -->
<script type="text/javascript">
    $(document).ready(function(){
        var _URL = window.URL || window.webkitURL;
        $('.aadhaar_card_images_file_upload').change(function(){

            var img_name = $(this).val();

            if(img_name != '' && img_name != null)
            {   
                
                for(var i = 0; i < this.files.length; i++) {
                    var file = this.files[i];

                    var img = new Image();

                    var file_size = file.size/1024;

                    if((file.type == 'image/jpeg' || file.type == 'image/jpg' || file.type == 'image/png') && (file_size > "299" && file_size < "501"))
                    {

                        $(".id_proof_aadhaar_card_images").empty();

                        var reader = new FileReader();
                        reader.onload = function(e)
                        {

                            $(".id_proof_aadhaar_card_images").append('<img src='+e.target.result+'  style="width:40%; height:100%;">')
                        }
                        reader.readAsDataURL(file);

                        
                    }else{

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Please select an image of .jpeg, .jpg .png file format and size of image in between 300KB to 500KB.'
                        }).then(function() {
                            $(".id_proof_aadhaar_card_images").html('<img style="display: block !important; margin:0 auto; !important" src="{{DefaultImgPath}}" width="40%" height="100%" id="id_proof_old_aadhaar_card_images"  alt="No image">');
                            
                        });
                        $(this).val('');

                    }
                    img.src = _URL.createObjectURL(file);
                } 
            }else{
                $(this).val('');
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select an image of .jpeg, .jpg .png file format.'
                })
            }
        });
    });
</script>
<!-- Employee Tenth Qualification Image -->
<script type="text/javascript">
    $(document).ready(function(){
        function readURL(input)
        {
            if(input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function(e)
                {
                    $('#old_image_tenth').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('.img_upload_tenth').change(function(){

            var img_name = $(this).val();

            if(img_name != '' && img_name != null)
            {

                var file = this.files[0];
                var file_size = file.size/1024;

                if((file.type == 'image/jpeg' || file.type == 'image/jpg' || file.type == 'image/png') && (file_size > "299" && file_size < "501"))
                {
                    value = readURL(this);
                }else{

                    $('#old_image_tenth').attr('src',"{{DefaultImgPath}}");

                    $(this).val('');

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please select an image of .jpeg, .jpg .png file format and size of image in between 300KB to 500KB.'
                    })
                }
            }else{
                $(this).val('');
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select an image of .jpeg, .jpg .png file format.'
                })
            }
        });
    });
</script>
<!-- Employee Twelve Qualification Image -->
<script type="text/javascript">
    $(document).ready(function(){
        function readURL(input)
        {
            if(input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function(e)
                {
                    $('#old_image_twelve').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('.img_upload_twelve').change(function(){

            var img_name = $(this).val();

            if(img_name != '' && img_name != null)
            {
                var file = this.files[0];
                var file_size = file.size/1024;

                if((file.type == 'image/jpeg' || file.type == 'image/jpg' || file.type == 'image/png') && (file_size > "299" && file_size < "501"))
                {
                    value = readURL(this);
                }else{

                    $('#old_image_twelve').attr('src',"{{DefaultImgPath}}");

                    $(this).val('');

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please select an image of .jpeg, .jpg .png file format and size of image in between 300KB to 500KB.'
                    })
                }
            }else{
                $(this).val('');
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select an image of .jpeg, .jpg .png file format.'
                })
            }
        });
    });
</script>
<!-- Employee Other Qualification Images -->
<script type="text/javascript">
    $(document).ready(function(){
        var _URL = window.URL || window.webkitURL;
        $('.img_upload_other_qualification_img').change(function(){

            var img_name = $(this).val();

            if(img_name != '' && img_name != null)
            {   
                for(var i = 0; i < this.files.length; i++) {
                    var file = this.files[i];

                    var img = new Image();

                    var file_size = file.size/1024;

                    if((file.type == 'image/jpeg' || file.type == 'image/jpg' || file.type == 'image/png') && (file_size > "299" && file_size < "501"))
                    {

                        $(".other_qualification_img").empty();
                        var reader = new FileReader();
                        reader.onload = function(e)
                        {

                            $(".other_qualification_img").append('<img src='+e.target.result+' style="width:40%; height:100%;">')
                        }
                        reader.readAsDataURL(file);

                    }else{

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Please select an image of .jpeg, .jpg .png file format and size of image in between 300KB to 500KB.'

                        }).then(function() {
                            $(".other_qualification_img").html('<img style="display: block !important; margin:0 auto; !important" src="{{DefaultImgPath}}" width="40%" height="100%" id="other_qualification_img"  alt="No image">');
                            
                        });

                        $(this).val('');
                    }
                    img.src = _URL.createObjectURL(file);
                } 
            }else{
                $(this).val('');
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select an image of .jpeg, .jpg .png file format.'
                })
            }
        });
    });
</script>
<!-- Employee Graduation Image -->
<script type="text/javascript">
    $(document).ready(function(){
        function readURL(input)
        {
            if(input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function(e)
                {
                    $('#old_image_graduation').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('.img_upload_graduation').change(function(){

            var img_name = $(this).val();

            if(img_name != '' && img_name != null)
            {
                var file = this.files[0];
                var file_size = file.size/1024;

                if((file.type == 'image/jpeg' || file.type == 'image/jpg' || file.type == 'image/png') && (file_size > "299" && file_size < "501"))
                {
                    value = readURL(this);
                }else{

                    $('#old_image_graduation').attr('src',"{{DefaultImgPath}}");
                    $(this).val('');

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please select an image of .jpeg, .jpg .png file format and size of image in between 300KB to 500KB.'
                    })
                }
            }else{
                $(this).val('');
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select an image of .jpeg, .jpg .png file format.'
                })
            }
        });
    });
</script>
<!-- Employee Post Graduation Image -->
<script type="text/javascript">
    $(document).ready(function(){
        function readURL(input)
        {
            if(input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function(e)
                {
                    $('#old_image_post_graduation').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('.img_upload_post_graduation').change(function(){

            var img_name = $(this).val();

            if(img_name != '' && img_name != null)
            {
                var file = this.files[0];
                var file_size = file.size/1024;

                if((file.type == 'image/jpeg' || file.type == 'image/jpg' || file.type == 'image/png') && (file_size > "299" && file_size < "501"))
                {
                    value = readURL(this);
                }else{
                    
                    $('#old_image_post_graduation').attr('src',"{{DefaultImgPath}}");
                    $(this).val('');

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please select an image of .jpeg, .jpg .png file format and size of image in between 300KB to 500KB.'
                    })
                }
            }else{
                $(this).val('');
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select an image of .jpeg, .jpg .png file format.'
                })
            }
        });
    });
</script>
<!-- Employee Other Documents Images -->
<script type="text/javascript">
    $(document).ready(function(){
        var _URL = window.URL || window.webkitURL;
        $('.img_upload_other_documents_img').change(function(){

            var img_name = $(this).val();

            if(img_name != '' && img_name != null)
            {   
                for(var i = 0; i < this.files.length; i++) {
                    var file = this.files[i];

                    var img = new Image();

                    var file_size = file.size/1024;

                    if((file.type == 'image/jpeg' || file.type == 'image/jpg' || file.type == 'image/png') && (file_size > "299" && file_size < "501"))
                    {

                        $(".other_documents_img").empty();
                        
                        var reader = new FileReader();
                        reader.onload = function(e)
                        {

                            $(".other_documents_img").append('<img src='+e.target.result+' style="width:40%; height:100%;">')
                        }
                        reader.readAsDataURL(file);
                            
                    }else{

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Please select an image of .jpeg, .jpg .png file format and size of image in between 300KB to 500KB.'

                        }).then(function() {

                            $(".other_documents_img").html('<img style="display: block !important; margin:0 auto; !important" src="{{DefaultImgPath}}" width="40%" height="100%" id="id_proof_other_documents_img"  alt="No image">');
                            
                        });
                        
                        $(this).val('');

                    }
                    img.src = _URL.createObjectURL(file);
                } 
            }else{
                $(this).val('');
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select an image of .jpeg, .jpg .png file format.'
                })
            }
        });
    });
</script>
@if(!isset($employee_documents_edit))
    <script type="text/javascript">
        $(function(){
            $(".employee_form_step_3").validate({
                rules: {

                    "passport_size_images[]": {
                        required:true
                    },

                    pan_card_image: {
                        required:true,
                    },
                    "aadhaar_card_images[]": {
                        required:true
                    },
                    tenth_image: {
                        required:true,
                    },
                    twelve_image: {
                        required:true,
                    },
                    graduation_image: {
                        required:true,
                    },
                },

                messages: {

                    "passport_size_images[]": {
                        required: "Please Select Four Passport Images To Upload",
                    },
                    pan_card_image: {

                        required: "Please Select Pan Card Image To Upload",
                    },
                    "aadhaar_card_images[]": {
                        required: "Please Select Aadhaar Card Images To Upload",
                    },
                    tenth_image: {

                        required: "Please Select 10th Qualification Image To Upload",
                    },
                    twelve_image: {

                        required: "Please Select 12th Qualification Image To Upload",
                    },
                    graduation_image: {

                        required: "Please Select Graduation Image To Upload",
                    },

                },
                submitHandler: function(form) {
                
                form.submit();
                }
            });
        })
    </script>
@endif
<script type="text/javascript">
    $(function(){

        $('.passport_size_images').lightGallery();

        $('.pan_card_div').lightGallery();

        $('.id_proof_passport_images').lightGallery();

        $('.id_proof_aadhaar_card_images').lightGallery();

        $('.tenth_div').lightGallery();

        $('.twelve_div').lightGallery();

        $('.other_qualification_img').lightGallery();

        $('.graduation_div').lightGallery();

        $('.post_graduation_div').lightGallery();

        $('.other_documents_img').lightGallery();
    })
</script>
@include('backEnd.common.notification')
</html>

