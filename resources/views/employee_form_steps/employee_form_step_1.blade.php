

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
                                        <h2>Employee Form Step 1</h2>
                                        <!-- Tabs -->
                                        <div style="border-top: 1px solid #e5e5e5;" id="wizard_verticle" class="form_wizard wizard_verticle">
                                            <ul class="list-unstyled wizard_steps col-md-3">
                                                <li style="margin-top: 60px;">
                                                    <a class="selected" href="#step-1" isdone="1" rel="1">
                                                    <span class="step_no">1</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="disabled" href="#step-2" isdone="0" rel="2">
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
                                            <div id="step-1" class="col-md-9">
                                                <h2 class="StepTitle"></h2>
                                                <form method="post" action=""  data-parsley-validate class="employee_form_step_1">
                                                    <span style="margin: 10px auto;" class="section">Your Personal Details Step 1</span>
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Your Marital Status</label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                            <select class="form-control" name="emp_marital_status">
                                                                <option value="">Select Your Marital Status</option>
                                                                <option <?php if(!empty($employee_edit->emp_marital_status)){ if($employee_edit->emp_marital_status == 'married'){ echo "selected";} } ?> value="married">Married</option>
                                                                <option <?php if(!empty($employee_edit->emp_marital_status)){ if($employee_edit->emp_marital_status == 'unmarried'){ echo "selected";} } ?> value="unmarried">Unmarried</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Your Date of Joining</label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input type="text" class="form-control date_of_join " name="emp_doj" value="{{isset($employee_edit->emp_doj) ? $employee_edit->emp_doj : '' }}" placeholder="YYYY-MM-DD">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Your Formalities Completed On</label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                             <input type="text" class="form-control emp_formality " name="emp_formality" value="{{isset($employee_edit->emp_formality) ? $employee_edit->emp_formality : '' }}" placeholder="YYYY-MM-DD">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Your Date of Birth</label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                             <input type="text" class="form-control emp_dob" name="emp_dob" value="{{isset($employee_edit->emp_dob) ? $employee_edit->emp_dob : '' }}" placeholder="YYYY-MM-DD">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Your Age</label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                             <input type="text" class="form-control emp_age " name="emp_age" value="{{isset($employee_edit->emp_age) ? $employee_edit->emp_age : '' }}" placeholder="30 Years Old">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Your Blood Group</label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                            <select class="form-control" name="emp_blood_group">
                                                                <option value="">Select Your Blood Group</option>
                                                                <option <?php if(!empty($employee_edit->emp_blood_group)){ if($employee_edit->emp_blood_group == 'A+'){ echo "selected";} } ?> value="A+">A+</option>

                                                                <option <?php if(!empty($employee_edit->emp_blood_group)){ if($employee_edit->emp_blood_group == 'O+'){ echo "selected";} } ?>  value="O+">O+</option>

                                                                <option <?php if(!empty($employee_edit->emp_blood_group)){ if($employee_edit->emp_blood_group == 'B+'){ echo "selected";} } ?>  value="B+">B+</option>

                                                                <option <?php if(!empty($employee_edit->emp_blood_group)){ if($employee_edit->emp_blood_group == 'AB+'){ echo "selected";} } ?>  value="AB+">AB+</option>

                                                                <option <?php if(!empty($employee_edit->emp_blood_group)){ if($employee_edit->emp_blood_group == 'A-'){ echo "selected";} } ?>  value="A-">A-</option>

                                                                <option <?php if(!empty($employee_edit->emp_blood_group)){ if($employee_edit->emp_blood_group == 'O-'){ echo "selected";} } ?>  value="O-">O-</option>

                                                                <option <?php if(!empty($employee_edit->emp_blood_group)){ if($employee_edit->emp_blood_group == 'B-'){ echo "selected";} } ?>  value="B-">B-</option>

                                                                <option <?php if(!empty($employee_edit->emp_blood_group)){ if($employee_edit->emp_blood_group == 'AB-'){ echo "selected";} } ?>  value="AB-">AB-</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Your Address 1</label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                             <textarea class="form-control" name="emp_addr_one">{{isset($employee_edit->emp_addr_one) ? $employee_edit->emp_addr_one : '' }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Your Address 2</label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                            <textarea class="form-control" name="emp_addr_second">{{isset($employee_edit->emp_addr_second) ? $employee_edit->emp_addr_second : '' }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Your State</label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                            <select class="form-control emp_state" name="emp_state">
                                                                <option value="">Select Your State</option>
                                                                @foreach($india_states as $data)
                                                                    <option <?php if(!empty($employee_edit)){ if($data->id == $employee_edit->emp_state){ echo "selected";}} ?> value="{{$data->id}}">{{$data->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="item form-group">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Your City<span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                             
                                                           <select class="form-control emp_city" name="emp_city">
                                                                <option value="">Select Your City</option>
                                                                @if(!empty($cities[0]))
                                                                    @foreach($cities as $data)
                                                                        <option <?php if($data->id == $employee_edit->emp_city){ echo "selected";} ?> value="{{$data->id}}">{{$data->name}}</option>
                                                                    @endforeach
                                                                @elseif(!empty($employee_edit))
                                                                    <option selected="selected" value='No City Found'>No Record Found</option>
                                                                @endif
                                                           </select>
                                                        </div>
                                                    </div>
                                                    <div class="item form-group employee_code_main_div">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="emp_code">Your Pincode <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 employee_code_div ">
                                                             <input data-max="6" type="number" class="form-control" name="emp_pincode" value="{{isset($employee_edit->emp_pincode) ? $employee_edit->emp_pincode : '' }}">
                                                        </div>
                                                    </div>
                                                    <div class="ln_solid"></div>
                                                    <div class="item form-group">
                                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                                            <button style="float: right" type="submit" class="btn btn-success">Next</button>
                                                            <button disabled="" class="btn btn-primary" type="button" type="">Previous</button>
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
        <!-- jQuery -->
        <script src="{{ asset('public/backEnd/jquery/dist/jquery.min.js')}}"></script>
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

            $('.date_of_join').datetimepicker({
                format: 'YYYY-MM-DD',
                maxDate: moment(),
            });
            

            $('.emp_formality').datetimepicker({
                format: 'YYYY-MM-DD',
                maxDate: moment()
            });

            $('.emp_dob').datetimepicker({
                format: 'YYYY-MM-DD',
                maxDate: moment()
            });
            
        })
    </script>
    <script type="text/javascript">
        $(function(){

            <?php if(!empty($employee_edit)){ ?>
                var emp_formality = "{{$employee_edit->emp_formality}}";

                $(".emp_formality").val(emp_formality);

            <?php }else{ ?>

                $(".emp_formality").val("");
            <?php } ?>  

            <?php if(!empty($employee_edit)){ ?>

                var emp_dob = "{{$employee_edit->emp_dob}}";

                $(".emp_dob").val(emp_dob);

            <?php }else{ ?>

                $(".emp_dob").val("");
            <?php } ?> 

            <?php if(!empty($employee_edit)){ ?>

                var date_of_join = "{{$employee_edit->emp_doj}}";

                $(".date_of_join").val(date_of_join);

            <?php }else{ ?>

                $(".date_of_join").val("");

            <?php } ?>  

        })
    </script>
    <script type="text/javascript">
        $(function(){

            $(".emp_dob").on("dp.change", function (e) {
                
                if(e.date != ''){

                    var dob = new Date(e.date);
                    var today = new Date();
                    var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                    $(".emp_age").val(age+' Years Old');
                }
            });
        })
    </script>
    <script type="text/javascript">
        $(function(){

            $(".employee_form_step_1").validate({
                rules: {

                    emp_marital_status: {
                        required:true,
                    },
                    emp_doj: {
                        required:true,
                    },
                    emp_formality: {
                        required:true,
                    },
                    emp_dob: {
                        required:true,
                    },
                    emp_age: {
                        required:true,
                    },
                    emp_blood_group: {
                        required:true,
                    },
                    emp_addr_one: {
                        required:true,
                    },
                    emp_addr_second: {
                        required:true,
                    },
                    emp_state: {
                        required:true,
                    },
                    emp_city: {
                        required:true,
                    },
                    emp_pincode: {
                        required:true,
                        minlength: 6,
                    },
                },

                messages: {

                    emp_marital_status: {

                        required: "Please Select Your Marital Status",
                    },
                    emp_doj: {

                        required: "Please Enter Your Date of Joining",
                    },
                    emp_formality: {

                        required: "Please Enter Date Your Formalities Completed On",
                    },
                    emp_dob: {

                        required: "Please Enter Date Your Date Of Birth",
                    },
                    emp_age: {

                        required: "Please Enter Your Age",
                    },
                    emp_blood_group: {

                        required: "Please Enter Your Blood Group",
                    },
                    emp_addr_one: {

                        required: "Please Enter Your Address 1",
                    },
                    emp_addr_second: {

                        required: "Please Enter Your Address 2",
                    },
                    emp_state: {

                        required: "Please Select Your State",
                    },
                    emp_city: {

                        required: "Please Select Your City",
                    },
                    emp_pincode: {

                        required: "Please Enter Your Area Pincode",
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

            $(".emp_state").change(function(){

                var id =$(this).val();

                if(id != ''){
                    $(".loader_fixed").show();
                    $.ajax({

                        method: "GET",
                        url: "{{url('admin/india-cities')}}"+'/'+id,
                        success: function(resp){

                            if(resp != ''){
                                $(".loader_fixed").hide();
                                $(".emp_city").html(resp);

                            }

                        },
                        error: function(jqXHR, exception){
                                
                            if (jqXHR.status === 0) {

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Not connect.\n Verify Network.'
                                })

                            }else if (jqXHR.status == 404) {

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: '404 Server Error Please Try Again Or Refresh Your Page'
                                })

                            }else if (jqXHR.status == 500) {

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: '500 Server Error Please Try Again Or Refresh Your Page'
                                })

                            }else if (exception === 'parsererror') {

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Parse Error Please Try Again Or Refresh Your Page'
                                })

                            }else if (exception === 'timeout') {

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Time Out Error Please Try Again Or Refresh Your Page'
                                })

                            }else if (exception === 'abort') {

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Abort Error Please Try Again Or Refresh Your Page'
                                })

                            }else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Uncaught Error.\n' + jqXHR.responseText
                                })

                            }
                        }
                    });
                }else if(id == ''){

                    $(".emp_city").html("<option value=''>Select India State</option>");
                }
            })
        })
    </script>
    @include('backEnd.common.notification')
</html>

