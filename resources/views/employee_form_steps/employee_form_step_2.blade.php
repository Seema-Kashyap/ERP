

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
                                        <h2>Employee Form Step 2</h2>
                                        <!-- Tabs -->
                                        <div style="border-top: 1px solid #e5e5e5;" id="wizard_verticle" class="form_wizard wizard_verticle">
                                            <ul class="list-unstyled wizard_steps col-md-3">
                                                <li style="margin-top: 60px;">
                                                    <a class="done" href="#step-1" isdone="1" rel="1">
                                                    <span class="step_no">1</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="selected" href="#step-2" isdone="1" rel="2">
                                                    <span class="step_no">2</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="disabled" href="#step-3" isdone="0" rel="3">
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
                                                <form method="post" action=""  data-parsley-validate class="employee_form_step_2">
                                                    <span style="margin: 10px auto;" class="section">Your Personal Details Step 2</span>
                                                    @csrf
                                                    <div class="item form-group employee_code_main_div">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="emp_ctc_appointment">Your CTC Appointment <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 employee_code_div ">
                                                            <input  type="text" class="form-control"  name="emp_ctc_appointment" value="{{isset($employee_personal_details_edit->emp_ctc_appointment) ? $employee_personal_details_edit->emp_ctc_appointment : '' }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Your Father Name</label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input type="text" class="form-control " name="emp_father_name" value="{{isset($employee_personal_details_edit->emp_father_name) ? $employee_personal_details_edit->emp_father_name : '' }}" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Your Father Date of Birth</label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input type="text" class="form-control emp_father_dob" name="emp_father_dob" value="{{isset($employee_personal_details_edit->emp_father_dob) ? $employee_personal_details_edit->emp_father_dob : '' }}" placeholder="YYYY-MM-DD">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Your Mother Name</label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input type="text" class="form-control " name="emp_mother_name" value="{{isset($employee_personal_details_edit->emp_mother_name) ? $employee_personal_details_edit->emp_mother_name : '' }}" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Your Mother Date of Birth</label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input type="text" class="form-control emp_mother_dob" name="emp_mother_dob" value="{{isset($employee_personal_details_edit->emp_mother_dob) ? $employee_personal_details_edit->emp_mother_dob : '' }}" placeholder="YYYY-MM-DD">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Are You Married ?</label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                            <select class="form-control marital_status" name="marital_status">
                                                                <option value="">Select Your Marital Status </option>
                                                                <option <?php if(!empty($employee_personal_details_edit)) { if(!empty($employee_personal_details_edit->emp_spouse_name)){  echo "selected";} } ?> value="Yes">Yes</option>
                                                                <option <?php if(!empty($employee_personal_details_edit)) { if(empty($employee_personal_details_edit->emp_spouse_name)){  echo "selected";} } ?> value="No">No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row emp_spouse_name" style="display: none;">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Your Spouse Name</label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input type="text" class="form-control emp_spouse_name_input " name="emp_spouse_name" value="{{isset($employee_personal_details_edit->emp_spouse_name) ? $employee_personal_details_edit->emp_spouse_name : '' }}" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row emp_spouse_dob" style="display: none;">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Your Spouse Date of Birth</label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input type="text" class="form-control emp_spouse_dob" name="emp_spouse_dob" value="{{isset($employee_personal_details_edit->emp_spouse_dob) ? $employee_personal_details_edit->emp_spouse_dob : '' }}" placeholder="YYYY-MM-DD">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row children_status" style="display: none;">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Do You Have Children ?</label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                            <select class="form-control children_status_check " name="children_status">
                                                                <option value="">Select Your Status</option>
                                                                <option <?php if(!empty($employee_personal_details_edit)){ if(!empty($employee_personal_details_edit->emp_child_name)){ echo "selected";} } ?> value="Yes">Yes</option>
                                                                <option <?php if(!empty($employee_personal_details_edit)){ if(empty($employee_personal_details_edit->emp_child_name)){ echo "selected";} } ?> value="No">No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                        
                                                        <?php if(!empty($employee_personal_details_edit->emp_child_name)){

                                                            $children_names = explode(',', $employee_personal_details_edit->emp_child_name);
                                                            $i = 1;
                                                            foreach ($children_names as $key => $value) {
                                                        ?>
                                                            <div class="form-group row emp_child_name appended_children_name" >
                                                                <label class="col-form-label col-md-3 col-sm-3 label-align">Your Child Name {{$i}}</label>
                                                                <div class="col-md-6 col-sm-6">
                                                                    <input type="text" class="form-control emp_child_name_input  " name="emp_child_name[<?php echo $key; ?>]" value="{{$value}}">
                                                                </div>
                                                                <?php if($key == 0){ ?>

                                                                    <div class="col-md-3 col-sm-3" >
                                                                        <button  type="button" class="btn btn-primary append_children_name" ><span style="font-weight: 900">&#43;</span></button>
                                                                    </div>

                                                                <?php }else{ ?>

                                                                    <div class="col-md-3 col-sm-3" >
                                                                        <button  type="button" class="btn btn-primary delete_children_name" ><span style="font-weight: 900">&#8722;</span></button>
                                                                    </div>
                                                               <?php  } ?>
                                                            </div>
                                                    <?php $i++; $key++; } }else{ ?>

                                                        <div class="form-group row emp_child_name" style="display: none;" >
                                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Your Child Name 1</label>
                                                            <div class="col-md-6 col-sm-6">
                                                                <input type="text" class="form-control" name="emp_child_name[0]" value="{{isset($employee_personal_details_edit->emp_child_name) ? $employee_personal_details_edit->emp_child_name : '' }}" placeholder="">
                                                            </div>
                                                            <div class="col-md-3 col-sm-3" >
                                                                <button  type="button" class="btn btn-primary append_children_name" ><span style="font-weight: 900">&#43;</span></button>
                                                            </div>

                                                        </div>
                                                    <?php } ?>
                                                    
                                                    <div class="append_children_name_div"></div>
                                                    
                                                    <?php if(!empty($employee_personal_details_edit->emp_child_dob)){

                                                        $children_dob = explode(',', $employee_personal_details_edit->emp_child_dob);
                                                        $i = 1;
                                                        foreach ($children_dob as $key => $value) {
                                                    ?>
                                                        <div class="form-group row emp_child_dob appended_children_dob" >
                                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Your Child Date Of Birth {{$i}}</label>
                                                            <div class="col-md-6 col-sm-6">
                                                                <input type="text" class="form-control emp_child_dob_date_picker<?php echo $key ?> emp_child_dob_input" name="emp_child_dob[<?php echo $key; ?>]" value="" placeholder="YYYY-MM-DD">
                                                            </div>
                                                            <script type="text/javascript">
                                                                $(function(){
                                                                    $('.emp_child_dob_date_picker<?php echo $key ?>').datetimepicker({
                                                                        format: 'YYYY-MM-DD',
                                                                    });
                                                                    $(".emp_child_dob_date_picker<?php echo $key ?>").val("{{$value}}");
                                                                })
                                                            </script>
                                                            <?php if($key == 0){ ?>

                                                                <div class="col-md-3 col-sm-3" >
                                                                    <button  type="button" class="btn btn-primary append_children_dob" ><span style="font-weight: 900">&#43;</span></button>
                                                                </div>

                                                            <?php }else{ ?>

                                                                <div class="col-md-3 col-sm-3" >
                                                                    <button  type="button" class="btn btn-primary delete_children_dob" ><span style="font-weight: 900">&#8722;</span></button>
                                                                </div>
                                                           <?php  } ?>
                                                        </div>       
                                                    <?php $i++; $key++; } }else{ ?>

                                                        <div class="form-group row emp_child_dob" style="display: none;" >
                                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Your Child Date Of Birth 1</label>
                                                            <div class="col-md-6 col-sm-6">
                                                                <input type="text" class="form-control emp_child_dob_date_picker " name="emp_child_dob[0]" value="{{isset($employee_personal_details_edit->emp_child_dob) ? $employee_personal_details_edit->emp_child_dob : '' }}" placeholder="YYYY-MM-DD">
                                                            </div>
                                                            <div class="col-md-3 col-sm-3" >
                                                                <button  type="button" class="btn btn-primary append_children_dob" ><span style="font-weight: 900">&#43;</span></button>
                                                            </div>
                                                        </div>

                                                    <?php } ?>
                                                    <div class="append_children_dob_div"></div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Your Emergency Contact Person Name</label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input type="text" class="form-control " name="emp_emer_con_person" value="{{isset($employee_personal_details_edit->emp_emer_con_person) ? $employee_personal_details_edit->emp_emer_con_person : '' }}" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Your Emergency Contact Number</label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input type="text" class="form-control " name="emp_emer_con_no" value="{{isset($employee_personal_details_edit->emp_emer_con_no) ? $employee_personal_details_edit->emp_emer_con_no : '' }}" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Your 10th Qualification</label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <textarea class="form-control " name="emp_tenth_qualification" Placeholder="I Have Done  10th class From (College Name) and (Punjab School Education Board)" >{{isset($employee_personal_details_edit->emp_tenth_qualification) ? $employee_personal_details_edit->emp_tenth_qualification : '' }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Your 12th Qualification</label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <textarea type="text" class="form-control " name="emp_twelve_qualification"  placeholder="I Have Done 12th class From (College Name) and (Punjab School Education Board)">{{isset($employee_personal_details_edit->emp_twelve_qualification) ? $employee_personal_details_edit->emp_twelve_qualification : '' }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Your Graduation Qualification</label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <textarea type="text" class="form-control " name="emp_graduation_qualification"  placeholder="I Have Done My (Graduation Name) From (College Name) and (Punjab Technical University)">{{isset($employee_personal_details_edit->emp_graduation_qualification) ? $employee_personal_details_edit->emp_graduation_qualification : '' }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Your Post Graduation Qualification</label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <textarea type="text" class="form-control " name="emp_post_graduation_qualification"  placeholder="I Have Done My (Post Graduation Name) From (College Name) and (Punjab Technical University)">{{isset($employee_personal_details_edit->emp_post_graduation_qualification) ? $employee_personal_details_edit->emp_post_graduation_qualification : '' }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Your Additional Qualification</label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <textarea type="text" class="form-control " name="emp_additional_qualification"  placeholder="PHP Training OR Any Other Trainings OR Diploma">{{isset($employee_personal_details_edit->emp_additional_qualification ) ? $employee_personal_details_edit->emp_additional_qualification  : '' }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Your Pancard No</label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input type="text" class="form-control " name="emp_pancard_no" value="{{isset($employee_personal_details_edit->emp_pancard_no) ? $employee_personal_details_edit->emp_pancard_no : '' }}" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Your Passport No</label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input type="text" class="form-control " name="emp_passport_no" value="{{isset($employee_personal_details_edit->emp_passport_no) ? $employee_personal_details_edit->emp_passport_no : '' }}" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Your Adhaar Card No</label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input type="text" class="form-control " name="emp_adhaar_card_no" value="{{isset($employee_personal_details_edit->emp_adhaar_card_no ) ? $employee_personal_details_edit->emp_adhaar_card_no  : '' }}" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Your Other Information</label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input type="text" class="form-control " name="emp_other_information" value="{{isset($employee_personal_details_edit->emp_other_information ) ? $employee_personal_details_edit->emp_other_information  : '' }}" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="ln_solid"></div>
                                                    <div class="item form-group">
                                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                                            <button style="float:right" type="submit" class="btn btn-success">Next</button>
                                                            <a href="{{url('employee-personal-form'.'/'.$user_id.'/'.$security_code)}}"><button class="btn btn-primary" type="button" type="">Previous</button></a>
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
    $(function(){

        $(".employee_form_step_2").validate({
            rules: {

                emp_ctc_appointment : {
                    required:true,
                },
                emp_father_name: {
                    required:true
                },
                emp_father_dob: {
                    required:true
                },
                emp_mother_name: {
                    required:true,
                },
                emp_mother_dob: {
                    required:true,
                },
                marital_status: {
                    required:true,
                },
                emp_spouse_name: {
                    required:true,
                },
                emp_spouse_dob: {
                    required:true,
                },
                children_status: {
                    required:true,
                },
                "emp_child_name[0]": {
                    required:true,
                },
                "emp_child_dob[0]": {
                    required:true,
                },
                emp_emer_con_person: {
                    required:true,
                },
                emp_emer_con_no: {
                    required:true,
                },
                emp_tenth_qualification: {
                    required:true,
                },
                emp_twelve_qualification: {
                    required:true,
                },
                emp_twelve_qualification: {
                    required:true,
                },
                emp_graduation_qualification: {
                    required:true,
                },
                emp_post_graduation_qualification: {
                    required:true,
                },
                emp_additional_qualification: {
                    required:true,
                },
                emp_pancard_no: {
                    required:true,
                },
                emp_passport_no: {
                    required:true,
                },
                emp_adhaar_card_no: {
                    required:true,
                },
                emp_other_information: {
                    required:true,
                },
                status: {
                    required:true,
                },
            },
            messages: {

                emp_ctc_appointment : {

                    required: "Please Enter Your CTC Appointment",
                },
                emp_father_name: {
                    required: "Please Enter   Your Father Name",
                },
                emp_father_dob: {
                    required: "Please Enter   Your Father Date of Birth",
                },
                emp_mother_name: {
                    required: "Please Enter   Your Mother Name",
                },
                emp_mother_dob: {
                    required: "Please Enter   Your Mother Date of Birth",
                },
                marital_status: {

                    required: "Please Select Your Marital Status",
                },
                emp_spouse_name: {
                    required: "Please Enter   Your Spouse Name",
                },
                emp_spouse_dob: {
                    required: "Please Enter   Your Spouse Date of Birth",
                },
                children_status: {

                    required: "Please Select Your Children Status",
                },
                "emp_child_name[0]": {

                    required: "Please Select Your Child Name 1",
                },
                "emp_child_dob[0]": {

                    required: "Please Select Your Child Date Of Birth 1",
                },
                emp_emer_con_person: {
                    required: "Please Enter   Your Emergency Contact Person Name",
                },
                emp_emer_con_no: {
                    required: "Please Enter   Your Emergency Contact Number",
                },
                emp_tenth_qualification: {
                    required: "Please Enter   Your 10th Qualification",
                },
                emp_twelve_qualification: {
                    required: "Please Enter   Your 12th Qualification",
                },
                emp_graduation_qualification: {
                    required: "Please Enter   Your Graduation Qualification",
                },
                emp_post_graduation_qualification: {
                    required: "Please Enter   Your Post Graduation Qualification",
                },
                emp_additional_qualification: {
                    required: "Please Enter   Your Additional Qualification",
                },
                emp_pancard_no: {
                    required: "Please Enter   Your Pancard No",
                },
                emp_passport_no: {
                    required: "Please Enter   Your Passport No",
                },
                emp_adhaar_card_no: {
                    required: "Please Enter   Your Adhaar Card No",
                },
                emp_other_information: {
                    required: "Please Enter   Your Other Information",
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
<script type="text/javascript">
    $(function(){

        $('.emp_father_dob').datetimepicker({
            format: 'YYYY-MM-DD',
            maxDate: moment(),
        });
        

        $('.emp_mother_dob').datetimepicker({
            format: 'YYYY-MM-DD',
            maxDate: moment()
        });

        $('.emp_spouse_dob').datetimepicker({
            format: 'YYYY-MM-DD',
            maxDate: moment()
        });
        $('.emp_child_dob_date_picker').datetimepicker({
            format: 'YYYY-MM-DD',
            maxDate: moment()
        });
        
    })
</script>
<script type="text/javascript">
    $(function(){

        <?php if(!empty($employee_personal_details_edit)){ ?>

            var emp_father_dob = "{{$employee_personal_details_edit->emp_father_dob}}";

            $(".emp_father_dob").val(emp_father_dob);

        <?php }else{ ?>

            $(".emp_father_dob").val("");

        <?php } ?> 

        <?php if(!empty($employee_personal_details_edit)){ ?>
            var emp_mother_dob = "{{$employee_personal_details_edit->emp_mother_dob}}";

            $(".emp_mother_dob").val(emp_mother_dob);

        <?php }else{ ?>

            $(".emp_mother_dob").val("");
        <?php } ?>  


        <?php if(!empty($employee_personal_details_edit)){ ?>

            var emp_spouse_dob = "{{$employee_personal_details_edit->emp_spouse_dob}}";

            $(".emp_spouse_dob").val(emp_spouse_dob);

        <?php }else{ ?>

            $(".emp_spouse_dob").val("");
        <?php } ?> 


        $(".emp_child_dob_date_picker").val("");

    })
</script>
<script type="text/javascript">
    $(function(){

        var value = $( ".marital_status option:selected" ).val();

        if(value == "Yes"){
            $(".children_status").show();
            $(".emp_spouse_name").show();
            $(".emp_spouse_dob").show();
        }
    })
</script>
<script type="text/javascript">
    $(function(){

        var value = $( ".children_status_check option:selected" ).val();

        if(value == "Yes"){
            $(".emp_child_name").show();
            $(".emp_child_dob").show();
        }
    })
</script>
<script type="text/javascript">
    $(function(){

        $(".marital_status").change(function(){

            var status = $(this).val();

            if(status == 'Yes'){

                $(".children_status").show();
                $(".emp_spouse_name").show();
                $(".emp_spouse_dob").show();

            }else if(status == 'No'){

                $(".children_status").hide();
                $(".emp_spouse_name").hide();
                $(".emp_spouse_dob").hide();
                $(".emp_child_name").hide();
                $(".emp_child_dob").hide();
                $(".append_children_name_div").empty();
                $(".append_children_dob_div").empty();
                $(".children_status_check").val('');
                $(".emp_spouse_name_input").val("");
                $(".emp_spouse_dob").val("");
                $('.emp_child_name_input').each(function () {
                    var value = $(this).removeAttr('value');

                });

                var index = 0;
                $('.emp_child_dob_date_picker'+index).each(function () {
                    var value = $(this).val("");
                    index++;

                });

            }else if(status == ''){

                $(".children_status").hide();
                $(".emp_spouse_name").hide();
                $(".emp_spouse_dob").hide();
                $(".emp_child_name").hide();
                $(".emp_child_dob").hide();
                $(".append_children_name_div").empty();
                $(".append_children_dob_div").empty();
                $(".children_status_check").val('');
            }
        })
    })
</script>
<script type="text/javascript">
    $(function(){

        $(".children_status_check").change(function(){

            var status = $(this).val();

            if(status == 'Yes'){

                $(".emp_child_name").show();
                $(".emp_child_dob").show();

            }else if(status == 'No'){

                $(".emp_child_name").hide();
                $(".emp_child_dob").hide();
                $(".append_children_name_div").empty();
                $(".append_children_dob_div").empty();
                $('.emp_child_name_input').each(function () {
                    var value = $(this).removeAttr('value');

                });

                var index = 0;
                $('.emp_child_dob_date_picker'+index).each(function () {
                    var value = $(this).val("");
                    index++;

                });


            }else if(status == ''){

                $(".emp_child_name").hide();
                $(".emp_child_dob").hide();
                $(".append_children_name_div").empty();
                $(".append_children_dob_div").empty();
            }
        })
    })
</script>
<script type="text/javascript">
    $(function(){
        
        <?php if(!empty($employee_personal_details_edit->emp_child_name)){ ?>

            var index =    $(".appended_children_name").length;
            var i =    $(".appended_children_name").length;
            i = i+1;
        <?php }else{ ?>

            var index = 1;
            var i = 2;
       <?php } ?>
        $(document).on('click','.append_children_name',function(){

            
            $(".append_children_name_div").append('<div class="form-group row appended_children_name" ><label class="col-form-label col-md-3 col-sm-3 label-align">Employee Child Name '+i+'</label><div class="col-md-6 col-sm-6"><input type="text" class="form-control" name="emp_child_name['+index+']" value="{{isset($employee_edit->emp_child_name) ? $employee_edit->emp_child_name : '' }}" placeholder=""></div><div class="col-md-3 col-sm-3" ><button  type="button" class="btn btn-primary delete_children_name" ><span style="font-weight: 900">&#8722;</span></button></div></div>');
            
            $('input[name="emp_child_name['+index+']"]').rules("add", {
                required: true,
                messages: {
                    required: "Please Enter Your Child Name "+i+""
                }
            });
            index++;
            i++;
        })

        $(document).on('click','.delete_children_name',function(){

            $(".appended_children_name").last().remove();
            i--;
            index--;

        })
    })
</script>

<script type="text/javascript">
    $(function(){
        
        <?php if(!empty($employee_personal_details_edit->emp_child_dob)){ ?>

            var index =    $(".appended_children_dob").length;
            var i =    $(".appended_children_dob").length;
            i = i+1;
        <?php }else{ ?>

            var index = 1;
            var i = 2;
       <?php } ?>
        $(document).on('click','.append_children_dob',function(){

            
            $(".append_children_dob_div").append('<div class="form-group row appended_children_dob" ><label class="col-form-label col-md-3 col-sm-3 label-align">Employee Children Date Of Birth '+i+'</label><div class="col-md-6 col-sm-6"><input type="text" class="form-control emp_child_dob_date_picker'+index+' " name="emp_child_dob['+index+']" value="{{isset($employee_edit->emp_child_dob) ? $employee_edit->emp_child_dob : '' }}" placeholder="YYYY-MM-DD"></div><div class="col-md-3 col-sm-3" ><button  type="button" class="btn btn-primary delete_children_dob" ><span style="font-weight: 900">&#8722;</span></button></div></div>');

            $('input[name="emp_child_dob['+index+']"]').rules("add", {
                required: true,
                messages: {
                    required: "Please Enter Your Child Date Of Birth "+i+""
                }
            });
            $('.emp_child_dob_date_picker'+index).datetimepicker({
                format: 'YYYY-MM-DD',
                maxDate: moment()
            });
            $('.emp_child_dob_date_picker'+index).val("");
            index++;
            i++;
        })

        $(document).on('click','.delete_children_dob',function(){

            $(".appended_children_dob").last().remove();
            i--;
            index--;

        })
    })
</script>
<script type="text/javascript">
    $(function(){
        var index = 1;
        var i = 2;
        $('.emp_child_dob_date_picker').each(function () {
            $('input[name="emp_child_dob['+index+']"]').rules("add", {
                required: true,
                messages: {
                    required: "Please Enter Your Child Date Of Birth "+i+""
                }
            });
            i++
            index++;
        });
    })
</script>
<script type="text/javascript">
    $(function(){
        var index = 1;
        var i = 2;
        $('.emp_child_dob_input').each(function () {
            $('input[name="emp_child_dob['+index+']"]').rules("add", {
                required: true,
                messages: {
                    required: "Please Enter Your Child Date Of Birth "+i+""
                }
            });
            i++
            index++;
        });
    })
</script>
<script type="text/javascript">
    $(function(){
        var index = 1;
        var i = 2;
        $('.emp_child_name_input').each(function () {
            $('input[name="emp_child_name['+index+']"]').rules("add", {
                required: true,
                messages: {
                    required: "Please Enter Your Child Name "+i+""
                }
            });
            i++
            index++;
        });
    })
</script>
@include('backEnd.common.notification')
</html>

