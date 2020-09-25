@extends('backEnd.layouts.master')

@section('content')
<?php

    if(isset($employee_edit)){

        $url = url('admin/employee-edit/'.$employee_edit->id);
        $title = "Edit";
        $class = "employee_edit";

    }else{
        $url = url('admin/employee-add');
        $title = "Create New";
        $class = "employee_add";
    }
 ?>
<div style="min-height: 600px;" class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>{{$title}} Employee Detail</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{$title}} Employee Detail</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form method="post" action="{{$url}}"  data-parsley-validate class="{{$class}}">
                            @csrf
                            <div class="item form-group employee_code_main_div">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="emp_code">Employee Code <span class="required">*</span>
                                </label>
                                <?php 
                                    if(!empty($last_emp_code)){

                                       $last_emp_code = preg_replace( '/[^0-9]/', '', $last_emp_code);

                                    }else{

                                        $last_emp_code = "";
                                    }
                                ?>
                                <div class="col-md-6 col-sm-6 employee_code_div ">
                                     <input type="text" class="form-control employee_code " name="emp_code" value="{{isset($employee_edit->emp_code) ? preg_replace( '/[^0-9]/', '', $employee_edit->emp_code) : $last_emp_code }}">
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <button type="button" class="btn btn-success generate_employee_code">Generate</button>  
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Business Unit <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                     
                                   <select class="form-control business_unit" name="business_unit_id">
                                        <option value="">Select Your Business Unit</option>
                                        @foreach($units as $data)
                                             <option <?php if(!empty($user_unit)){ if($data->id == $user_unit->unit_id){ echo "selected"; }} ?> value="{{$data->id}}">{{$data->name}}</option>
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Designation Name<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                     
                                   <select class="form-control designation_name" name="emp_designation">
                                        <option value="">Select Your Designation</option>
                                        @if(!empty($designations[0]))
                                            @foreach($designations as $data)
                                                <option <?php  if($data->designation_name == $employee_edit->emp_designation){ echo "selected"; } ?> value="{{$data->designation_name}}">{{$data->designation_name}}</option>
                                            @endforeach
                                        @endif
                                   </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Level</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control designation_level" name="emp_level">
                                        <option value="">Select Your Employee Level</option>
                                        @if(!empty($designations[0]))
                                            @foreach($designations as $data)
                                                <option <?php  if($data->level == $employee_edit->emp_level){ echo "selected"; } ?> value="{{$data->level}}">{{$data->level}}</option>
                                            @endforeach
                                        @endif
                                   </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Marital Status</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="emp_marital_status">
                                        <option value="">Select Employee Marital Status</option>
                                        <option <?php if(!empty($employee_edit->emp_marital_status)){ if($employee_edit->emp_marital_status == 'married'){ echo "selected";} } ?> value="married">Married</option>
                                        <option <?php if(!empty($employee_edit->emp_marital_status)){ if($employee_edit->emp_marital_status == 'unmarried'){ echo "selected";} } ?> value="unmarried">Unmarried</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Date of Joining</label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" class="form-control date_of_join " name="emp_doj" value="{{isset($employee_edit->emp_doj) ? $employee_edit->emp_doj : '' }}" placeholder="YYYY-MM-DD">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Formalities Completed On</label>
                                <div class="col-md-6 col-sm-6 ">
                                     <input type="text" class="form-control emp_formality " name="emp_formality" value="{{isset($employee_edit->emp_formality) ? $employee_edit->emp_formality : '' }}" placeholder="YYYY-MM-DD">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Date of Birth</label>
                                <div class="col-md-6 col-sm-6 ">
                                     <input type="text" class="form-control emp_dob" name="emp_dob" value="{{isset($employee_edit->emp_dob) ? $employee_edit->emp_dob : '' }}" placeholder="YYYY-MM-DD">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Age</label>
                                <div class="col-md-6 col-sm-6 ">
                                     <input type="text" class="form-control emp_age " name="emp_age" value="{{isset($employee_edit->emp_age) ? $employee_edit->emp_age : '' }}" placeholder="30 Years Old">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Blood Group</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="emp_blood_group">
                                        <option value="">Select Employee Blood Group</option>
                                        <option <?php if(!empty($employee_edit->emp_blood_group)){ if($employee_edit->emp_blood_group == 'A+'){ echo "selected";} } ?> value="A+">A+</option>

                                        <option <?php if(!empty($employee_edit->emp_blood_group)){ if($employee_edit->emp_blood_group == 'O+'){ echo "selected";} } ?>  value="O+">O+</option>

                                        <option <?php if(!empty($employee_edit->emp_blood_group)){ if($employee_edit->emp_blood_group == 'B+'){ echo "selected";} } ?>  value="B+">B+</option>

                                        <option <?php if(!empty($employee_edit->emp_blood_group)){ if($employee_edit->emp_blood_group == 'AB+'){ echo "selected";} } ?>  value="AB+">AB+</option>

                                        <option <?php if(!empty($employee_edit->emp_blood_group)){ if($employee_edit->emp_blood_group == 'A-'){ echo "selected";} } ?>  value="A-">A-</option>

                                        <option <?php if(!empty($employee_edit->emp_blood_group)){ if($employee_edit->emp_blood_group == 'O-'){ echo "selected";} } ?>  value="O-">O-</option>

                                        <option <?php if(!empty($employee_edit->emp_blood_group)){ if($employee_edit->emp_blood_group == 'B-'){ echo "selected";} } ?>  value="B-">B-</option>

                                        <option <?php if(!empty($employee_edit->emp_blood_group)){ if($employee_edit->emp_blood_group == 'AB-'){ echo "selected";} } ?>  value="AB-">AB-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Address 1</label>
                                <div class="col-md-6 col-sm-6 ">
                                     <textarea class="form-control" name="emp_addr_one">{{isset($employee_edit->emp_addr_one) ? $employee_edit->emp_addr_one : '' }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Address 2</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea class="form-control" name="emp_addr_second">{{isset($employee_edit->emp_addr_second) ? $employee_edit->emp_addr_second : '' }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee State</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control emp_state" name="emp_state">
                                        <option value="">Select Employee State</option>
                                        @foreach($india_states as $data)
                                            <option <?php if(!empty($employee_edit)){ if($data->id == $employee_edit->emp_state){ echo "selected";}} ?> value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Employee City<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                     
                                   <select class="form-control emp_city" name="emp_city">
                                        <option value="">Select Your Employee City</option>
                                        @if(!empty($cities[0]))
                                            @foreach($cities as $data)
                                                <option <?php if($data->id == $employee_edit->emp_city){ echo "selected";} ?> value="{{$data->id}}">{{$data->name}}</option>
                                            @endforeach
                                        @elseif(!empty($employee_edit))
                                            <option selected="selected" value='No City Found'>No Record Found</option>
                                        @endif
                                   </select>
                                </div>
                            </div>
                            <div class="item form-group employee_code_main_div">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="emp_code">Employee Pincode <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 employee_code_div ">
                                     <input data-max="6" type="number" class="form-control" name="emp_pincode" value="{{isset($employee_edit->emp_pincode) ? $employee_edit->emp_pincode : '' }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Status</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="emp_status">
                                        <option value="">Select Employee Status</option>
                                        <option <?php if(!empty($employee_edit->emp_status)){ if($employee_edit->emp_status == 'Active'){ echo "selected";} } ?> value="Active">Active</option>
                                        <option <?php if(!empty($employee_edit->emp_status)){ if($employee_edit->emp_status == 'Inactive'){ echo "selected";} } ?> value="Inactive">Inactive</option>
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

        $(".generate_employee_code").click(function(){
            var employee_code = $(this).closest(".employee_code_main_div").find(".employee_code").val();
            // alert(employee_code);
            var count = 0;
            count++;
            employee_code = parseInt(employee_code) + count;
            $(this).closest(".employee_code_main_div").find(".employee_code").val(employee_code);


        })
    })
</script>
<script type="text/javascript">
    $(function(){

        $(".business_unit").change(function(){

            var unit_id = $(this).val();

            if(unit_id != ''){
                $(".loader_fixed").show();
                $.ajax({
                    method: "get",
                    url: "{{url('admin/user-details')}}"+'/'+unit_id,
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
@if(!isset($employee_edit))
    <script type="text/javascript">
        $(function(){

            var id = $( ".business_unit option:selected" ).val();

            if(id != ''){
                $(".loader_fixed").show();
                $.ajax({

                    type: "GET",
                    url: "{{url('admin/user-details')}}"+'/'+id,
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
                });
            }
        })
    </script>
@endif
<script type="text/javascript">
    $(function(){

        $(".business_unit").change(function(){

            var unit_id = $(this).val();

            if(unit_id != ''){
                $(".loader_fixed").show();
                $.ajax({
                    method: "get",
                    url: "{{url('admin/designation-details')}}"+'/'+unit_id,
                    success:function(resp){
                        $(".loader_fixed").hide();
                        $(".designation_name").html(resp.designation_name);
                        $(".designation_level").html(resp.designation_level);
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

                $(".designation_name").html("<option value=''>Select Designation Name</option>");
                $(".designation_level").html("<option value=''>Select Designation Level</option>");
            }
        })
    })
</script>
@if(!isset($employee_edit))
    <script type="text/javascript">
        $(function(){

            var unit_id = $( ".business_unit option:selected" ).val();

            if(unit_id != ''){
                $(".loader_fixed").show();
                $.ajax({

                    method: "GET",
                    url: "{{url('admin/designation-details')}}"+'/'+unit_id,
                    success: function(resp){

                        if(resp != ''){
                            $(".loader_fixed").hide();
                            $(".designation_name").html(resp.designation_name);
                            $(".designation_level").html(resp.designation_level);

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

        $(".{{$class}}").validate({
            rules: {
                emp_code: {
                    required:true
                },
                business_unit_id: {
                    required:true
                },
                user_id: {
                    required:true
                },
                emp_designation: {
                    required:true
                },
                emp_level: {
                    required:true
                },
                emp_marital_status: {
                    required:true,
                },
                emp_doj: {
                    required:true,
                },
                emp_formality: {
                    required:true,
                },
                emp_dob: {
                    required:true,
                },
                emp_age: {
                    required:true,
                },
                emp_blood_group: {
                    required:true,
                },
                emp_blood_group: {
                    required:true,
                },
                emp_addr_one: {
                    required:true,
                },
                emp_addr_second: {
                    required:true,
                },
                emp_state: {
                    required:true,
                },
                emp_city: {
                    required:true,
                },
                emp_pincode: {
                    required:true,
                    minlength: 6,
                },
                emp_status: {
                    required:true,
                },
            },

            messages: {

                emp_code: {
                    required: "Please Enter Your  Employee Code",
                },
                business_unit_id: {
                    required: "Please Select Your Business Unit",
                },
                user_id: {
                    required: "Please Select Your  Employee",
                },
                emp_designation: {
                    required: "Please Select Your  Employee Designation",
                },
                emp_level: {
                    required: "Please Select Your  Employee Level",
                },
                emp_marital_status: {

                    required: "Please Select Employee Marital Status",
                },
                emp_doj: {

                    required: "Please Enter Employee Date of Joining",
                },
                emp_formality: {

                    required: "Please Enter Date Employee Formalities Completed On",
                },
                emp_dob: {

                    required: "Please Enter Date Employee Date Of Birth",
                },
                emp_age: {

                    required: "Please Enter Employee Age",
                },
                emp_blood_group: {

                    required: "Please Enter Employee Blood Group",
                },
                emp_addr_one: {

                    required: "Please Enter Employee Address 1",
                },
                emp_addr_second: {

                    required: "Please Enter Employee Address 2",
                },
                emp_state: {

                    required: "Please Select Employee State",
                },
                emp_city: {

                    required: "Please Select Employee City",
                },
                emp_pincode: {

                    required: "Please Enter Employee Pincode",
                },
                emp_status: {

                    required: "Please Select Employee Status",
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

        $('.date_of_join').datetimepicker({
            format: 'YYYY-MM-DD',
            maxDate: moment(),
        });
        

        $('.emp_formality').datetimepicker({
            format: 'YYYY-MM-DD',
            maxDate: moment()
        });

        $('.emp_dob').datetimepicker({
            format: 'YYYY-MM-DD',
            maxDate: moment()
        });
        
    })
</script>
    <script type="text/javascript">
        $(function(){

            <?php if(!empty($employee_edit)){ ?>
                var emp_formality = "{{$employee_edit->emp_formality}}";

                $(".emp_formality").val(emp_formality);

            <?php }else{ ?>

                $(".emp_formality").val("");
            <?php } ?>  

            <?php if(!empty($employee_edit)){ ?>

                var emp_dob = "{{$employee_edit->emp_dob}}";

                $(".emp_dob").val(emp_dob);

            <?php }else{ ?>

                $(".emp_dob").val("");
            <?php } ?> 

            <?php if(!empty($employee_edit)){ ?>

                var date_of_join = "{{$employee_edit->emp_doj}}";

                $(".date_of_join").val(date_of_join);

            <?php }else{ ?>

                $(".date_of_join").val("");

            <?php } ?>  

        })
    </script>
<script type="text/javascript">
    $(function(){

        $(".emp_dob").on("dp.change", function (e) {
            
            if(e.date != ''){

                var dob = new Date(e.date);
                var today = new Date();
                var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                $(".emp_age").val(age+' Years Old');
            }
        });
    })
</script>
<script type="text/javascript">
    
    $(function(){

        $(".emp_state").change(function(){

            var id =$(this).val();

            if(id != ''){
                $(".loader_fixed").show();
                $.ajax({

                    method: "GET",
                    url: "{{url('admin/india-cities')}}"+'/'+id,
                    success: function(resp){

                        if(resp != ''){
                            $(".loader_fixed").hide();
                            $(".emp_city").html(resp);

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
            }else if(id == ''){

                $(".emp_city").html("<option value=''>Select India State</option>");
            }
        })
    })
</script>
@if(!isset($employee_edit))
    <script type="text/javascript">
        $(function(){

            var id = $( ".emp_state option:selected" ).val();

            if(id != ''){
                $(".loader_fixed").show();
                $.ajax({

                    method: "GET",
                    url: "{{url('admin/india-cities')}}"+'/'+id,
                    success: function(resp){

                        if(resp != ''){
                            $(".loader_fixed").hide();
                            $(".emp_city").html(resp);

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