@extends('backEnd.layouts.master')

@section('content')
<?php

    $url = url('admin/change-password');
    $title = "Edit";
    $class = "change_password";
 ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Change Password</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Change Password</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form method="post" action="{{$url}}"  data-parsley-validate class="{{$class}}" enctype="multipart/form-data">
                            @csrf
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first_name">Old Password<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="password" class="form-control " name="old_password" value="">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first_name">New Password<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="password" class="form-control " name="new_password" value="" id="new_password">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first_name">New Password<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="password" class="form-control " name="confirm_password" value="" >
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <button class="btn btn-primary" type="reset" >Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $.validator.addMethod("strong_password", function(value) {

            return /^[a-zA-Z0-9!@#$%^&*()_=\[\]{};':"\\|,.<>\/?+-]+$/.test(value)
               && /[a-z]/.test(value) // has a lowercase letter
               && /\d/.test(value)//has a digit
               && /[!@#$%^&*()_=\[\]{};':"\\|,.<>\/?+-]/.test(value)// has a special character
        },"must consist  lowercase letter, number and special characters");
        $(".change_password").validate({
            rules:{
                old_password:{
                    required:true,
                },
                new_password:{
                    required:true,
                    strong_password: true,
                },
                confirm_password:{
                    required:true,
                    equalTo:'#new_password'
                }             
            },
            messages: {
                old_password:{
                   required:"Please Enter Your Old Password",
                },
                new_password:{
                   required:"Please Enter Your New Password",
                   strong_password: "Password Must Consists of Lowercase and Uppercase Charactors and Digits and Special Charactors"
                },  
                confirm_password:{
                    required:"Please Re-Enter Your New Password",
                    equalTo:'Please Re-Enter Same Password',
                },       
            },
            submitHandler: function(form) {
            // do other things for a valid form
            form.submit();
            }
        });
    })

</script>
@endsection