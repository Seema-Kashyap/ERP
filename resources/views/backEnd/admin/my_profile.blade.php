@extends('backEnd.layouts.master')

@section('content')
<?php

    if(isset($user_details)){

        $url = url('admin/my-profile/');
        $title = "Edit";
        $class = "edit_Profile";

    }
 ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>My Profile</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Welcome {{$user_details->first_name}} {{$user_details->last_name}} </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form method="post" action="{{$url}}"  data-parsley-validate class="{{$class}}" enctype="multipart/form-data">
                            @csrf
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first_name">First Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="first_name" value="{{isset($user_details->first_name) ? $user_details->first_name : ''}}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last_name">Last Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text"  name="last_name"  class="form-control" value="{{isset($user_details->last_name) ? $user_details->last_name : ''}}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Email</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input  class="form-control" type="email" name="email" value="{{isset($user_details->email) ? $user_details->email : ''}}" >
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Phone no<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input  class="form-control" type="text" name="phone" value="{{isset($user_details->phone) ? $user_details->phone : ''}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="gender">
                                        <option   value="">Select Gender</option>
                                        <option <?php if($user_details->gender == 'male'){ echo "selected";} ?> value="Male">Male</option>
                                        <option <?php if($user_details->gender == 'female'){ echo "selected";} ?> value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <?php 
                                if(!empty($user_details->image)) {

                                    $image = profileImageImagePath.'/'.$user_details->image;
                                }else{
                                    $image = DefaultImgPath;
                                }
                            ?>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Image Preview</label>
                                <div class="col-md-6 col-sm-6 mb-50">
                                    <div class="col-sm-10 " style="padding: 0">
                                        <img src="{{$image}}" width="40%" height="100%" id="old_image"  alt="No image"  >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Image Upload</label>
                                <div class="col-md-6 col-sm-6 mb-3">
                                    <input type="file" class="form-control img_upload" name="image">
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
        var user_id = "{{$user_details->id}}";
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
                    email: true,
                    remote: "{{url('admin/email-exists-check-edit')}}"+'/'+user_id,

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
<script type="text/javascript">
    $(document).ready(function(){
        function readURL(input)
        {
            if(input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function(e)
                {
                    $('#old_image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('.img_upload').change(function(){

            var img_name = $(this).val();

            if(img_name != '' && img_name != null)
            {
                var img_arr = img_name.split('.');

                var ext = img_arr.pop();
                ext = ext.toLowerCase();

                if(ext == 'jpeg' || ext == 'jpg' || ext == 'png')
                {
                    input = document.getElementById('img_upload');
                    value = readURL(this);
                }else{
                    $(this).val('');

                    alert('Please select an image of .jpeg, .jpg, .png file format.');
                }
            }else{
                $(this).val('');
                alert('Please select an image of .jpeg, .jpg, .png file format.');
            }
        });
    });
</script>
@endsection