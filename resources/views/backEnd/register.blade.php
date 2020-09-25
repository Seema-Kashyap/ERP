
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
                <div id="register" >
                    <section class="login_content">
                        <form method="post" action="" class="register_form">
                            @csrf
                            <h1>Create Your Account</h1>
                            <div>
                                <input type="text" class="form-control" placeholder="First Name" name="first_name" />
                            </div>
                            <div>
                                <input type="text" class="form-control" placeholder="Last Name" required="" name="last_name" />
                            </div>
                            <div>
                                <input type="email" class="form-control" placeholder="Email" required="" name="email" />
                            </div>

                            <div>
                                <input type="text" class="form-control" placeholder="Phone Number" name="phone" required="" />
                            </div>
                            <div>
                                <input name="password" type="password" class="form-control" placeholder="Password" required="" />
                            </div>
                            <div>
                                <button  type="submit" class="login_register btn btn-default submit">Register</button>
                            </div>
                            <div class="clearfix"></div>
                            <div class="separator">
                                <p class="change_link">Already a member ?
                                    <a href="{{url('/')}}" class="to_register"> Log in </a>
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
    <script type="text/javascript" src="{{ asset('public/backEnd/jquery.validate.min.js')}}"></script>
    @include('backEnd.common.notification')
    <script type="text/javascript">
        $(function(){
            $.validator.addMethod("strong_password", function(value) {

                return /^[a-zA-Z0-9!@#$%^&*()_=\[\]{};':"\\|,.<>\/?+-]+$/.test(value)
                   && /[a-z]/.test(value) // has a lowercase letter
                   && /\d/.test(value)//has a digit
                   && /[!@#$%^&*()_=\[\]{};':"\\|,.<>\/?+-]/.test(value)// has a special character
            },"must consist  lowercase letter, number and special characters");
            $(".register_form").validate({
                rules: {

                    first_name: {
                        required:true
                    },
                    last_name: {
                        required:true
                    },
                    email: {
                        required:true,
                        email: true,
                        remote: "{{url('admin/email-exists-check')}}",

                    },
                    phone: {

                        required:true,
                        remote: "{{url('admin/phone-exists-check')}}",
                    },
                    password: {

                        required:true,
                        strong_password: true,
                    },
                },

                messages: {

                    first_name: {
                        required: "Please Enter Your First Name",
                    },
                    last_name: {

                        required: "Please Enter Your Last name",
                    },
                    email: {

                        required: "Please Enter Your Email",
                        remote: "Email Already Registered With Us",
                    },
                    phone: {

                        required: "Please Enter Your Phone no",
                        remote: "Phone no Already Registered With Us",
                    },
                    password: {

                        required: "Please Enter Your Password",
                        strong_password: "Password Must Consists of Lowercase and Uppercase Charactors and Digits and Special Charactors"
                    },
                },
                submitHandler: function(form) {
                
                form.submit();
                }
            });
        })

    </script>
</html>

