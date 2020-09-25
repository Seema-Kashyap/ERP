@extends('backEnd.layouts.master')

@section('content')
<?php

    if(isset($statutory_edit)){

        $url = url('admin/statutory-edit/'.$statutory_edit->id);
        $title = "Edit";
        $class = "statutory_edit";

    }else{
        $url = url('admin/statutory-add');
        $title = "Add";
        $class = "statutory_add";
    }
?>
<div style="min-height: 600px;" class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>{{$title}} Staturory Detail</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{$title}} Staturory Detail</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form method="post" action="{{$url}}"  data-parsley-validate class="{{$class}}">
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
                                     
                                   <select class="form-control employee_details" name="user_id">
                                        <option value="">Select Your Employee</option>
                                        <?php if(!empty($user_unit)){
                                        ?>
                                        <option selected="selected"  value='{{$user_unit->id}}'><?php echo  ucfirst($user_unit->first_name).' '.ucfirst($user_unit->last_name)." ". "("." ".$user_unit->email." ".")"; ?></option>

                                        <?php } ?>
                                   </select>
                                </div>
                            </div>         
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Employee PF Number<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                     <input type="text" class="form-control" name="emp_pfi_no" value="{{isset($statutory_edit->emp_pfi_no) ? $statutory_edit->emp_pfi_no : '' }}">
                                   
                                </div>
                            </div>                                                 
                            
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">PFI Nominee Name</label>
                                <div class="col-md-6 col-sm-6 ">
                                     <input type="text" class="form-control" name="emp_nominee_name" value="{{isset($statutory_edit->emp_nominee_name) ? $statutory_edit->emp_nominee_name : '' }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Nominee Date of Birth</label>
                                <div class="col-md-6 col-sm-6 ">
                                     <input type="text" class="form-control emp_nominee_dob" name="emp_nominee_dob" value="{{isset($statutory_edit->emp_nominee_dob) ? $statutory_edit->emp_nominee_dob : '' }}" placeholder="YYYY-MM-DD">
                                </div>
                            </div>   

                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">PFI Nominee Relation</label>
                                <div class="col-md-6 col-sm-6 ">
                                       <select class="form-control" name="emp_nominee_relation">
                                        <option value="">Select Employee Relation</option>
                                        <option <?php if(!empty($statutory_edit->emp_nominee_relation)){ if($statutory_edit->emp_nominee_relation == 'father'){ echo "selected";} } ?> value="father">Father</option>
                                        <option <?php if(!empty($statutory_edit->emp_nominee_relation)){ if($statutory_edit->emp_nominee_relation == 'mother'){ echo "selected";} } ?> value="mother">Mother</option>
                                         <option <?php if(!empty($statutory_edit->emp_nominee_relation)){ if($statutory_edit->emp_nominee_relation == 'brother'){ echo "selected";} } ?> value="brother">Brother</option>
                                         <option <?php if(!empty($statutory_edit->emp_nominee_relation)){ if($statutory_edit->emp_nominee_relation == 'sister'){ echo "selected";} }?> value="sister">Sister</option>
                                         <option <?php if(!empty($statutory_edit->emp_nominee_relation)){ if($statutory_edit->emp_nominee_relation == 'husband'){ echo "selected";} }?> value="husband">Husband</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="status">
                                        <option value="">Select Status</option>
                                        <option <?php if(!empty($statutory_edit->status)){ if($statutory_edit->status == 'Active'){ echo "selected";} } ?> value="Active">Active</option>
                                        <option <?php if(!empty($statutory_edit->status)){ if($statutory_edit->status == 'Inactive'){ echo "selected";} } ?>  value="Inactive">Inactive</option>
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

                emp_pfi_no: {
                    required:true
                },

                emp_nominee_name: {
                    required:true
                },

                emp_nominee_dob: {
                    required:true
                },

                emp_nominee_relation:{
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

                emp_pfi_no: {
                    required: "Please Enter Your PF Number",
                },

                emp_nominee_name: {
                    required: "Please Enter Your Nominee Name",
                },

                emp_nominee_dob: {
                    required: "Please Enter Your Nominee Date of Birth",
                },

                emp_nominee_relation:{
                    required:"Please Select Your Nominee Relation",
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
                    url: "{{url('admin/user-statutory-details')}}"+'/'+unit_id,
                    success:function(resp){
                        $(".loader_fixed").hide();
                        $(".employee_details").html(resp);
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

                $(".employee_details").html("<option value=''>Select Your Employee</option>");
            }
        })
    })
</script>

@if(!isset($statutory_edit))
    <script type="text/javascript">
        $(function(){

            var id = $( ".business_unit_id option:selected" ).val();

            if(id != ''){
                $(".loader_fixed").show();
                $.ajax({

                    type: "GET",
                    url: "{{url('admin/user-statutory-details')}}"+'/'+id,
                    success: function(resp){

                        if(resp != ''){
                            $(".loader_fixed").hide();
                            $(".employee_details").html(resp);

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

        $('.emp_nominee_dob').datetimepicker({
            format: 'YYYY-MM-DD',
            maxDate: moment(),
        });

   

        <?php if(!empty($statutory_edit)){ ?>
                var emp_nominee_dob = "{{$statutory_edit->emp_nominee_dob}}";

                $(".emp_nominee_dob").val(asset_issued);

            <?php }else{ ?>

                $(".emp_nominee_dob").val("");
        <?php } ?>      
    })
</script>
@endsection