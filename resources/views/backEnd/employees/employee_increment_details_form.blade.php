@extends('backEnd.layouts.master')

@section('content')
<?php

    if(isset($increment_details_edit)){

        $url = url('admin/increment-details-edit/'.$increment_details_edit->id);
        $title = "Edit";
        $class = "increment_details_edit";

    }else{
        $url = url('admin/increment-details-add');
        $title = "Add";
        $class = "increment_details_add";
    }
?>
<div style="min-height: 600px;" class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>{{$title}} Increment Details</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{$title}} Increment Detail</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form method="post" action="{{$url}}" enctype="multipart/form-data">
                            @csrf
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="business_unit_id">Business Unit <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control business_unit_id" name="business_unit_id">
                                        <option value="">Select Business Unit</option>
                                        @foreach($units as $data)
                                        <option <?php if(!empty($user_id)){ if($data->id == $user_id->unit_id){ echo "selected"; } }?> value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div> 
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Employee Name<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                   <select class="form-control increment_details" name="user_id">
                                        <option value="">Select Your Employee</option>
                                        <?php if(!empty($user_id)){
                                        ?>
                                        <option selected="selected"  value='{{$user_id->id}}'><?php echo  ucfirst($user_id->first_name).' '.ucfirst($user_id->last_name)." ". "("." ".$user_id->email." ".")"; ?></option>

                                        <?php } ?>
                                   </select>
                                </div>
                            </div>  

                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Period of Increment <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control emp_period_increment" name="emp_period_increment" value="{{isset($increment_details_edit->emp_period_increment) ? $increment_details_edit->emp_period_increment : '' }}" placeholder="Period of Increment">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Current Salary<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control emp_current_salary" name="emp_current_salary" value="{{isset($increment_details_edit->emp_current_salary) ? $increment_details_edit->emp_current_salary : '' }}" placeholder="Current Salary">
                                </div>
                            </div>
                             <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Increased Salary<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control emp_increased_salary" name="emp_increased_salary" value="{{isset($increment_details_edit->emp_increased_salary) ? $increment_details_edit->emp_increased_salary : '' }}" placeholder="Increased Salary">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee ESIC Number/Medical Claim <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control emp_emp_esicno_mediclaim" name="emp_emp_esicno_mediclaim" value="{{isset($increment_details_edit->emp_emp_esicno_mediclaim) ? $increment_details_edit->emp_emp_esicno_mediclaim : '' }}" placeholder="ESIC Nmuber/Medical Claim">
                                </div>
                            </div>              
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="status">
                                        <option value="">Select Status</option>
                                        <option <?php if(!empty($increment_details_edit->status)){ if($increment_details_edit->status == 'Active'){ echo "selected";} } ?> value="Active">Active</option>
                                        <option <?php if(!empty($increment_details_edit->status)){ if($increment_details_edit->status == 'Inactive'){ echo "selected";} } ?>  value="Inactive">Inactive</option>
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
                
                emp_period_increment: {
                    required:true
                },
                
                emp_current_salary:{
                    required:true
                },

                emp_increased_salary:{
                    required:true
                }

                emp_emp_esicno_mediclaim:{
                    required:true
                }

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

                emp_period_increment: {
                    required: "Please Enter Your Employee Period of Increment",
                },
                
                emp_current_salary:{
                    required:"Please Enter Your Employee Current Salary",
                },

                emp_increased_salary: {
                    required: "Please Enter Your Employee Increased Salary",
                },

                emp_emp_esicno_mediclaim:{
                    required:"Please Enter Your Employee ESIC Number/Medical Claim"
                }

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
                    url: "{{url('admin/increment-details')}}"+'/'+unit_id,
                    success:function(resp){
                        $(".loader_fixed").hide();
                        $(".increment_details").html(resp);
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

                $(".increment_details").html("<option value=''>Select Your Employee</option>");
            }
        })
    })
</script>

@if(!isset($increment_details_edit))
    <script type="text/javascript">
        $(function(){

            var id = $( ".business_unit_id option:selected" ).val();

            if(id != ''){
                $(".loader_fixed").show();
                $.ajax({

                    type: "GET",
                    url: "{{url('admin/increment-details')}}"+'/'+id,
                    success: function(resp){

                        if(resp != ''){
                            $(".loader_fixed").hide();
                            $(".increment_details").html(resp);

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
@endsection