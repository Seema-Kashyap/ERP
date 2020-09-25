@extends('backEnd.layouts.master')

@section('content')
<?php

    if(isset($user_edit)){

        $url = url('admin/user-edit/'.$user_edit->id);
        $title = "Edit";
        $class = "edit_user";

    }else{
        $url = url('admin/user-add');
        $title = "Add";
        $class = "create_new_user";
    }
 ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Create New User</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Create New User</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form method="post" action="{{$url}}"  data-parsley-validate class="{{$class}}">
                            @csrf
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first_name">First Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="first_name" value="{{isset($user_edit->first_name) ? $user_edit->first_name : ''}}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last_name">Last Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text"  name="last_name"  class="form-control" value="{{isset($user_edit->last_name) ? $user_edit->last_name : ''}}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Personal Email</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input  class="form-control" type="email" name="personal_email" value="{{isset($user_edit->personal_email) ? $user_edit->personal_email : ''}}" >
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Office Email</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input  class="form-control" type="email" name="email" value="{{isset($user_edit->email) ? $user_edit->email : ''}}" >
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Phone no<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input  class="form-control" type="text" name="phone" value="{{isset($user_edit->phone) ? $user_edit->phone : ''}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="gender">
                                        <option value="">Select Gender</option>
                                        <option <?php if(!empty($user_edit->gender)){ if($user_edit->gender == 'male'){ echo "selected";} } ?> value="Male">Male</option>
                                        <option <?php if(!empty($user_edit->gender)){ if($user_edit->gender == 'female'){ echo "selected";} } ?> value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="status">
                                        <option value="">Select Status</option>
                                        <option <?php if(!empty($user_edit->status)){ if($user_edit->status == 'Active'){ echo "selected";} } ?> value="Active">Active</option>
                                        <option <?php if(!empty($user_edit->status)){ if($user_edit->status == 'Inactive'){ echo "selected";} } ?>  value="Inactive">Inactive</option>
                                        <option <?php if(!empty($user_edit->status)){ if($user_edit->status == 'Disabled'){ echo "selected";} } ?>  value="Disabled">Disabled</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Business Unit</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="unit_id">
                                        <option value="">Select Your Business Unit</option>
                                        @foreach($units as $data)

                                            <option <?php if(!empty($user_edit)){ if($user_edit->unit_id == $data->id ){ echo "selected"; }} ?> value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>
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
@if(!isset($user_edit))
    <script type="text/javascript">
        $(function(){
            jQuery.validator.addMethod('weexpan', function (value, element) {
            return this.optional(element) || /^[a-z0-9](\.?[a-z0-9]){5,}@weexpan\.co.in$/i.test(value);
            }, "not a valid Weexpan email address");
            $(".{{$class}}").validate({
                rules: {

                    first_name: {
                        required:true
                    },
                    last_name: {
                        required:true
                    },
                    email: {
                        // required:true,
                        weexpan: true,
                        remote: "{{url('admin/email-exists-check')}}",

                    },
                    personal_email: {
                        required:true,
                        email: true,
                        remote: "{{url('admin/personal-email-exists-check')}}",

                    },
                    phone: {

                        required:true,
                        remote: "{{url('admin/phone-exists-check')}}",
                    },
                    gender: {
                        required:true,
                    },
                    status: {
                        required:true,
                    },
                    role: {
                        required:true,
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
                        weexpan: "Please Enter Weexpan Email Address",
                        required: "Please Enter Your Email",
                        remote: "Email Already Registered With Us",
                    },
                    personal_email: {

                        required: "Please Enter Your Email",
                        remote: "Email Already Registered With Us",
                    },
                    phone: {

                        required: "Please Enter Your Phone no",
                        remote: "Phone no Already Registered With Us",
                    },
                    gender: {

                        required: "Please Select Your Gender",
                    },
                    status: {

                        required: "Please Select Your Status",
                    },
                    role: {

                        required: "Please Select Your Role",
                    },
                },
                submitHandler: function(form) {
                
                form.submit();
                }
            });
        })
    </script>
@endif
@if(isset($user_edit))
<script type="text/javascript">
    $(function(){
        jQuery.validator.addMethod('weexpan', function (value, element) {
            return this.optional(element) || /^[a-z0-9](\.?[a-z0-9]){5,}@weexpan\.co.in$/i.test(value);
        }, "not a valid Weexpan email address");
        var user_id = "{{$user_edit->id}}";
        $(".{{$class}}").validate({
            rules: {

                first_name: {
                    required:true
                },
                last_name: {
                    required:true
                },
                email: {
                    required:true,
                    weexpan: true,
                    remote: "{{url('admin/email-exists-check-edit')}}"+'/'+user_id,

                },
                personal_email: {
                    required:true,
                    email: true,
                    remote: "{{url('admin/personal-email-exists-check-edit')}}"+'/'+user_id,

                },
                phone: {

                    required:true,
                    remote: "{{url('admin/phone-exists-check-edit')}}"+'/'+user_id,
                },
                gender: {
                    required:true,
                },
                status: {
                    required:true,
                },
                role: {
                    required:true,
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
                    weexpan: "Please Enter Weexpan Email Address",
                    required: "Please Enter Your Email",
                    remote: "Email Already Registered With Us",
                },
                personal_email: {

                    required: "Please Enter Your Email",
                    remote: "Email Already Registered With Us",
                },
                phone: {

                    required: "Please Enter Your Phone no",
                    remote: "Phone no Already Registered With Us",
                },
                gender: {

                    required: "Please Select Your Gender",
                },
                status: {

                    required: "Please Select Your Status",
                },
                role: {

                    required: "Please Select Your Role",
                },
            },
            submitHandler: function(form) {
            
            form.submit();
            }
        });
    })
</script>
@endif
@endsection