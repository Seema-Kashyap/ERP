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
                                        <h2>Employee Form Step 4</h2>
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
                                                    <a class="done" href="#step-3" isdone="1" rel="3">
                                                    <span class="step_no">3</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="selected" href="#step-4" isdone="0" rel="4">
                                                    <span class="step_no">4</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div id="step-2" class="col-md-9">
                                                <h2 class="StepTitle"></h2>
                                                <form method="post" class="employee_form_step_4" action="" enctype="multipart/form-data">
                                                    @csrf
                                                    <span style="margin: 10px auto;" class="section">Your Previous Experience Detail Step 4</span>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Name of the Previous Organization<span class="required">*</span></label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                            <input type="text" class="form-control name_prev_organization" name="name_prev_organization" value="{{isset($previous_details_edit->name_prev_organization) ? $previous_details_edit->name_prev_organization : '' }}" placeholder="Previous Organization">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Years Of Experience<span class="required">*</span></label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                            <select class="form-control years_experience" name="years_experience">
                                                                <option value="">Select Years Of Experience</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "0 Year"){ echo "selected";}} ?> value="0 Year">0 Year</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "1 Year"){ echo "selected";}} ?> value="1 Year">1 Year</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "2 Years"){ echo "selected";}} ?> value="2 Years">2 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "3 Years"){ echo "selected";}} ?> value="3 Years">3 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "4 Years"){ echo "selected";}} ?> value="4 Years">4 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "5 Years"){ echo "selected";}} ?> value="5 Years">5 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "6 Years"){ echo "selected";}} ?> value="6 Years">6 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "7 Years"){ echo "selected";}} ?> value="7 Years">7 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "8 Years"){ echo "selected";}} ?> value="8 Years">8 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "9 Years"){ echo "selected";}} ?> value="9 Years">9 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "10 Years"){ echo "selected";}} ?> value="10 Years">10 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "11 Years"){ echo "selected";}} ?> value="11 Years">11 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "12 Years"){ echo "selected";}} ?>  value="12 Years">12 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "13 Years"){ echo "selected";}} ?> value="13 Years">13 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "14 Years"){ echo "selected";}} ?> value="14 Years">14 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "15 Years"){ echo "selected";}} ?> value="15 Years">15 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "16 Years"){ echo "selected";}} ?> value="16 Years">16 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "17 Years"){ echo "selected";}} ?> value="17 Years">17 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "18 Years"){ echo "selected";}} ?> value="18 Years">18 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "19 Years"){ echo "selected";}} ?> value="19 Years">19 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "20 Years"){ echo "selected";}} ?> value="20 Years">20 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "21 Years"){ echo "selected";}} ?> value="21 Years">21 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "22 Years"){ echo "selected";}} ?> value="22 Years">22 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "23 Years"){ echo "selected";}} ?> value="23 Years">23 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "24 Years"){ echo "selected";}} ?> value="24 Years">24 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "25 Years"){ echo "selected";}} ?> value="25 Years">25 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "26 Years"){ echo "selected";}} ?> value="26 Years">26 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "27 Years"){ echo "selected";}} ?> value="27 Years">27 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "28 Years"){ echo "selected";}} ?> value="28 Years">28 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "29 Years"){ echo "selected";}} ?> value="29 Years">29 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "30 Years"){ echo "selected";}} ?> value="30 Years">30 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "31 Years"){ echo "selected";}} ?> value="31 Years">31 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "32 Years"){ echo "selected";}} ?> value="32 Years">32 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "33 Years"){ echo "selected";}} ?> value="33 Years">33 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "34 Years"){ echo "selected";}} ?> value="34 Years">34 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "35 Years"){ echo "selected";}} ?> value="35 Years">35 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "36 Years"){ echo "selected";}} ?> value="36 Years">36 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "37 Years"){ echo "selected";}} ?> value="37 Years">37 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "38 Years"){ echo "selected";}} ?> value="38 Years">38 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "39 Years"){ echo "selected";}} ?> value="39 Years">39 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "40 Years"){ echo "selected";}} ?> value="40 Years">40 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "41 Years"){ echo "selected";}} ?> value="41 Years">41 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "42 Years"){ echo "selected";}} ?> value="42 Years">42 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "43 Years"){ echo "selected";}} ?> value="43 Years">43 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "44 Years"){ echo "selected";}} ?> value="44 Years">44 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "45 Years"){ echo "selected";}} ?> value="45 Years">45 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "46 Years"){ echo "selected";}} ?> value="46 Years">46 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "47 Years"){ echo "selected";}} ?> value="47 Years">47 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "48 Years"){ echo "selected";}} ?> value="48 Years">48 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "49 Years"){ echo "selected";}} ?> value="49 Years">49 Years</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "50 Years"){ echo "selected";}} ?> value="50 Years">50 Years</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                     <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Month Of Experience<span class="required">*</span></label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                            <select class="form-control months_experience" name="months_experience">
                                                                <option value="">Select Months Of Experience</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->months_experience == "0 Month"){ echo "selected";}} ?> value="0 Month">0 Month</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->months_experience == "1 Month"){ echo "selected";}} ?> value="1 Month">1 Month</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->months_experience == "2 Months"){ echo "selected";}} ?> value="2 Months">2 Months</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->months_experience == "3 Months"){ echo "selected";}} ?> value="3 Months">3 Months</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->months_experience == "4 Months"){ echo "selected";}} ?> value="4 Months">4 Months</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->months_experience == "5 Months"){ echo "selected";}} ?> value="5 Months">5 Months</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->months_experience == "6 Months"){ echo "selected";}} ?> value="6 Months">6 Months</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->months_experience == "7 Months"){ echo "selected";}} ?> value="7 Months">7 Months</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->months_experience == "8 Months"){ echo "selected";}} ?> value="8 Months">8 Months</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->months_experience == "9 Months"){ echo "selected";}} ?> value="9 Months">9 Months</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->months_experience == "10 Months"){ echo "selected";}} ?> value="10 Months">10 Months</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->months_experience == "11 Months"){ echo "selected";}} ?> value="11 Months">11 Months</option>
                                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->months_experience == "12 Months"){ echo "selected";}} ?> value="12 Months">12 Months</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Total Experience <span class="required">*</span></label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input type="text" class="form-control total_experience" name="total_experience" value="{{isset($previous_details_edit->total_experience) ? $previous_details_edit->total_experience : '' }}" placeholder="Total Experience">
                                                        </div>
                                                    </div>  
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Annual Salary<span class="required">*</span></label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                            <input type="text" class="form-control annual_salary" name="annual_salary" value="{{isset($previous_details_edit->annual_salary) ? $previous_details_edit->annual_salary : '' }}" placeholder="Annual Salary">
                                                        </div>
                                                    </div> 
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Reason For Resigning<span class="required">*</span></label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                            <textarea  class="form-control  reason_for_resigning" name="reason_for_resigning" placeholder="Reason For Resignation">{{isset($previous_details_edit-> reason_for_resigning ) ? $previous_details_edit-> reason_for_resigning  : '' }}</textarea>
                                                        </div>
                                                    </div>  
                                                    <!-- Copy of Resignation Letter Image Upload Start Here -->
                                                    <?php 
                                                        if(!empty($previous_details_edit->copy_resignation_letter)) {

                                                            $image = copyResignationLetterImagePath.'/'.$previous_details_edit->copy_resignation_letter;
                                                            $path_info  = pathinfo($image);
                                                            if(!empty($path_info['extension'])){
                                                                
                                                                $image_extension =  $path_info['extension']; 

                                                            }else{

                                                                $image_extension = "";
                                                            }

                                                        }else{
                                                            $image_extension = "";
                                                            $image = DefaultImgPath;
                                                        }
                                                    ?>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">PDF/JPG Image Preview</label>
                                                        <div class="col-md-6 col-sm-6 mb-50">
                                                            <div class="col-sm-10 " style="padding: 0">
                                                                <?php if($image_extension == 'pdf'){ ?>

                                                                    <img src="{{url('public/images/pdf_logo.png')}}" width="50%" height="100%" id="copy_resignation_letter"  alt="No image"  >

                                                                <?php }else{ ?>

                                                                    <img src="{{$image}}" width="50%" height="100%" id="copy_resignation_letter"  alt="No image"  >
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Copy of Resignation Letter JPG/PDF Upload</label>
                                                        <div class="col-md-6 col-sm-6 mb-3">
                                                            <input type="file" class="form-control copy_resignation_letter" name="copy_resignation_letter" accept=".jpg, .jpeg, .pdf">
                                                        </div>
                                                    </div> 
                                                    <!-- Copy of Resignation Letter Image Upload End Here -->

                                                     <!-- Copy of Relieving Letter Image Upload Start Here -->
                                                      <?php 
                                                        if(!empty($previous_details_edit->copy_relieving_letter)) {

                                                            $image = previousRelievingLetterImagePath.'/'.$previous_details_edit->copy_relieving_letter;
                                                            $path_info  = pathinfo($image);
                                                            if(!empty($path_info['extension'])){
                                                                
                                                                $image_extension =  $path_info['extension']; 

                                                            }else{

                                                                $image_extension = "";
                                                            }

                                                        }else{
                                                            $image_extension = "";
                                                            $image = DefaultImgPath;
                                                        }
                                                    ?>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">PDF/JPG Image Preview</label>
                                                        <div class="col-md-6 col-sm-6 mb-50">
                                                            <div class="col-sm-10 " style="padding: 0">
                                                                <?php if($image_extension == 'pdf'){ ?>

                                                                    <img src="{{url('public/images/pdf_logo.png')}}" width="50%" height="100%" id="copy_relieving_letter"  alt="No image"  >

                                                                <?php }else{ ?>

                                                                    <img src="{{$image}}" width="50%" height="100%" id="copy_relieving_letter"  alt="No image"  >
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Copy of Relieving Letter JPG/PDF Upload</label>
                                                        <div class="col-md-6 col-sm-6 mb-3">
                                                            <input type="file" class="form-control copy_relieving_letter" name="copy_relieving_letter" accept=".jpg, .jpeg, .pdf">
                                                        </div>
                                                    </div> 
                                                    <!-- Copy of Relieving Letter Image Upload End Here -->
                                                    <div class="ln_solid"></div>
                                                    <div class="item form-group">
                                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                                            <button style="float:right" type="submit" class="btn btn-success">Finish</button>
                                                            <a href="{{url('employee-personal-form'.'/'.$user_id.'/'.$security_code.'/step-3')}}"><button class="btn btn-primary" type="button" type="">Previous</button></a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- End SmartWizard Content -->
                                    </div>
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
<script type="text/javascript">
    $(".years_experience").change(function(){

        var years_experience =  $(this).val()

        $(".months_experience").val('');

        if(years_experience != ''){

            $(".total_experience").val(years_experience);

        }
    })

    $(".months_experience").change(function(){

        var months_experience = $(this).val();

        if(months_experience != ''){

            var years_experience = $(".years_experience option:selected").val();

            $(".total_experience").val(years_experience+' '+months_experience);

        }
    })
</script>
<script type="text/javascript">
    $(function(){

        $(".employee_form_step_4").validate({
            rules: {

               business_unit_id:{
                    required:true,
                },

                user_id: {
                    required:true,
                },
                
                name_prev_organization:{
                    required:true,
                },

                years_experience:{
                    required:true,
                },

                months_experience:{
                    required:true,
                },

                total_experience:{
                    required:true,
                },

                annual_salary:{
                    required:true,
                },

                reason_for_resigning:{
                    required:true,
                },

                status:{
                    required:true,
                },
            },

            messages: {

                business_unit_id:{
                    required: "Please Select Your Business Unit Name",
                },

                user_id: {
                    required: "Please Select Your Employee Name",
                },

                name_prev_organization:{
                    required: "Please Enter Your Employee Previous Name Organization",
                },
                
                work_from:{
                    required:"Please Enter Your Work From",
                },

                work_to:{
                    required: "Please Enter Your Work to",
                },

                years_experience:{
                    required:"Please Enter Your Employee Years Experience",
                },

                months_experience:{
                    required:"Please Enter Your Employee Months Experience",
                },

                total_experience:{
                    required:"Please Enter Your Employee Total Experience",
                },

                annual_salary:{
                    required:"Please Enter Your Employee Annual Salary",
                },

                reason_for_resigning:{
                    required:"Please Enter Your Employee Reason For Resignation",
                },

                status: {

                    required: "Please Select Your Status",
                },
            },
            submitHandler: function(form) {
            
            form.submit();
            }
        });
    })
</script>
<!-- Copy of Resignation Letter Image Upload Here -->
<script type="text/javascript">
    $(document).ready(function(){
        function readURL(input)
        {
            if(input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function(e)
                {
                    if(input.files[0].type == "application/pdf"){

                        $('#copy_resignation_letter').attr('src', "{{url('public/images/pdf_logo.png')}}");

                    }else{

                        $('#copy_resignation_letter').attr('src', e.target.result);
                    }
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('.copy_resignation_letter').change(function(){

            var img_name = $(this).val();

            if(img_name != '' && img_name != null)
            {
                var img_arr = img_name.split('.');

                var ext = img_arr.pop();
                ext = ext.toLowerCase();

                if(ext == 'jpeg' || ext == 'jpg' || ext == 'pdf')
                {
                    input = document.getElementById('copy_resignation_letter');
                    value = readURL(this);
                }else{
                    $(this).val('');

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please select an image of .jpeg, .jpg .pdf file format.'
                    })
                }
            }else{
                $(this).val('');
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select an image of .jpeg, .jpg .pdf file format.'
                })
            }
        });
    });
</script>

<!-- Copy of Relieving Letter Image Upload Here -->
<script type="text/javascript">
    $(document).ready(function(){
        function readURL(input)
        {
            if(input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function(e)
                {
                    if(input.files[0].type == "application/pdf"){

                        $('#copy_relieving_letter').attr('src', "{{url('public/images/pdf_logo.png')}}");

                    }else{

                        $('#copy_relieving_letter').attr('src', e.target.result);
                    }
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('.copy_relieving_letter').change(function(){

            var img_name = $(this).val();

            if(img_name != '' && img_name != null)
            {
                var img_arr = img_name.split('.');

                var ext = img_arr.pop();
                ext = ext.toLowerCase();

                if(ext == 'jpeg' || ext == 'jpg' || ext == 'pdf')
                {
                    input = document.getElementById('copy_relieving_letter');
                    value = readURL(this);
                }else{
                    $(this).val('');

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please select an image of .jpeg, .jpg .pdf file format.'
                    })
                }
            }else{
                $(this).val('');
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select an image of .jpeg, .jpg .pdf file format.'
                })
            }
        });
    });
</script>
@include('backEnd.common.notification')
</html>

