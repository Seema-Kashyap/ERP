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
        <link href="{{ asset('public/backEnd/jquery-ui.css')}}" rel="stylesheet">
    </head>
    <body class="nav-md">
        <div class="loader_fixed" style="display: none;">
            <div class="loader"></div>
        </div>
        <div class="container body">
            <div class="main_container">
                @include('backEnd.common.sidebar')
                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                        <nav class="nav navbar-nav">
                            <ul class=" navbar-right">
                                <li class="nav-item dropdown open" style="padding-left: 15px;">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <?php 
                                        $user_details  = App\User::where('id', Auth::user()->id)->first();
                                        if(!empty($user_details->image)) {

                                            $image = profileImageImagePath.'/'.$user_details->image;
                                        }else{
                                            $image = DefaultImgPath;
                                        }
                                    ?>    
                                    <img src="{{$image}}" alt=""><?php echo  ucfirst(Auth::user()->first_name).' '.ucfirst(Auth::user()->last_name) ?>
                                    </a>
                                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item <?php if(!empty($page)){ if($page == "my_profile"){ echo "active"; }} ?>"  href="{{url('admin/my-profile')}}"> My Profile</a>
                                        <a class="dropdown-item <?php if(!empty($page)){ if($page == "change_password"){ echo "active"; }} ?>"  href="{{url('admin/change-password')}}">
                                            <!-- <span class="badge bg-red pull-right">50%</span>
                                            <span>Settings</span> -->
                                            Change Password
                                        </a>
                                        <a class="dropdown-item <?php if(!empty($page)){ if($page == "employee_details"){ echo "active"; }} ?>"  href="{{url('admin/employee-details')}}">Your Employee Details</a>
                                        <a class="dropdown-item"  href="javascript:;">Help</a>
                                        <a class="dropdown-item"  href="{{url('admin/logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </div>
                                </li>
                                <li role="presentation" class="nav-item dropdown open">
                                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">6</span>
                                    </a>
                                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                                        <li class="nav-item">
                                            <a class="dropdown-item">
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                            <span>
                                            <span>WeExpan</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                            Film festivals used to be do-or-die moments for movie makers. They were where...
                                            </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="dropdown-item">
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                            <span>
                                            <span>WeExpan</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                            Film festivals used to be do-or-die moments for movie makers. They were where...
                                            </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="dropdown-item">
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                            <span>
                                            <span>WeExpan</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                            Film festivals used to be do-or-die moments for movie makers. They were where...
                                            </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="dropdown-item">
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                            <span>
                                            <span>WeExpan</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                            Film festivals used to be do-or-die moments for movie makers. They were where...
                                            </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <div class="text-center">
                                                <a class="dropdown-item">
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /top navigation -->
                <!-- page content -->
                <!-- jQuery -->
                <script src="{{ asset('public/backEnd/jquery/dist/jquery.min.js')}}"></script>

                <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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


                @yield('content')
                <!-- /page content -->
                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                       Copyright © <?php echo date('Y'); ?>. All rights reserved by WeExpan Business Consulting. Design and Development by <a href="javascript:;">Seema Kashyap & Ravjot Singh</a>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>
        @include('backEnd.common.notification')
    </body>
</html>