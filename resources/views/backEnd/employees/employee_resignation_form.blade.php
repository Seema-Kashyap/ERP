@extends('backEnd.layouts.master')

@section('content')
<?php

    if(isset($resignation_edit)){

        $url = url('admin/resignation-edit/'.$resignation_edit->id);
        $title = "Edit";
        $class = "resignation_edit";

    }else{
        $url = url('admin/resignation-add');
        $title = "Add";
        $class = "resignation_add";
    }
?>
<div style="min-height: 600px;" class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>{{$title}} Resignation Detail</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{$title}} Resignation Detail</h2>
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
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Employee Reason For Resignation<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                     <input type="text" class="form-control" name="emp_reason_resig" value="{{isset($resignation_edit->emp_reason_resig) ? $resignation_edit->emp_reason_resig : '' }}" placeholder="Employee Reason For Resignation">
                                   
                                </div>
                            </div>                                                 
                            
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Date of Resigning Letter Submitted</label>
                                <div class="col-md-6 col-sm-6 ">
                                     <input type="text" class="form-control emp_date_resigning_letter" name="emp_date_resigning_letter" value="{{isset($resignation_edit->emp_date_resigning_letter) ? $resignation_edit->emp_date_resigning_letter : '' }}" placeholder="YYYY-MM-DD">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Date of Relieving</label>
                                <div class="col-md-6 col-sm-6 ">
                                     <input type="text" class="form-control emp_date_relieving" name="emp_date_relieving" value="{{isset($resignation_edit->emp_date_relieving) ? $resignation_edit->emp_date_relieving : '' }}" placeholder="YYYY-MM-DD">
                                </div>
                            </div>   

                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Resigned</label>
                                <div class="col-md-6 col-sm-6 ">
                                       <input type="text" class="form-control emp_resigned" name="emp_resigned" value="{{isset($resignation_edit->emp_resigned) ? $resignation_edit->emp_resigned : '' }}" placeholder="Employee Resigned">
                                </div>
                            </div>
                             <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Resign Date</label>
                                <div class="col-md-6 col-sm-6 ">
                                       <input type="text" class="form-control emp_resigned_date" name="emp_resigned_date" value="{{isset($resignation_edit->emp_resigned_date) ? $resignation_edit->emp_resigned_date : '' }}" placeholder="YYYY-MM-DD">
                                </div>
                            </div>
                            <?php 
                                if(!empty($resignation_edit->emp_ipr_letter)) {

                                    $image = iprLetterImagePath.'/'.$resignation_edit->emp_ipr_letter;
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align">PDF Image Preview</label>
                                <div class="col-md-6 col-sm-6 mb-50">
                                    <div class="col-sm-10 " style="padding: 0">
                                        <?php if($image_extension == 'pdf'){ ?>

                                            <img src="{{url('public/images/pdf_logo.png')}}" width="50%" height="100%" id="old_image"  alt="No image"  >

                                        <?php }else{ ?>

                                            <img src="{{$image}}" width="50%" height="100%" id="old_image"  alt="No image"  >
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee IPR Letter PDF Upload</label>
                                <div class="col-md-6 col-sm-6 mb-3">
                                    <input type="file" class="form-control img_upload" name="emp_ipr_letter" accept=".jpg, .jpeg, .pdf">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="status">
                                        <option value="">Select Status</option>
                                        <option <?php if(!empty($resignation_edit->status)){ if($resignation_edit->status == 'Active'){ echo "selected";} } ?> value="Active">Active</option>
                                        <option <?php if(!empty($resignation_edit->status)){ if($resignation_edit->status == 'Inactive'){ echo "selected";} } ?>  value="Inactive">Inactive</option>
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

                emp_reason_resig: {
                    required:true
                },

                emp_date_resigning_letter: {
                    required:true
                },

                emp_date_relieving: {
                    required:true
                },

                emp_resigned:{
                    required:true
                },

                status: {
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

                emp_reason_resig: {
                    required: "Please Enter Reason of Resignation",
                },

                emp_date_resigning_letter: {
                    required: "Please Enter Your Date of Reigning Letter Submitted",
                },

                emp_date_relieving: {
                    required: "Please Enter Your Date of Relieving",
                },

                emp_resigned:{
                    required:"Please Enter Your Resigned",
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
                    url: "{{url('admin/user-resignation-details')}}"+'/'+unit_id,
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

@if(!isset($resignation_edit))
    <script type="text/javascript">
        $(function(){

            var id = $( ".business_unit_id option:selected" ).val();

            if(id != ''){
                $(".loader_fixed").show();
                $.ajax({

                    type: "GET",
                    url: "{{url('admin/user-resignation-details')}}"+'/'+id,
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
                });
            }
        })
    </script>
@endif
<script type="text/javascript">
    $(function(){

        $('.emp_date_relieving').datetimepicker({
            format: 'YYYY-MM-DD',
            maxDate: moment(),
        });
   

        <?php if(!empty($resignation_edit)){ ?>
                var emp_date_relieving = "{{$resignation_edit->emp_date_relieving}}";

                $(".emp_date_relieving").val(emp_date_relieving);

            <?php }else{ ?>

                $(".emp_date_relieving").val("");
        <?php } ?> 

        // Employee Date of Resigning Letter
        $('.emp_date_resigning_letter').datetimepicker({
            format: 'YYYY-MM-DD',
            maxDate: moment(),
        });   

        <?php if(!empty($resignation_edit)){ ?>
                var emp_date_resigning_letter = "{{$resignation_edit->emp_date_resigning_letter}}";

                $(".emp_date_resigning_letter").val(emp_date_resigning_letter);

            <?php }else{ ?>

                $(".emp_date_resigning_letter").val("");
        <?php } ?> 

        // Employee Resign Date
          $('.emp_resigned_date').datetimepicker({
            format: 'YYYY-MM-DD',
            maxDate: moment(),
        });   

        <?php if(!empty($resignation_edit)){ ?>
                var emp_resigned_date = "{{$resignation_edit->emp_resigned_date}}";

                $(".emp_resigned_date").val(emp_resigned_date);

            <?php }else{ ?>

                $(".emp_resigned_date").val("");
        <?php } ?>

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
                    if(input.files[0].type == "application/pdf"){

                        $('#old_image').attr('src', "{{url('public/images/pdf_logo.png')}}");

                    }else{

                        $('#old_image').attr('src', e.target.result);
                    }
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