
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>WeExpan</title>
        <!-- Favicon Icon -->
        <link rel="shortcut icon" href="{{asset('public/images/favicon.ico') }}" type="image/x-icon">
        <link rel="icon" href="{{asset('public/images/favicon.ico') }}" type="image/x-icon">
        <!-- Bootstrap -->
        <link href="{{ asset('public/backEnd/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{ asset('public/backEnd/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <!-- NProgress -->
        <link href="{{ asset('public/backEnd/nprogress/nprogress.css')}}" rel="stylesheet">
        <!-- Animate.css -->
        <link href="{{ asset('public/backEnd/animate.css/animate.min.css')}}" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="{{ asset('public/backEnd/build/css/custom.min.css')}}" rel="stylesheet">

        <link href="{{ asset('public/backEnd/toastr.min.css')}}" rel="stylesheet">
    </head>
    <body class="login">
        <div>
            <div class="login_wrapper">
                <div class="animate form login_form">
                    <section class="login_content">
                        <form method="post" action="">
                            @csrf
                            <h1>Login Your Account</h1>
                            <div>
                                <input type="email" class="form-control" placeholder="Email" required="" name="email" />
                            </div>
                            <div>
                                <input type="password" class="form-control" placeholder="Password" name="password" required="" />
                            </div>
                            <div>
                               <button  type="submit" class="login_register btn btn-default submit">Login</button>
                                <a class="reset_pass" href="#">Lost your password?</a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="separator">
                                <p class="change_link">New to site?
                                    <a href="{{url('admin/register')}}" class="to_register"> Create Account </a>
                                </p>
                                <div class="clearfix"></div>
                                <br />
                                <div>
                                    <img style="width:60%" src="{{asset('public/images/logo.png') }}" alt="">
                                    <p> Copyright © <?php echo date('Y'); ?>. All rights reserved by WeExpan Business Consulting. Design and development by <a href="javascript:;">Seema Kashyap & Ravjot Singh</a></p>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </body>
    <!-- Jquery Script Files -->
    <script src="{{ asset('public/backEnd/jquery/dist/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/backEnd/toastr.min.js')}}"></script>
    @include('backEnd.common.notification')
</html>

