@extends('backEnd.layouts.master')

@section('content')
<?php

    if(isset($employee_personal_details_edit)){

        $url = url('admin/employee-personal-detail-edit/'.$employee_personal_details_edit->id);
        $title = "Edit";
        $class = "employee_edit";

    }else{
        $url = url('admin/employee-personal-detail-add');
        $title = "Create New";
        $class = "employee_add";
    }
 ?>
<div style="min-height: 600px;" class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>{{$title}} Employee Personal Detail</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{$title}} Employee Personal Detail</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form method="post" action="{{$url}}"  data-parsley-validate class="{{$class}}">
                            @csrf
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
                                     
                                   <select class="form-control employee_personal_details" name="user_id">
                                        <option value="">Select Your Employee</option>
                                        <?php if(!empty($user_unit)){
                                        ?>
                                        <option selected="selected"  value='{{$user_unit->id}}'><?php echo  ucfirst($user_unit->first_name).' '.ucfirst($user_unit->last_name)." ". "("." ".$user_unit->email." ".")"; ?></option>

                                        <?php } ?>
                                   </select>
                                </div>
                            </div>
                            <div class="item form-group employee_code_main_div">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="emp_ctc_appointment">Employee CTC Appointment <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 employee_code_div ">
                                    <input  type="text" class="form-control"  name="emp_ctc_appointment" value="{{isset($employee_personal_details_edit->emp_ctc_appointment) ? $employee_personal_details_edit->emp_ctc_appointment : '' }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Father Name</label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" class="form-control " name="emp_father_name" value="{{isset($employee_personal_details_edit->emp_father_name) ? $employee_personal_details_edit->emp_father_name : '' }}" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Father Date of Birth</label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" class="form-control emp_father_dob" name="emp_father_dob" value="{{isset($employee_personal_details_edit->emp_father_dob) ? $employee_personal_details_edit->emp_father_dob : '' }}" placeholder="YYYY-MM-DD">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Mother Name</label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" class="form-control " name="emp_mother_name" value="{{isset($employee_personal_details_edit->emp_mother_name) ? $employee_personal_details_edit->emp_mother_name : '' }}" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Mother Date of Birth</label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" class="form-control emp_mother_dob" name="emp_mother_dob" value="{{isset($employee_personal_details_edit->emp_mother_dob) ? $employee_personal_details_edit->emp_mother_dob : '' }}" placeholder="YYYY-MM-DD">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Is Employee Married ?</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control marital_status" name="marital_status">
                                        <option value="">Select Your Marital Status </option>
                                        <option <?php if(!empty($employee_personal_details_edit)) { if(!empty($employee_personal_details_edit->emp_spouse_name)){  echo "selected";} } ?> value="Yes">Yes</option>
                                        <option <?php if(!empty($employee_personal_details_edit)) { if(empty($employee_personal_details_edit->emp_spouse_name)){  echo "selected";} } ?> value="No">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row emp_spouse_name" style="display: none;">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Spouse Name</label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" class="form-control emp_spouse_name_input " name="emp_spouse_name" value="{{isset($employee_personal_details_edit->emp_spouse_name) ? $employee_personal_details_edit->emp_spouse_name : '' }}" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row emp_spouse_dob" style="display: none;">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Spouse Date of Birth</label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" class="form-control emp_spouse_dob" name="emp_spouse_dob" value="{{isset($employee_personal_details_edit->emp_spouse_dob) ? $employee_personal_details_edit->emp_spouse_dob : '' }}" placeholder="YYYY-MM-DD">
                                </div>
                            </div>
                            <div class="form-group row children_status" style="display: none;">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Does Employee Have Children ?</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control children_status_check " name="children_status">
                                        <option value="">Select Your Status</option>
                                        <option <?php if(!empty($employee_personal_details_edit)){ if(!empty($employee_personal_details_edit->emp_child_name)){ echo "selected";} } ?> value="Yes">Yes</option>
                                        <option <?php if(!empty($employee_personal_details_edit)){ if(empty($employee_personal_details_edit->emp_child_name)){ echo "selected";} } ?> value="No">No</option>
                                    </select>
                                </div>
                            </div>
                                
                                <?php if(!empty($employee_personal_details_edit->emp_child_name)){

                                    $children_names = explode(',', $employee_personal_details_edit->emp_child_name);
                                    $i = 1;
                                    foreach ($children_names as $key => $value) {
                                ?>
                                    <div class="form-group row emp_child_name appended_children_name" >
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Child Name {{$i}}</label>
                                        <div class="col-md-6 col-sm-6">
                                            <input type="text" class="form-control emp_child_name_input  " name="emp_child_name[<?php echo $key; ?>]" value="{{$value}}">
                                        </div>
                                        <?php if($key == 0){ ?>

                                            <div class="col-md-3 col-sm-3" >
                                                <button  type="button" class="btn btn-primary append_children_name" ><span style="font-weight: 900">&#43;</span></button>
                                            </div>

                                        <?php }else{ ?>

                                            <div class="col-md-3 col-sm-3" >
                                                <button  type="button" class="btn btn-primary delete_children_name" ><span style="font-weight: 900">&#8722;</span></button>
                                            </div>
                                       <?php  } ?>
                                    </div>
                            <?php $i++; $key++; } }else{ ?>

                                <div class="form-group row emp_child_name" style="display: none;" >
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Child Name 1</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" class="form-control" name="emp_child_name[0]" value="{{isset($employee_personal_details_edit->emp_child_name) ? $employee_personal_details_edit->emp_child_name : '' }}" placeholder="">
                                    </div>
                                    <div class="col-md-3 col-sm-3" >
                                        <button  type="button" class="btn btn-primary append_children_name" ><span style="font-weight: 900">&#43;</span></button>
                                    </div>

                                </div>
                            <?php } ?>
                            
                            <div class="append_children_name_div"></div>
                            
                            <?php if(!empty($employee_personal_details_edit->emp_child_dob)){

                                $children_dob = explode(',', $employee_personal_details_edit->emp_child_dob);
                                $i = 1;
                                foreach ($children_dob as $key => $value) {
                            ?>
                                <div class="form-group row emp_child_dob appended_children_dob" >
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Child Date Of Birth {{$i}}</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" class="form-control emp_child_dob_date_picker<?php echo $key ?> emp_child_dob_input" name="emp_child_dob[<?php echo $key; ?>]" value="" placeholder="YYYY-MM-DD">
                                    </div>
                                    <script type="text/javascript">
                                        $(function(){
                                            $('.emp_child_dob_date_picker<?php echo $key ?>').datetimepicker({
                                                format: 'YYYY-MM-DD',
                                            });
                                            $(".emp_child_dob_date_picker<?php echo $key ?>").val("{{$value}}");
                                        })
                                    </script>
                                    <?php if($key == 0){ ?>

                                        <div class="col-md-3 col-sm-3" >
                                            <button  type="button" class="btn btn-primary append_children_dob" ><span style="font-weight: 900">&#43;</span></button>
                                        </div>

                                    <?php }else{ ?>

                                        <div class="col-md-3 col-sm-3" >
                                            <button  type="button" class="btn btn-primary delete_children_dob" ><span style="font-weight: 900">&#8722;</span></button>
                                        </div>
                                   <?php  } ?>
                                </div>       
                            <?php $i++; $key++; } }else{ ?>

                                <div class="form-group row emp_child_dob" style="display: none;" >
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Child Date Of Birth 1</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" class="form-control emp_child_dob_date_picker " name="emp_child_dob[0]" value="{{isset($employee_personal_details_edit->emp_child_dob) ? $employee_personal_details_edit->emp_child_dob : '' }}" placeholder="YYYY-MM-DD">
                                    </div>
                                    <div class="col-md-3 col-sm-3" >
                                        <button  type="button" class="btn btn-primary append_children_dob" ><span style="font-weight: 900">&#43;</span></button>
                                    </div>
                                </div>

                            <?php } ?>
                            <div class="append_children_dob_div"></div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Emergency Contact Person Name</label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" class="form-control " name="emp_emer_con_person" value="{{isset($employee_personal_details_edit->emp_emer_con_person) ? $employee_personal_details_edit->emp_emer_con_person : '' }}" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Emergency Contact Number</label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" class="form-control " name="emp_emer_con_no" value="{{isset($employee_personal_details_edit->emp_emer_con_no) ? $employee_personal_details_edit->emp_emer_con_no : '' }}" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee 10th Qualification</label>
                                <div class="col-md-6 col-sm-6">
                                    <textarea class="form-control " name="emp_tenth_qualification" Placeholder="I Have Done  10th class From (College Name) and (Punjab School Education Board)" >{{isset($employee_personal_details_edit->emp_tenth_qualification) ? $employee_personal_details_edit->emp_tenth_qualification : '' }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee 12th Qualification</label>
                                <div class="col-md-6 col-sm-6">
                                    <textarea type="text" class="form-control " name="emp_twelve_qualification"  placeholder="I Have Done 12th class From (College Name) and (Punjab School Education Board)">{{isset($employee_personal_details_edit->emp_twelve_qualification) ? $employee_personal_details_edit->emp_twelve_qualification : '' }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Graduation Qualification</label>
                                <div class="col-md-6 col-sm-6">
                                    <textarea type="text" class="form-control " name="emp_graduation_qualification"  placeholder="I Have Done My (Graduation Name) From (College Name) and (Punjab Technical University)">{{isset($employee_personal_details_edit->emp_graduation_qualification) ? $employee_personal_details_edit->emp_graduation_qualification : '' }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Post Graduation Qualification</label>
                                <div class="col-md-6 col-sm-6">
                                    <textarea type="text" class="form-control " name="emp_post_graduation_qualification"  placeholder="I Have Done My (Post Graduation Name) From (College Name) and (Punjab Technical University)">{{isset($employee_personal_details_edit->emp_post_graduation_qualification) ? $employee_personal_details_edit->emp_post_graduation_qualification : '' }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Additional Qualification</label>
                                <div class="col-md-6 col-sm-6">
                                    <textarea type="text" class="form-control " name="emp_additional_qualification"  placeholder="PHP Training OR Any Other Trainings OR Diploma">{{isset($employee_personal_details_edit->emp_additional_qualification ) ? $employee_personal_details_edit->emp_additional_qualification  : '' }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Pancard No</label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" class="form-control " name="emp_pancard_no" value="{{isset($employee_personal_details_edit->emp_pancard_no) ? $employee_personal_details_edit->emp_pancard_no : '' }}" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Passport No</label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" class="form-control " name="emp_passport_no" value="{{isset($employee_personal_details_edit->emp_passport_no) ? $employee_personal_details_edit->emp_passport_no : '' }}" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Adhaar Card No</label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" class="form-control " name="emp_adhaar_card_no" value="{{isset($employee_personal_details_edit->emp_adhaar_card_no ) ? $employee_personal_details_edit->emp_adhaar_card_no  : '' }}" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Other Information</label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" class="form-control " name="emp_other_information" value="{{isset($employee_personal_details_edit->emp_other_information ) ? $employee_personal_details_edit->emp_other_information  : '' }}" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Status</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="status">
                                        <option value="">Select Employee Status</option>
                                        <option <?php if(!empty($employee_personal_details_edit->status)){ if($employee_personal_details_edit->status == 'Active'){ echo "selected";} } ?> value="Active">Active</option>
                                        <option <?php if(!empty($employee_personal_details_edit->status)){ if($employee_personal_details_edit->status == 'Inactive'){ echo "selected";} } ?> value="Inactive">Inactive</option>
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

        $(".business_unit").change(function(){

            var unit_id = $(this).val();

            if(unit_id != ''){
                $(".loader_fixed").show();
                $.ajax({
                    method: "get",
                    url: "{{url('admin/user-details-personal-details')}}"+'/'+unit_id,
                    success:function(resp){
                        $(".loader_fixed").hide();
                        $(".employee_personal_details").html(resp);
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

                $(".employee_personal_details").html("<option value=''>Select Your Employee</option>");
            }
        })
    })
</script>
@if(!isset($employee_personal_details_edit))
    <script type="text/javascript">
        $(function(){

            var id = $( ".business_unit option:selected" ).val();

            if(id != ''){
                $(".loader_fixed").show();
                $.ajax({

                    type: "GET",
                    url: "{{url('admin/user-details-personal-details')}}"+'/'+id,
                    success: function(resp){

                        if(resp != ''){
                            $(".loader_fixed").hide();
                            $(".employee_personal_details").html(resp);

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
                business_unit_id: {
                    required:true
                },
                user_id: {
                    required:true
                },
                emp_ctc_appointment : {
                    required:true,
                },
                emp_father_name: {
                    required:true
                },
                emp_father_dob: {
                    required:true
                },
                emp_mother_name: {
                    required:true,
                },
                emp_mother_dob: {
                    required:true,
                },
                marital_status: {
                    required:true,
                },
                emp_spouse_name: {
                    required:true,
                },
                emp_spouse_dob: {
                    required:true,
                },
                children_status: {
                    required:true,
                },
                "emp_child_name[0]": {
                    required:true,
                },
                "emp_child_dob[0]": {
                    required:true,
                },
                emp_emer_con_person: {
                    required:true,
                },
                emp_emer_con_no: {
                    required:true,
                },
                emp_tenth_qualification: {
                    required:true,
                },
                emp_twelve_qualification: {
                    required:true,
                },
                emp_twelve_qualification: {
                    required:true,
                },
                emp_graduation_qualification: {
                    required:true,
                },
                emp_post_graduation_qualification: {
                    required:true,
                },
                emp_additional_qualification: {
                    required:true,
                },
                emp_pancard_no: {
                    required:true,
                },
                emp_passport_no: {
                    required:true,
                },
                emp_adhaar_card_no: {
                    required:true,
                },
                emp_other_information: {
                    required:true,
                },
                status: {
                    required:true,
                },
            },
            messages: {

                business_unit_id: {
                    required: "Please Select Your Business Unit",
                },
                user_id: {
                    required: "Please Select Your  Employee",
                },
                emp_ctc_appointment : {

                    required: "Please Enter Employee CTC Appointment",
                },
                emp_father_name: {
                    required: "Please Enter Your  Employee Father Name",
                },
                emp_father_dob: {
                    required: "Please Enter Your  Employee Father Date of Birth",
                },
                emp_mother_name: {
                    required: "Please Enter Your  Employee Mother Name",
                },
                emp_mother_dob: {
                    required: "Please Enter Your  Employee Mother Date of Birth",
                },
                marital_status: {

                    required: "Please Select Employee Marital Status",
                },
                emp_spouse_name: {
                    required: "Please Enter Your  Employee Spouse Name",
                },
                emp_spouse_dob: {
                    required: "Please Enter Your  Employee Spouse Date of Birth",
                },
                children_status: {

                    required: "Please Select Employee Children Status",
                },
                "emp_child_name[0]": {

                    required: "Please Select Employee Child Name 1",
                },
                "emp_child_dob[0]": {

                    required: "Please Select Employee Child Date Of Birth 1",
                },
                emp_emer_con_person: {
                    required: "Please Enter Your  Employee Emergency Contact Person Name",
                },
                emp_emer_con_no: {
                    required: "Please Enter Your  Employee Emergency Contact Number",
                },
                emp_tenth_qualification: {
                    required: "Please Enter Your  Employee 10th Qualification",
                },
                emp_twelve_qualification: {
                    required: "Please Enter Your  Employee 12th Qualification",
                },
                emp_graduation_qualification: {
                    required: "Please Enter Your  Employee Graduation Qualification",
                },
                emp_post_graduation_qualification: {
                    required: "Please Enter Your  Employee Post Graduation Qualification",
                },
                emp_additional_qualification: {
                    required: "Please Enter Your  Employee Additional Qualification",
                },
                emp_pancard_no: {
                    required: "Please Enter Your  Employee Pancard No",
                },
                emp_passport_no: {
                    required: "Please Enter Your  Employee Passport No",
                },
                emp_adhaar_card_no: {
                    required: "Please Enter Your  Employee Adhaar Card No",
                },
                emp_other_information: {
                    required: "Please Enter Your  Employee Other Information",
                },
                status: {

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

        $('.emp_father_dob').datetimepicker({
            format: 'YYYY-MM-DD',
            maxDate: moment(),
        });
        

        $('.emp_mother_dob').datetimepicker({
            format: 'YYYY-MM-DD',
            maxDate: moment()
        });

        $('.emp_spouse_dob').datetimepicker({
            format: 'YYYY-MM-DD',
            maxDate: moment()
        });
        $('.emp_child_dob_date_picker').datetimepicker({
            format: 'YYYY-MM-DD',
            maxDate: moment()
        });
        
    })
</script>
<script type="text/javascript">
    $(function(){

        <?php if(!empty($employee_personal_details_edit)){ ?>

            var emp_father_dob = "{{$employee_personal_details_edit->emp_father_dob}}";

            $(".emp_father_dob").val(emp_father_dob);

        <?php }else{ ?>

            $(".emp_father_dob").val("");

        <?php } ?> 

        <?php if(!empty($employee_personal_details_edit)){ ?>
            var emp_mother_dob = "{{$employee_personal_details_edit->emp_mother_dob}}";

            $(".emp_mother_dob").val(emp_mother_dob);

        <?php }else{ ?>

            $(".emp_mother_dob").val("");
        <?php } ?>  


        <?php if(!empty($employee_personal_details_edit)){ ?>

            var emp_spouse_dob = "{{$employee_personal_details_edit->emp_spouse_dob}}";

            $(".emp_spouse_dob").val(emp_spouse_dob);

        <?php }else{ ?>

            $(".emp_spouse_dob").val("");
        <?php } ?> 


        $(".emp_child_dob_date_picker").val("");

    })
</script>
<script type="text/javascript">
    $(function(){

        var value = $( ".marital_status option:selected" ).val();

        if(value == "Yes"){
            $(".children_status").show();
            $(".emp_spouse_name").show();
            $(".emp_spouse_dob").show();
        }
    })
</script>
<script type="text/javascript">
    $(function(){

        var value = $( ".children_status_check option:selected" ).val();

        if(value == "Yes"){
            $(".emp_child_name").show();
            $(".emp_child_dob").show();
        }
    })
</script>
<script type="text/javascript">
    $(function(){

        $(".marital_status").change(function(){

            var status = $(this).val();

            if(status == 'Yes'){

                $(".children_status").show();
                $(".emp_spouse_name").show();
                $(".emp_spouse_dob").show();

            }else if(status == 'No'){

                $(".children_status").hide();
                $(".emp_spouse_name").hide();
                $(".emp_spouse_dob").hide();
                $(".emp_child_name").hide();
                $(".emp_child_dob").hide();
                $(".append_children_name_div").empty();
                $(".append_children_dob_div").empty();
                $(".children_status_check").val('');
                $(".emp_spouse_name_input").val("");
                $(".emp_spouse_dob").val("");
                $('.emp_child_name_input').each(function () {
                    var value = $(this).removeAttr('value');

                });

                var index = 0;
                $('.emp_child_dob_date_picker'+index).each(function () {
                    var value = $(this).val("");
                    index++;

                });

            }else if(status == ''){

                $(".children_status").hide();
                $(".emp_spouse_name").hide();
                $(".emp_spouse_dob").hide();
                $(".emp_child_name").hide();
                $(".emp_child_dob").hide();
                $(".append_children_name_div").empty();
                $(".append_children_dob_div").empty();
                $(".children_status_check").val('');
            }
        })
    })
</script>
<script type="text/javascript">
    $(function(){

        $(".children_status_check").change(function(){

            var status = $(this).val();

            if(status == 'Yes'){

                $(".emp_child_name").show();
                $(".emp_child_dob").show();

            }else if(status == 'No'){

                $(".emp_child_name").hide();
                $(".emp_child_dob").hide();
                $(".append_children_name_div").empty();
                $(".append_children_dob_div").empty();
                $('.emp_child_name_input').each(function () {
                    var value = $(this).removeAttr('value');

                });

                var index = 0;
                $('.emp_child_dob_date_picker'+index).each(function () {
                    var value = $(this).val("");
                    index++;

                });


            }else if(status == ''){

                $(".emp_child_name").hide();
                $(".emp_child_dob").hide();
                $(".append_children_name_div").empty();
                $(".append_children_dob_div").empty();
            }
        })
    })
</script>
<script type="text/javascript">
    $(function(){
        
        <?php if(!empty($employee_personal_details_edit->emp_child_name)){ ?>

            var index =    $(".appended_children_name").length;
            var i =    $(".appended_children_name").length;
            i = i+1;
        <?php }else{ ?>

            var index = 1;
            var i = 2;
       <?php } ?>
        $(document).on('click','.append_children_name',function(){

            
            $(".append_children_name_div").append('<div class="form-group row appended_children_name" ><label class="col-form-label col-md-3 col-sm-3 label-align">Employee Child Name '+i+'</label><div class="col-md-6 col-sm-6"><input type="text" class="form-control" name="emp_child_name['+index+']" value="{{isset($employee_edit->emp_child_name) ? $employee_edit->emp_child_name : '' }}" placeholder=""></div><div class="col-md-3 col-sm-3" ><button  type="button" class="btn btn-primary delete_children_name" ><span style="font-weight: 900">&#8722;</span></button></div></div>');
            
            $('input[name="emp_child_name['+index+']"]').rules("add", {
                required: true,
                messages: {
                    required: "Please Enter Employee Child Name "+i+""
                }
            });
            index++;
            i++;
        })

        $(document).on('click','.delete_children_name',function(){

            $(".appended_children_name").last().remove();
            i--;
            index--;

        })
    })
</script>

<script type="text/javascript">
    $(function(){
        
        <?php if(!empty($employee_personal_details_edit->emp_child_dob)){ ?>

            var index =    $(".appended_children_dob").length;
            var i =    $(".appended_children_dob").length;
            i = i+1;
        <?php }else{ ?>

            var index = 1;
            var i = 2;
       <?php } ?>
        $(document).on('click','.append_children_dob',function(){

            
            $(".append_children_dob_div").append('<div class="form-group row appended_children_dob" ><label class="col-form-label col-md-3 col-sm-3 label-align">Employee Children Date Of Birth '+i+'</label><div class="col-md-6 col-sm-6"><input type="text" class="form-control emp_child_dob_date_picker'+index+' " name="emp_child_dob['+index+']" value="{{isset($employee_edit->emp_child_dob) ? $employee_edit->emp_child_dob : '' }}" placeholder="YYYY-MM-DD"></div><div class="col-md-3 col-sm-3" ><button  type="button" class="btn btn-primary delete_children_dob" ><span style="font-weight: 900">&#8722;</span></button></div></div>');

            $('input[name="emp_child_dob['+index+']"]').rules("add", {
                required: true,
                messages: {
                    required: "Please Enter Employee Child Date Of Birth "+i+""
                }
            });
            $('.emp_child_dob_date_picker'+index).datetimepicker({
                format: 'YYYY-MM-DD',
                maxDate: moment()
            });
            $('.emp_child_dob_date_picker'+index).val("");
            index++;
            i++;
        })

        $(document).on('click','.delete_children_dob',function(){

            $(".appended_children_dob").last().remove();
            i--;
            index--;

        })
    })
</script>
<script type="text/javascript">
    $(function(){
        var index = 1;
        var i = 2;
        $('.emp_child_dob_date_picker').each(function () {
            $('input[name="emp_child_dob['+index+']"]').rules("add", {
                required: true,
                messages: {
                    required: "Please Enter Employee Child Date Of Birth "+i+""
                }
            });
            i++
            index++;
        });
    })
</script>
<script type="text/javascript">
    $(function(){
        var index = 1;
        var i = 2;
        $('.emp_child_dob_input').each(function () {
            $('input[name="emp_child_dob['+index+']"]').rules("add", {
                required: true,
                messages: {
                    required: "Please Enter Employee Child Date Of Birth "+i+""
                }
            });
            i++
            index++;
        });
    })
</script>
<script type="text/javascript">
    $(function(){
        var index = 1;
        var i = 2;
        $('.emp_child_name_input').each(function () {
            $('input[name="emp_child_name['+index+']"]').rules("add", {
                required: true,
                messages: {
                    required: "Please Enter Employee Child Name "+i+""
                }
            });
            i++
            index++;
        });
    })
</script>

@endsection