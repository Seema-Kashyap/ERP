@extends('backEnd.layouts.master')

@section('content')
<?php

    if(isset($after_joining_edit)){

        $url = url('admin/after-joining-edit/'.$after_joining_edit->id);
        $title = "Edit";
        $class = "after_joining_edit";

    }else{
        $url = url('admin/after-joining-add');
        $title = "Add";
        $class = "after_joining_add";
    }
?>
<div style="min-height: 600px;" class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>{{$title}} After Joining Detail</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{$title}} After Joining Detail</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form method="post" action="{{$url}}"  data-parsley-validate class="{{$class}}" enctype="multipart/form-data">
                            @csrf
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="business_unit_id">Business Unit <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control business_unit_id" name="business_unit_id">
                                        <option value="">Select Business Unit</option>
                                        @foreach($units as $data)
                                        <option <?php if(!empty($user_unit)){ if($data->id == $user_unit->unit_id){ echo "selected"; } }?> value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div> 
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Employee Name<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                     
                                   <select class="form-control resignation_details" name="user_id">
                                        <option value="">Select Your Employee</option>
                                        <?php if(!empty($user_unit)){
                                        ?>
                                        <option selected="selected"  value='{{$user_unit->id}}'><?php echo  ucfirst($user_unit->first_name).' '.ucfirst($user_unit->last_name)." ". "("." ".$user_unit->email." ".")"; ?></option>

                                        <?php } ?>
                                   </select>
                                </div>
                            </div>  
                            <?php 
                                if(!empty($after_joining_edit->emp_letter_employement)) {

                                    $image = employmentLetterImagePath.'/'.$after_joining_edit->emp_letter_employement;

                                    $path_info  = pathinfo($image);
                                    $image_extension =  $path_info['extension']; 

                                }else{
                                    $image_extension = "";
                                    $image = DefaultImgPath;
                                }
                            ?>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">JPG/PDF Image Preview</label>
                                <div class="col-md-6 col-sm-6 mb-50">
                                    <div class="col-sm-10 " style="padding: 0">
                                        <?php if($image_extension == 'pdf'){ ?>

                                            <img src="{{url('public/images/pdf_logo.png')}}" width="50%" height="100%" id="emp_letter_employement"  alt="No image"  >

                                        <?php }else{ ?>

                                            <img src="{{$image}}" width="50%" height="100%" id="emp_letter_employement"  alt="No image"  >
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Letter of Employment PDF Upload</label>
                                <div class="col-md-6 col-sm-6 mb-3">
                                    <input type="file" class="form-control emp_letter_employement" name="emp_letter_employement" accept=".jpg, .jpeg, .pdf">
                                </div>
                            </div>             
                            <?php 
                                if(!empty($after_joining_edit->emp_appointment_letter)) {

                                    $image = appointmentLetterImagePath.'/'.$after_joining_edit->emp_appointment_letter;

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
                                <label class="col-form-label col-md-3 col-sm-3 label-align">JPG/PDF Image Preview</label>
                                <div class="col-md-6 col-sm-6 mb-50">
                                    <div class="col-sm-10 " style="padding: 0">
                                        <?php if($image_extension == 'pdf'){ ?>

                                            <img src="{{url('public/images/pdf_logo.png')}}" width="50%" height="100%" id="emp_appointment_letter"  alt="No image"  >

                                        <?php }else{ ?>

                                            <img src="{{$image}}" width="50%" height="100%" id="emp_appointment_letter"  alt="No image"  >
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Appointment Letter PDF Upload</label>
                                <div class="col-md-6 col-sm-6 mb-3">
                                    <input type="file" class="form-control emp_appointment_letter" name="emp_appointment_letter" accept=".jpg, .jpeg, .pdf">
                                </div>
                            </div>

                            <?php 
                                if(!empty($after_joining_edit->emp_confirmation_letter)) {

                                    $image = confirmationLetterImagePath.'/'.$after_joining_edit->emp_confirmation_letter;

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
                                <label class="col-form-label col-md-3 col-sm-3 label-align">JPG/PDF Image Preview</label>
                                <div class="col-md-6 col-sm-6 mb-50">
                                    <div class="col-sm-10 " style="padding: 0">
                                        <?php if($image_extension == 'pdf'){ ?>

                                            <img src="{{url('public/images/pdf_logo.png')}}" width="50%" height="100%" id="emp_confirmation_letter"  alt="No image"  >

                                        <?php }else{ ?>

                                            <img src="{{$image}}" width="50%" height="100%" id="emp_confirmation_letter"  alt="No image"  >
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Confirmation Letter PDF Upload</label>
                                <div class="col-md-6 col-sm-6 mb-3">
                                    <input type="file" class="form-control emp_confirmation_letter" name="emp_confirmation_letter" accept=".jpg, .jpeg, .pdf">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Date of Confirmation <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control emp_date_confirmation" name="emp_date_confirmation" value="{{isset($after_joining_edit->emp_date_confirmation) ? $after_joining_edit->emp_date_confirmation : '' }}" placeholder="YYYY-MM-DD">
                                </div>
                            </div>

                             <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Extension of Confirmation <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control emp_extension_confirmation" name="emp_extension_confirmation" value="{{isset($after_joining_edit->emp_extension_confirmation) ? $after_joining_edit->emp_extension_confirmation : '' }}" placeholder="YYYY-MM-DD">
                                </div>
                            </div>
                            <?php 
                                if(!empty($after_joining_edit->emp_transfer_letter)) {

                                    $image = transferLetterImagePath.'/'.$after_joining_edit->emp_transfer_letter;

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
                                <label class="col-form-label col-md-3 col-sm-3 label-align">JPG/PDF Image Preview</label>
                                <div class="col-md-6 col-sm-6 mb-50">
                                    <div class="col-sm-10 " style="padding: 0">
                                        <?php if($image_extension == 'pdf'){ ?>

                                            <img src="{{url('public/images/pdf_logo.png')}}" width="50%" height="100%" id="emp_transfer_letter"  alt="No image"  >

                                        <?php }else{ ?>

                                            <img src="{{$image}}" width="50%" height="100%" id="emp_transfer_letter"  alt="No image"  >
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Transfer Letter PDF Upload</label>
                                <div class="col-md-6 col-sm-6 mb-3">
                                    <input type="file" class="form-control emp_transfer_letter" name="emp_transfer_letter" accept=".jpg, .jpeg, .pdf">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Name of the Bank <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control" name="emp_name_bank" value="{{isset($after_joining_edit->emp_name_bank) ? $after_joining_edit->emp_name_bank : '' }}" placeholder="Employee Bank Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Account Number <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                       <input type="text" class="form-control" name="emp_account_no" value="{{isset($after_joining_edit->emp_account_no) ? $after_joining_edit->emp_account_no : '' }}" placeholder="Employee Account No.">
                                </div>
                            </div>                           
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="status">
                                        <option value="">Select Status</option>
                                        <option <?php if(!empty($after_joining_edit->status)){ if($after_joining_edit->status == 'Active'){ echo "selected";} } ?> value="Active">Active</option>
                                        <option <?php if(!empty($after_joining_edit->status)){ if($after_joining_edit->status == 'Inactive'){ echo "selected";} } ?>  value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <button class="btn btn-primary" type="reset" type="">Cancel</button>
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

        $(".{{$class}}").validate({
            rules: {

               business_unit_id: {
                    required:true
                },

                user_id: {
                    required:true
                },
                emp_date_confirmation:{
                    required:true
                },
                emp_date_confirmation:{
                    required:true
                },
                emp_extension_confirmation:{
                    required:true
                },

                status: {
                    required:true,
                },
                emp_name_bank: {
                    required:true,
                },
                emp_account_no: {
                    required:true,
                },
            },

            messages: {

                business_unit_id: {
                    required: "Please Select Your Business Unit Name",
                },

                user_id: {
                    required: "Please Select Your Employee Name",
                },

                emp_date_confirmation:{
                    required:"Please Enter Your Employee Date Of Confirmation",
                },
                emp_extension_confirmation:{
                    required:"Please Enter Your Employee Extension of Confirmation",
                },
                emp_name_bank:{
                    required:"Please Enter Your Employee Name Of Bank",
                },
                emp_account_no:{
                    required:"Please Enter Your Employee Account no",
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

        $(".business_unit_id").change(function(){

            var unit_id = $(this).val();

            if(unit_id != ''){
                $(".loader_fixed").show();
                $.ajax({
                    method: "get",
                    url: "{{url('admin/user-after-join-details')}}"+'/'+unit_id,
                    success:function(resp){
                        $(".loader_fixed").hide();
                        $(".resignation_details").html(resp);
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
            }else if(unit_id == ''){

                $(".resignation_details").html("<option value=''>Select Your Employee</option>");
            }
        })
    })
</script>

@if(!isset($after_joining_edit))
    <script type="text/javascript">
        $(function(){

            var id = $( ".business_unit_id option:selected" ).val();

            if(id != ''){
                $(".loader_fixed").show();
                $.ajax({

                    type: "GET",
                    url: "{{url('admin/user-after-join-details')}}"+'/'+id,
                    success: function(resp){

                        if(resp != ''){
                            $(".loader_fixed").hide();
                            $(".resignation_details").html(resp);

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
                })
            }
        })
    </script>
@endif
<script type="text/javascript">
    $(function(){

        // Employee Confirmation
        $('.emp_date_confirmation').datetimepicker({
            format: 'YYYY-MM-DD',
            maxDate: moment(),
        });
   

        <?php if(!empty($after_joining_edit)){ ?>
                var emp_date_confirmation = "{{$after_joining_edit->emp_date_confirmation}}";

                $(".emp_date_confirmation").val(emp_date_confirmation);

            <?php }else{ ?>

                $(".emp_date_confirmation").val("");
        <?php } ?> 

        // Employee Extension Confirmation Date
          $('.emp_extension_confirmation').datetimepicker({
            format: 'YYYY-MM-DD',
            maxDate: moment(),
        });   

        <?php if(!empty($after_joining_edit)){ ?>
                var emp_extension_confirmation = "{{$after_joining_edit->emp_extension_confirmation}}";

                $(".emp_extension_confirmation").val(emp_extension_confirmation);

            <?php }else{ ?>

                $(".emp_extension_confirmation").val("");
        <?php } ?>

    })
</script>
<!-- Letter of Employment -->
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

                        $('#emp_letter_employement').attr('src', "{{url('public/images/pdf_logo.png')}}");

                    }else{

                        $('#emp_letter_employement').attr('src', e.target.result);
                    }
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('.emp_letter_employement').change(function(){

            var img_name = $(this).val();

            if(img_name != '' && img_name != null)
            {
                var img_arr = img_name.split('.');

                var ext = img_arr.pop();
                ext = ext.toLowerCase();

                if(ext == 'jpeg' || ext == 'jpg' || ext == 'pdf')
                {
                    input = document.getElementById('img_upload');
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

<!-- Appointment Letter of Employee -->
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

                        $('#emp_appointment_letter').attr('src', "{{url('public/images/pdf_logo.png')}}");

                    }else{

                        $('#emp_appointment_letter').attr('src', e.target.result);
                    }
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('.emp_appointment_letter').change(function(){

            var img_name = $(this).val();

            if(img_name != '' && img_name != null)
            {
                var img_arr = img_name.split('.');

                var ext = img_arr.pop();
                ext = ext.toLowerCase();

                if(ext == 'jpeg' || ext == 'jpg' || ext == 'pdf')
                {
                    input = document.getElementById('img_upload');
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
<!-- Confirmation Letter Employment -->
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

                        $('#emp_confirmation_letter').attr('src', "{{url('public/images/pdf_logo.png')}}");

                    }else{

                        $('#emp_confirmation_letter').attr('src', e.target.result);
                    }
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('.emp_confirmation_letter').change(function(){

            var img_name = $(this).val();

            if(img_name != '' && img_name != null)
            {
                var img_arr = img_name.split('.');

                var ext = img_arr.pop();
                ext = ext.toLowerCase();

                if(ext == 'jpeg' || ext == 'jpg' || ext == 'pdf')
                {
                    input = document.getElementById('img_upload');
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
<!-- Transfer Letter Employment -->
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

                        $('#emp_transfer_letter').attr('src', "{{url('public/images/pdf_logo.png')}}");

                    }else{

                        $('#emp_transfer_letter').attr('src', e.target.result);
                    }
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('.emp_transfer_letter').change(function(){

            var img_name = $(this).val();

            if(img_name != '' && img_name != null)
            {
                var img_arr = img_name.split('.');

                var ext = img_arr.pop();
                ext = ext.toLowerCase();

                if(ext == 'jpeg' || ext == 'jpg' || ext == 'pdf')
                {
                    input = document.getElementById('img_upload');
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
@endsection