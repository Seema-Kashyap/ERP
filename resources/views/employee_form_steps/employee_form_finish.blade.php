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
        <style type="text/css">
            .thankyou_message{
                color: #444444;
                background: #FFFFFF;
                text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;
                color: #444444;
                background: #FFFFFF;
                font-size: 27px;
                font-weight: 900;
                text-align: center; 
                padding-top: 100px; 

            }
        </style>
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
                                        <img src="{{asset('public/images/logo.png')}}" style="display: block;margin: 0 auto; width: 250px;/*! height: 200px; */">
                                        <!-- End SmartWizard Content -->
                                        <h2>Employee Form Finished</h2>
                                        <!-- Tabs -->
                                        <div style="border-top: 1px solid #e5e5e5;" id="wizard_verticle" class="form_wizard wizard_verticle">
                                            <div class="col-md-12" style="height: 500px;">
                                                <h2 class="StepTitle"></h2>
                                                <p class="thankyou_message">Thankyou {{ucfirst($user_details->first_name).' '.ucfirst($user_details->last_name) }} For Fill All The Details. <br><span style="font-size: 40px">We Will Get Back You After 24 Hours</span> </p>
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
</html>

