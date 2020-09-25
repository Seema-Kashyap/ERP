@extends('backEnd.layouts.master')

@section('content')
<div style="min-height: 600px;" class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Employee Details</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Employee Details</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <fieldset>
                            <legend>Your Employee Details</legend> 
                            @if(!empty($employee_edit))
                                <form method="post" action=""  data-parsley-validate class="employee_details_validation">
                                    @csrf
                                    <div class="item form-group employee_code_main_div">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="emp_code">Employee Code <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 employee_code_div  ">
                                             <input disabled="" type="text" class="form-control employee_code " name="" value="{{isset($employee_edit->emp_code) ?  $employee_edit->emp_code : 'NA' }}">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Designation Name<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                             
                                           <select class="form-control designation_name" name="" disabled="">
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
                                            <select disabled="" class="form-control designation_level" name="">
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
                                            <select disabled="" class="form-control enable_employee_details" name="emp_marital_status">
                                                <option value="">Select Employee Marital Status</option>
                                                <option <?php if(!empty($employee_edit->emp_marital_status)){ if($employee_edit->emp_marital_status == 'married'){ echo "selected";} } ?> value="married">Married</option>
                                                <option <?php if(!empty($employee_edit->emp_marital_status)){ if($employee_edit->emp_marital_status == 'unmarried'){ echo "selected";} } ?> value="unmarried">Unmarried</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Date of Joining</label>
                                        <div class="col-md-6 col-sm-6">
                                            <input disabled="" type="text" class="form-control date_of_join enable_employee_details " name="emp_doj" value="{{isset($employee_edit->emp_doj) ? $employee_edit->emp_doj : '' }}" placeholder="YYYY-MM-DD">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Formalities Completed On</label>
                                        <div class="col-md-6 col-sm-6 ">
                                             <input disabled="" type="text" class="form-control emp_formality enable_employee_details " name="emp_formality" value="{{isset($employee_edit->emp_formality) ? $employee_edit->emp_formality : '' }}" placeholder="YYYY-MM-DD">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Date of Birth</label>
                                        <div class="col-md-6 col-sm-6 ">
                                             <input disabled="" type="text" class="form-control emp_dob enable_employee_details" name="emp_dob" value="{{isset($employee_edit->emp_dob) ? $employee_edit->emp_dob : '' }}" placeholder="YYYY-MM-DD">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Age</label>
                                        <div class="col-md-6 col-sm-6 ">
                                             <input disabled="" type="text" class="form-control emp_age enable_employee_details " name="emp_age" value="{{isset($employee_edit->emp_age) ? $employee_edit->emp_age : '' }}" placeholder="30 Years Old">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Blood Group</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select disabled="" class="form-control enable_employee_details" name="emp_blood_group">
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
                                             <textarea disabled="" class="form-control enable_employee_details" name="emp_addr_one">{{isset($employee_edit->emp_addr_one) ? $employee_edit->emp_addr_one : '' }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Address 2</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <textarea disabled="" class="form-control enable_employee_details" name="emp_addr_second">{{isset($employee_edit->emp_addr_second) ? $employee_edit->emp_addr_second : '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Employee State</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select disabled="" class="form-control emp_state enable_employee_details" name="emp_state">
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
                                             
                                           <select disabled="" class="form-control emp_city enable_employee_details" name="emp_city">
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
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="emp_code">Employee Pincode<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 employee_code_div ">
                                             <input disabled="" data-max="6" type="number" class="form-control enable_employee_details" name="emp_pincode" value="{{isset($employee_edit->emp_pincode) ? $employee_edit->emp_pincode : '' }}">
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                            <button type="button" class="btn btn-success edit_employee_details">Edit</button>
                                            <button disabled="" class="btn btn-primary cancel_employee_details" type="reset" type="">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <p style="padding:20px 0px; text-align:center; font-weight:bold; font-size:25px;">No Employee Details Found</p>
                            @endif
                        </fieldset>
                        <fieldset style="margin-top: 20px">
                            <legend>Your Employee Personal Details</legend> 
                            @if(!empty($employee_personal_details_edit))
                                <form method="post" action=""  data-parsley-validate class="employee_personal_details_validation">
                                    @csrf
                                    <div class="item form-group employee_code_main_div">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="emp_ctc_appointment">Employee CTC Appointment <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 employee_code_div ">
                                            <input disabled=""  type="text" class="form-control enable_employee_personal_details"  name="emp_ctc_appointment" value="{{isset($employee_personal_details_edit->emp_ctc_appointment) ? $employee_personal_details_edit->emp_ctc_appointment : '' }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Father Name</label>
                                        <div class="col-md-6 col-sm-6">
                                            <input disabled="" type="text" class="form-control enable_employee_personal_details " name="emp_father_name" value="{{isset($employee_personal_details_edit->emp_father_name) ? $employee_personal_details_edit->emp_father_name : '' }}" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Father Date of Birth</label>
                                        <div class="col-md-6 col-sm-6">
                                            <input disabled="" type="text" class="form-control emp_father_dob enable_employee_personal_details" name="emp_father_dob" value="{{isset($employee_personal_details_edit->emp_father_dob) ? $employee_personal_details_edit->emp_father_dob : '' }}" placeholder="YYYY-MM-DD">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Mother Name</label>
                                        <div class="col-md-6 col-sm-6">
                                            <input disabled="" type="text" class="form-control enable_employee_personal_details " name="emp_mother_name" value="{{isset($employee_personal_details_edit->emp_mother_name) ? $employee_personal_details_edit->emp_mother_name : '' }}" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Mother Date of Birth</label>
                                        <div class="col-md-6 col-sm-6">
                                            <input disabled="" type="text" class="form-control emp_mother_dob enable_employee_personal_details" name="emp_mother_dob" value="{{isset($employee_personal_details_edit->emp_mother_dob) ? $employee_personal_details_edit->emp_mother_dob : '' }}" placeholder="YYYY-MM-DD">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Is Employee Married ?</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select disabled="" class="form-control marital_status enable_employee_personal_details" name="marital_status">
                                                <option value="">Select Your Marital Status </option>
                                                <option <?php if(!empty($employee_personal_details_edit)) { if(!empty($employee_personal_details_edit->emp_spouse_name)){  echo "selected";} } ?> value="Yes">Yes</option>
                                                <option <?php if(!empty($employee_personal_details_edit)) { if(empty($employee_personal_details_edit->emp_spouse_name)){  echo "selected";} } ?> value="No">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row emp_spouse_name" style="display: none;">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Spouse Name</label>
                                        <div class="col-md-6 col-sm-6">
                                            <input disabled="" type="text" class="form-control emp_spouse_name_input enable_employee_personal_details " name="emp_spouse_name" value="{{isset($employee_personal_details_edit->emp_spouse_name) ? $employee_personal_details_edit->emp_spouse_name : '' }}" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row emp_spouse_dob" style="display: none;">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Spouse Date of Birth</label>
                                        <div class="col-md-6 col-sm-6">
                                            <input disabled="" type="text" class="form-control emp_spouse_dob enable_employee_personal_details" name="emp_spouse_dob" value="{{isset($employee_personal_details_edit->emp_spouse_dob) ? $employee_personal_details_edit->emp_spouse_dob : '' }}" placeholder="YYYY-MM-DD">
                                        </div>
                                    </div>
                                    <div class="form-group row children_status" style="display: none;">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Does Employee Have Children ?</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select disabled="" class="form-control children_status_check enable_employee_personal_details " name="children_status">
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
                                                    <input disabled="" type="text" class="form-control emp_child_name_input enable_employee_personal_details" name="emp_child_name[<?php echo $key; ?>]" value="{{$value}}">
                                                </div>
                                                <?php if($key == 0){ ?>

                                                    <div class="col-md-3 col-sm-3" >
                                                        <button disabled=""  type="button" class="btn btn-primary append_children_name enable_employee_personal_details" ><span style="font-weight: 900">&#43;</span></button>
                                                    </div>

                                                <?php }else{ ?>

                                                    <div class="col-md-3 col-sm-3" >
                                                        <button disabled=""  type="button" class="btn btn-primary delete_children_name enable_employee_personal_details" ><span style="font-weight: 900">&#8722;</span></button>
                                                    </div>
                                               <?php  } ?>
                                            </div>
                                    <?php $i++; $key++; } }else{ ?>

                                        <div class="form-group row emp_child_name" style="display: none;" >
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Child Name 1</label>
                                            <div class="col-md-6 col-sm-6">
                                                <input disabled="" type="text" class="form-control enable_employee_personal_details" name="emp_child_name[0]" value="{{isset($employee_personal_details_edit->emp_child_name) ? $employee_personal_details_edit->emp_child_name : '' }}" placeholder="">
                                            </div>
                                            <div class="col-md-3 col-sm-3" >
                                                <button disabled=""  type="button" class="btn btn-primary append_children_name enable_employee_personal_details" ><span style="font-weight: 900">&#43;</span></button>
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
                                                <input disabled="" type="text" class="form-control emp_child_dob_date_picker<?php echo $key ?> emp_child_dob_input enable_employee_personal_details" name="emp_child_dob[<?php echo $key; ?>]" value="" placeholder="YYYY-MM-DD">
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
                                                    <button disabled=""  type="button" class="btn btn-primary append_children_dob enable_employee_personal_details" ><span style="font-weight: 900">&#43;</span></button>
                                                </div>

                                            <?php }else{ ?>

                                                <div class="col-md-3 col-sm-3" >
                                                    <button disabled=""  type="button" class="btn btn-primary delete_children_dob enable_employee_personal_details" ><span style="font-weight: 900">&#8722;</span></button>
                                                </div>
                                           <?php  } ?>
                                        </div>       
                                    <?php $i++; $key++; } }else{ ?>

                                        <div class="form-group row emp_child_dob" style="display: none;" >
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Child Date Of Birth 1</label>
                                            <div class="col-md-6 col-sm-6">
                                                <input disabled="" type="text" class="form-control emp_child_dob_date_picker enable_employee_personal_details " name="emp_child_dob[0]" value="{{isset($employee_personal_details_edit->emp_child_dob) ? $employee_personal_details_edit->emp_child_dob : '' }}" placeholder="YYYY-MM-DD">
                                            </div>
                                            <div class="col-md-3 col-sm-3" >
                                                <button disabled=""  type="button" class="btn btn-primary append_children_dob enable_employee_personal_details" ><span style="font-weight: 900">&#43;</span></button>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="append_children_dob_div"></div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Emergency Contact Person Name</label>
                                        <div class="col-md-6 col-sm-6">
                                            <input disabled="" type="text" class="form-control enable_employee_personal_details " name="emp_emer_con_person" value="{{isset($employee_personal_details_edit->emp_emer_con_person) ? $employee_personal_details_edit->emp_emer_con_person : '' }}" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Emergency Contact Number</label>
                                        <div class="col-md-6 col-sm-6">
                                            <input disabled="" type="text" class="form-control enable_employee_personal_details " name="emp_emer_con_no" value="{{isset($employee_personal_details_edit->emp_emer_con_no) ? $employee_personal_details_edit->emp_emer_con_no : '' }}" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Employee 10th Qualification</label>
                                        <div class="col-md-6 col-sm-6">
                                            <textarea disabled="" class="form-control enable_employee_personal_details " name="emp_tenth_qualification" Placeholder="I Have Done  10th class From (College Name) and (Punjab School Education Board)" >{{isset($employee_personal_details_edit->emp_tenth_qualification) ? $employee_personal_details_edit->emp_tenth_qualification : '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Employee 12th Qualification</label>
                                        <div class="col-md-6 col-sm-6">
                                            <textarea disabled="" type="text" class="form-control enable_employee_personal_details " name="emp_twelve_qualification"  placeholder="I Have Done 12th class From (College Name) and (Punjab School Education Board)">{{isset($employee_personal_details_edit->emp_twelve_qualification) ? $employee_personal_details_edit->emp_twelve_qualification : '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Graduation Qualification</label>
                                        <div class="col-md-6 col-sm-6">
                                            <textarea disabled="" type="text" class="form-control enable_employee_personal_details " name="emp_graduation_qualification"  placeholder="I Have Done My (Graduation Name) From (College Name) and (Punjab Technical University)">{{isset($employee_personal_details_edit->emp_graduation_qualification) ? $employee_personal_details_edit->emp_graduation_qualification : '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Post Graduation Qualification</label>
                                        <div class="col-md-6 col-sm-6">
                                            <textarea disabled="" type="text" class="form-control enable_employee_personal_details " name="emp_post_graduation_qualification"  placeholder="I Have Done My (Post Graduation Name) From (College Name) and (Punjab Technical University)">{{isset($employee_personal_details_edit->emp_post_graduation_qualification) ? $employee_personal_details_edit->emp_post_graduation_qualification : '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Additional Qualification</label>
                                        <div class="col-md-6 col-sm-6">
                                            <textarea disabled="" type="text" class="form-control enable_employee_personal_details " name="emp_additional_qualification"  placeholder="PHP Training OR Any Other Trainings OR Diploma">{{isset($employee_personal_details_edit->emp_additional_qualification ) ? $employee_personal_details_edit->emp_additional_qualification  : '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Pancard No</label>
                                        <div class="col-md-6 col-sm-6">
                                            <input disabled="" type="text" class="form-control enable_employee_personal_details " name="emp_pancard_no" value="{{isset($employee_personal_details_edit->emp_pancard_no) ? $employee_personal_details_edit->emp_pancard_no : '' }}" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Passport No</label>
                                        <div class="col-md-6 col-sm-6">
                                            <input disabled="" type="text" class="form-control enable_employee_personal_details " name="emp_passport_no" value="{{isset($employee_personal_details_edit->emp_passport_no) ? $employee_personal_details_edit->emp_passport_no : '' }}" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Adhaar Card No</label>
                                        <div class="col-md-6 col-sm-6">
                                            <input disabled="" type="text" class="form-control enable_employee_personal_details " name="emp_adhaar_card_no" value="{{isset($employee_personal_details_edit->emp_adhaar_card_no ) ? $employee_personal_details_edit->emp_adhaar_card_no  : '' }}" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Other Information</label>
                                        <div class="col-md-6 col-sm-6">
                                            <input disabled="" type="text" class="form-control enable_employee_personal_details " name="emp_other_information" value="{{isset($employee_personal_details_edit->emp_other_information ) ? $employee_personal_details_edit->emp_other_information  : '' }}" placeholder="">
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                            <button type="button" class="btn btn-success edit_employee_personal_details">Edit</button>
                                            <button disabled="" class="btn btn-primary cancel_employee_personal_details" type="reset" type="">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <p style="padding:20px 0px; text-align:center; font-weight:bold; font-size:25px;">No Employee Personal Details Found</p>
                            @endif
                        </fieldset>
                        <fieldset style="margin-top: 20px">
                            <legend>Your Employee Document Details</legend> 
                            @if(!empty($employee_documents_edit))
                                <form method="post" action=""  data-parsley-validate class="employee_documents_validation" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Passport Size Images Preview</label>
                                        <div class="col-md-6 col-sm-6 mb-50 ">
                                            <div class="col-sm-12 col-md-12 passport_size_images " style="padding: 0; border: 1px solid #ced4da">

                                                <?php if(!empty($employee_documents_edit->emp_img)){

                                                    $passport_size_images = explode(",",$employee_documents_edit->emp_img);

                                                    foreach ($passport_size_images as $key => $value) {
                                                ?>
                                                <a href="{{employeePassportImagePath.'/'.$value}}">
                                                    <img src="{{employeePassportImagePath.'/'.$value}}" width="40%" height="100%">
                                                </a>

                                                <?php } }else{ ?>
                                                    <img style="display: block !important; margin:0 auto !important" src="{{DefaultImgPath}}" width="40%" height="100%" id="old_images_passport"  alt="No image"  >
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Passport Size Images Upload</label>
                                        <div class="col-md-6 col-sm-6 mb-3">
                                            <input disabled="" type="file" class="form-control img_upload_passport_images enable_documents_details" name="passport_size_images[]" multiple accept=".jpg, .jpeg, .png" />
                                        </div>
                                    </div>
                                    <?php 
                                        if(!empty($employee_documents_edit->emp_pan_card)) {

                                            $image = employeePancardImageBasePath.'/'.$employee_documents_edit->emp_pan_card;
                                        }else{
                                            $image = DefaultImgPath;
                                        }
                                    ?>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Pan Card Image Preview</label>
                                        <div class="col-md-6 col-sm-6 mb-50">
                                            <div class="col-sm-12 pan_card_div " style="padding: 0; border: 1px solid #ced4da;text-align: center;">
                                                <a href="{{url($image)}}">
                                                    
                                                    <img src="{{url($image)}}" width="40%" height="100%" id="old_image_pan_card"  alt="No image"  >
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Pan Card Image Upload</label>
                                        <div class="col-md-6 col-sm-6 mb-3">
                                            <input disabled="" type="file" class="form-control img_upload_pan_card enable_documents_details" name="pan_card_image" accept=".jpg, .jpeg, .png">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Passport Images Preview</label>
                                        <div class="col-md-6 col-sm-6 mb-50 ">
                                            <div class="col-sm-12 col-md-12 id_proof_passport_images" style="padding: 0; border: 1px solid #ced4da">

                                                <?php if(!empty($employee_documents_edit->emp_passport)){

                                                    $passport_images = explode(",",$employee_documents_edit->emp_passport);

                                                    foreach ($passport_images as $key => $value) {
                                                ?>
                                                <a href="{{employeePassportImagesPath.'/'.$value}}">
                                                    <img src="{{employeePassportImagesPath.'/'.$value}}" width="40%" height="100%">
                                                </a>

                                                <?php } }else{ ?>
                                                    <img style="display: block !important; margin:0 auto !important;" src="{{DefaultImgPath}}" width="40%" height="100%" id="id_proof_old_passport_images"  alt="No image"  >
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Passport Images Upload (Optional)</label>
                                        <div class="col-md-6 col-sm-6 mb-3">
                                            <input disabled="" type="file" class="form-control passport_images_file_upload" name="passport_images[]" multiple accept=".jpg, .jpeg, .png" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Aadhaar Card Images Preview</label>
                                        <div class="col-md-6 col-sm-6 mb-50 ">
                                            <div class="col-sm-12 col-md-12 id_proof_aadhaar_card_images light_gallery " style="padding: 0; border: 1px solid #ced4da">
                                                <?php if(!empty($employee_documents_edit->emp_aadhaar_card)){

                                                    $aadhaar_card_images = explode(",",$employee_documents_edit->emp_aadhaar_card);

                                                    foreach ($aadhaar_card_images as $key => $value) {
                                                ?>
                                                <a href="{{employeeAadhaarCardImagesPath.'/'.$value}}">
                                                    <img src="{{employeeAadhaarCardImagesPath.'/'.$value}}" width="40%" height="100%">
                                                </a>

                                                <?php } }else{ ?>
                                                    <img style="display: block !important; margin:0 auto !important;" src="{{DefaultImgPath}}" width="40%" height="100%" id="id_proof_old_aadhaar_card_images"  alt="No image"  >
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Aadhaar Card Images Upload</label>
                                        <div class="col-md-6 col-sm-6 mb-3">
                                            <input disabled="" type="file" class="form-control aadhaar_card_images_file_upload enable_documents_details" name="aadhaar_card_images[]" multiple accept=".jpg, .jpeg, .png" />
                                        </div>
                                    </div>
                                    <?php 
                                        if(!empty($employee_documents_edit->emp_tenth_qualification_img)) {

                                            $image = tenthQualificationImagePath.'/'.$employee_documents_edit->emp_tenth_qualification_img;
                                        }else{
                                            $image = DefaultImgPath;
                                        }
                                    ?>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Tenth Qualification Image Preview</label>
                                        <div class="col-md-6 col-sm-6 mb-50">
                                            <div class="col-sm-12 tenth_div" style="padding: 0; border: 1px solid #ced4da;text-align: center; ">
                                                <a href="{{url($image)}}">
                                                    <img src="{{$image}}" width="40%" height="100%" id="old_image_tenth"  alt="No image">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Tenth Qualification Image Upload</label>
                                        <div class="col-md-6 col-sm-6 mb-3 ">
                                            <input disabled="" type="file" class="form-control img_upload_tenth enable_documents_details" name="tenth_image" accept=".jpg, .jpeg, .png">
                                        </div>
                                    </div> 
                                    <?php 
                                        if(!empty($employee_documents_edit->emp_twelve_qualification_img)) {

                                            $image = twelveQualificationImagePath.'/'.$employee_documents_edit->emp_twelve_qualification_img;
                                        }else{
                                            $image = DefaultImgPath;
                                        }
                                    ?>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">12th Qualification Image Preview</label>
                                        <div class="col-md-6 col-sm-6 mb-50">
                                            <div class="col-sm-12 twelve_div" style="padding: 0; border: 1px solid #ced4da;text-align: center;">
                                                <a href="{{url($image)}}">
                                                    <img src="{{$image}}" width="40%" height="100%" id="old_image_twelve"  alt="No image">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">12th Qualification Image Upload</label>
                                        <div class="col-md-6 col-sm-6 mb-3">
                                            <input disabled="" type="file" class="form-control img_upload_twelve enable_documents_details" name="twelve_image" accept=".jpg, .jpeg, .png">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Other Qualification Images Preview</label>
                                        <div class="col-md-6 col-sm-6 mb-50 ">
                                            <div class="col-sm-12 col-md-12 other_qualification_img " style="padding: 0; border: 1px solid #ced4da">
                                                <?php if(!empty($employee_documents_edit->emp_other_qualification_img)){

                                                    $emp_other_qualification_img = explode(",",$employee_documents_edit->emp_other_qualification_img);

                                                    foreach ($emp_other_qualification_img as $key => $value) {
                                                ?>
                                                <a href="{{otherQualificationImagePath.'/'.$value}}">
                                                    <img src="{{otherQualificationImagePath.'/'.$value}}" width="40%" height="100%">
                                                </a>

                                                <?php } }else{ ?>
                                                    <img style="display: block !important; margin:0 auto !important;" src="{{DefaultImgPath}}" width="40%" height="100%" id="id_proof_other_qualification_img"  alt="No image">
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Other Qualification Images Upload (Optional)</label>
                                        <div class="col-md-6 col-sm-6 mb-3">
                                            <input disabled="" type="file" class="form-control img_upload_other_qualification_img enable_documents_details" name="other_qualification_img[]" multiple accept=".jpg, .jpeg, .png" />
                                        </div>
                                    </div> 
                                    <?php 
                                        if(!empty($employee_documents_edit->emp_graduation_img)) {

                                            $image = graduationImagePath.'/'.$employee_documents_edit->emp_graduation_img;
                                        }else{
                                            $image = DefaultImgPath;
                                        }
                                    ?>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Graduation Image Preview</label>
                                        <div class="col-md-6 col-sm-6 mb-50">
                                            <div class="col-sm-12 graduation_div" style="padding: 0; border: 1px solid #ced4da;text-align: center;">
                                                <a href="{{url($image)}}">
                                                    <img src="{{$image}}" width="40%" height="100%" id="old_image_graduation"  alt="No image"  >
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Graduation Image Upload</label>
                                        <div class="col-md-6 col-sm-6 mb-3">
                                            <input disabled="" type="file" class="form-control img_upload_graduation enable_documents_details" name="graduation_image" accept=".jpg, .jpeg, .png">
                                        </div>
                                    </div>
                                    <?php 
                                        if(!empty($employee_documents_edit->emp_post_graduation_img)) {

                                            $image = postGraduationImagePath.'/'.$employee_documents_edit->emp_post_graduation_img;
                                        }else{
                                            $image = DefaultImgPath;
                                        }
                                    ?>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Post Graduation Image Preview</label>
                                        <div class="col-md-6 col-sm-6 mb-50">
                                            <div class="col-sm-12 post_graduation_div" style="padding: 0; border: 1px solid #ced4da;text-align: center;">
                                                <a href="{{url($image)}}">
                                                    <img src="{{$image}}" width="40%" height="100%" id="old_image_post_graduation"  alt="No image">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Post Graduation Image Upload (Optional)</label>
                                        <div class="col-md-6 col-sm-6 mb-3">
                                            <input disabled="" type="file" class="form-control img_upload_post_graduation enable_documents_details" name="post_graduation_image" accept=".jpg, .jpeg, .png">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Other Documents Images Preview</label>
                                        <div class="col-md-6 col-sm-6 mb-50 ">
                                            <div class="col-sm-12 col-md-12 other_documents_img " style="padding: 0; border: 1px solid #ced4da">
                                                <?php if(!empty($employee_documents_edit->emp_other)){

                                                    $emp_other = explode(",",$employee_documents_edit->emp_other);

                                                    foreach ($emp_other as $key => $value) {
                                                ?>
                                                    <a href="{{otherDocumentsImagePath.'/'.$value}}">
                                                        <img src="{{otherDocumentsImagePath.'/'.$value}}" width="40%" height="100%">
                                                    </a>

                                                <?php } }else{ ?>

                                                    <a href="{{url($image)}}">
                                                        <img style="display: block !important; margin:0 auto !important;" src="{{$image}}" width="40%" height="100%" id="id_proof_other_documents_img"  alt="No image"  >
                                                    </a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Other Documents Images Upload (Optional)</label>
                                        <div class="col-md-6 col-sm-6 mb-3">
                                            <input disabled="" type="file" class="form-control img_upload_other_documents_img enable_documents_details" name="other_documents[]" multiple accept=".jpg, .jpeg, .png" />
                                        </div>
                                    </div>                                                    
                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                            <button type="button" class="btn btn-success edit_employee_documents_details">Edit</button>
                                            <button disabled="" class="btn btn-primary cancel_employee_documents_details" type="reset" type="">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <p style="padding:20px 0px; text-align:center; font-weight:bold; font-size:25px;">No Employee Documents Details Found</p>
                            @endif
                        </fieldset>
                        <fieldset style="margin-top: 20px">
                            <legend>Your Employee Previous Year Details</legend> 
                            @if(!empty($previous_details_edit))
                                <form method="post" class="employee_previous_year_validation" action="" enctype="multipart/form-data">
                                    @csrf  
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Name of the Previous Organization<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input disabled="" type="text" class="form-control name_prev_organization enable_previous_year" name="name_prev_organization" value="{{isset($previous_details_edit->name_prev_organization) ? $previous_details_edit->name_prev_organization : '' }}" placeholder="Previous Organization">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Years Of Experience<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select disabled="" class="form-control years_experience enable_previous_year" name="years_experience">
                                                <option value="">Select Years Of Experience</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "0 Year"){ echo "selected";}} ?> value="0 Year">0 Year</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "1 Year"){ echo "selected";}} ?> value="1 Year">1 Year</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "2 Years"){ echo "selected";}} ?> value="2 Years">2 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "3 Years"){ echo "selected";}} ?> value="3 Years">3 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "4 Years"){ echo "selected";}} ?> value="4 Years">4 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "5 Years"){ echo "selected";}} ?> value="5 Years">5 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "6 Years"){ echo "selected";}} ?> value="6 Years">6 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "7 Years"){ echo "selected";}} ?> value="7 Years">7 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "8 Years"){ echo "selected";}} ?> value="8 Years">8 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "9 Years"){ echo "selected";}} ?> value="9 Years">9 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "10 Years"){ echo "selected";}} ?> value="10 Years">10 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "11 Years"){ echo "selected";}} ?> value="11 Years">11 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "12 Years"){ echo "selected";}} ?>  value="12 Years">12 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "13 Years"){ echo "selected";}} ?> value="13 Years">13 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "14 Years"){ echo "selected";}} ?> value="14 Years">14 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "15 Years"){ echo "selected";}} ?> value="15 Years">15 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "16 Years"){ echo "selected";}} ?> value="16 Years">16 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "17 Years"){ echo "selected";}} ?> value="17 Years">17 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "18 Years"){ echo "selected";}} ?> value="18 Years">18 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "19 Years"){ echo "selected";}} ?> value="19 Years">19 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "20 Years"){ echo "selected";}} ?> value="20 Years">20 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "21 Years"){ echo "selected";}} ?> value="21 Years">21 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "22 Years"){ echo "selected";}} ?> value="22 Years">22 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "23 Years"){ echo "selected";}} ?> value="23 Years">23 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "24 Years"){ echo "selected";}} ?> value="24 Years">24 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "25 Years"){ echo "selected";}} ?> value="25 Years">25 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "26 Years"){ echo "selected";}} ?> value="26 Years">26 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "27 Years"){ echo "selected";}} ?> value="27 Years">27 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "28 Years"){ echo "selected";}} ?> value="28 Years">28 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "29 Years"){ echo "selected";}} ?> value="29 Years">29 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "30 Years"){ echo "selected";}} ?> value="30 Years">30 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "31 Years"){ echo "selected";}} ?> value="31 Years">31 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "32 Years"){ echo "selected";}} ?> value="32 Years">32 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "33 Years"){ echo "selected";}} ?> value="33 Years">33 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "34 Years"){ echo "selected";}} ?> value="34 Years">34 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "35 Years"){ echo "selected";}} ?> value="35 Years">35 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "36 Years"){ echo "selected";}} ?> value="36 Years">36 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "37 Years"){ echo "selected";}} ?> value="37 Years">37 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "38 Years"){ echo "selected";}} ?> value="38 Years">38 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "39 Years"){ echo "selected";}} ?> value="39 Years">39 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "40 Years"){ echo "selected";}} ?> value="40 Years">40 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "41 Years"){ echo "selected";}} ?> value="41 Years">41 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "42 Years"){ echo "selected";}} ?> value="42 Years">42 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "43 Years"){ echo "selected";}} ?> value="43 Years">43 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "44 Years"){ echo "selected";}} ?> value="44 Years">44 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "45 Years"){ echo "selected";}} ?> value="45 Years">45 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "46 Years"){ echo "selected";}} ?> value="46 Years">46 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "47 Years"){ echo "selected";}} ?> value="47 Years">47 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "48 Years"){ echo "selected";}} ?> value="48 Years">48 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "49 Years"){ echo "selected";}} ?> value="49 Years">49 Years</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->years_experience == "50 Years"){ echo "selected";}} ?> value="50 Years">50 Years</option>

                                            </select>
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Month Of Experience<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select disabled="" class="form-control months_experience enable_previous_year" name="months_experience">
                                                <option value="">Select Months Of Experience</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->months_experience == "0 Month"){ echo "selected";}} ?> value="0 Month">0 Month</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->months_experience == "1 Month"){ echo "selected";}} ?> value="1 Month">1 Month</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->months_experience == "2 Months"){ echo "selected";}} ?> value="2 Months">2 Months</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->months_experience == "3 Months"){ echo "selected";}} ?> value="3 Months">3 Months</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->months_experience == "4 Months"){ echo "selected";}} ?> value="4 Months">4 Months</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->months_experience == "5 Months"){ echo "selected";}} ?> value="5 Months">5 Months</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->months_experience == "6 Months"){ echo "selected";}} ?> value="6 Months">6 Months</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->months_experience == "7 Months"){ echo "selected";}} ?> value="7 Months">7 Months</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->months_experience == "8 Months"){ echo "selected";}} ?> value="8 Months">8 Months</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->months_experience == "9 Months"){ echo "selected";}} ?> value="9 Months">9 Months</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->months_experience == "10 Months"){ echo "selected";}} ?> value="10 Months">10 Months</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->months_experience == "11 Months"){ echo "selected";}} ?> value="11 Months">11 Months</option>
                                                <option <?php if(!empty($previous_details_edit)){ if($previous_details_edit->months_experience == "12 Months"){ echo "selected";}} ?> value="12 Months">12 Months</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Total Experience <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input disabled="" type="text" class="form-control total_experience enable_previous_year" name="total_experience" value="{{isset($previous_details_edit->total_experience) ? $previous_details_edit->total_experience : '' }}" placeholder="Total Experience">
                                        </div>
                                    </div>  
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Annual Salary<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input disabled="" type="text" class="form-control annual_salary enable_previous_year" name="annual_salary" value="{{isset($previous_details_edit->annual_salary) ? $previous_details_edit->annual_salary : '' }}" placeholder="Annual Salary">
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Reason For Resigning<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <textarea disabled=""  class="form-control  reason_for_resigning enable_previous_year" name="reason_for_resigning" placeholder="Reason For Resignation">{{isset($previous_details_edit-> reason_for_resigning ) ? $previous_details_edit-> reason_for_resigning  : '' }}</textarea>
                                        </div>
                                    </div>  
                                    <!-- Copy of Resignation Letter Image Upload Start Here -->
                                    <?php 
                                        if(!empty($previous_details_edit->copy_resignation_letter)) {

                                            $image = copyResignationLetterImagePath.'/'.$previous_details_edit->copy_resignation_letter;
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
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">PDF/JPG Image Preview</label>
                                        <div class="col-md-6 col-sm-6 mb-50">
                                            <div class="col-sm-10 " style="padding: 0">
                                                <?php if($image_extension == 'pdf'){ ?>

                                                    <img src="{{url('public/images/pdf_logo.png')}}" width="50%" height="100%" id="copy_resignation_letter"  alt="No image"  >

                                                <?php }else{ ?>

                                                    <img src="{{$image}}" width="50%" height="100%" id="copy_resignation_letter"  alt="No image"  >
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Copy of Resignation Letter JPG/PDF Upload</label>
                                        <div class="col-md-6 col-sm-6 mb-3">
                                            <input disabled="" type="file" class="form-control copy_resignation_letter enable_previous_year" name="copy_resignation_letter" accept=".jpg, .jpeg, .pdf">
                                        </div>
                                    </div> 
                                    <!-- Copy of Resignation Letter Image Upload End Here -->

                                     <!-- Copy of Relieving Letter Image Upload Start Here -->
                                      <?php 
                                        if(!empty($previous_details_edit->copy_relieving_letter)) {

                                            $image = previousRelievingLetterImagePath.'/'.$previous_details_edit->copy_relieving_letter;
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
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">PDF/JPG Image Preview</label>
                                        <div class="col-md-6 col-sm-6 mb-50">
                                            <div class="col-sm-10 " style="padding: 0">
                                                <?php if($image_extension == 'pdf'){ ?>

                                                    <img src="{{url('public/images/pdf_logo.png')}}" width="50%" height="100%" id="copy_relieving_letter"  alt="No image"  >

                                                <?php }else{ ?>

                                                    <img src="{{$image}}" width="50%" height="100%" id="copy_relieving_letter"  alt="No image"  >
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Copy of Relieving Letter JPG/PDF Upload</label>
                                        <div class="col-md-6 col-sm-6 mb-3">
                                            <input disabled="" type="file" class="form-control copy_relieving_letter enable_previous_year" name="copy_relieving_letter" accept=".jpg, .jpeg, .pdf">
                                        </div>
                                    </div> 
                                    <!-- Copy of Relieving Letter Image Upload End Here -->
                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                            <button type="button" class="btn btn-success edit_employee_previous_year">Edit</button>
                                            <button disabled="" class="btn btn-primary cancel_employee_previous_year" type="reset" type="">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <p style="padding:20px 0px; text-align:center; font-weight:bold; font-size:25px;">No Employee Previous Experience Found</p>
                            @endif
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){

        $(".employee_details_validation").validate({
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
<!-- Employee Details Scripts Starts Here -->
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
<script type="text/javascript">
    $(document).on('click','.edit_employee_details',function(){
        $(this).after('<button type="submit" name="employee_details" class="btn btn-success submit_employee_details" value="employee_details">Submit</button>');
        $(this).remove();
        $(".enable_employee_details").attr("disabled",false);
        $(".cancel_employee_details").attr("disabled",false);
    })
    $(document).on('click','.cancel_employee_details',function(){

        location.reload(true);
    })
</script>

<!-- Employee Details Scripts Ends Here -->

<!-- Employee Personal Details Scripts Starts Here -->

<script type="text/javascript">
    $(function(){

        $(".employee_personal_details_validation").validate({
            rules: {

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
            },
            messages: {

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
<script type="text/javascript">
    $(document).on('click','.edit_employee_personal_details',function(){
        $(this).after('<button type="submit" class="btn btn-success submit_employee_personal_details" value="employee_personal_details" name="employee_personal_details">Submit</button>');
        $(this).remove();
        $(".enable_employee_personal_details").attr("disabled",false);
        $(".cancel_employee_personal_details").attr("disabled",false);
    })
    $(document).on('click','.cancel_employee_personal_details',function(){

        location.reload(true);
    })
</script>

<!-- Employee Personal Details Scripts Ends Here -->

<!-- Employee Documents Details Scripts Starts here -->

<!-- Employee Passport Size Images -->
<script type="text/javascript">
    $(document).ready(function(){
        var _URL = window.URL || window.webkitURL;
        $('.img_upload_passport_images').change(function(){

            var img_name = $(this).val();

            if(img_name != '' && img_name != null)
            {   
                for(var i = 0; i < this.files.length; i++) {
                    var file = this.files[i];

                    var img = new Image();

                    var file_size = file.size/1024;

                    if((file.type == 'image/jpeg' || file.type == 'image/jpg' || file.type == 'image/png') && (file_size > "50" && file_size < "100"))
                    {

                        $(".passport_size_images").empty();
                        var reader = new FileReader();
                        reader.onload = function(e)
                        {

                            $(".passport_size_images").append('<img src='+e.target.result+'  style="width:40%; height:100%;">')
                        }
                        reader.readAsDataURL(file);
                    
                    }else{
                        
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Please select an image of .jpeg, .jpg .png file format and size of image in between 50KB to 100KB.'
                        }).then(function() {
                            $(".passport_size_images").html('<img style="display: block !important; margin:0 auto; !important" src="{{DefaultImgPath}}" width="40%" height="100%" id="old_images_passport"  alt="No image">');
                        });

                        $(this).val('');
                    }
                    img.src = _URL.createObjectURL(file);
                } 
            }else{
                $(this).val('');
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select an image of .jpeg, .jpg .png file format.'
                })
            }
        });
    });
</script>
<!-- Employee Pan Card Image -->
<script type="text/javascript">
    $(document).ready(function(){
        function readURL(input)
        {
            if(input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function(e)
                {
                    $('#old_image_pan_card').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('.img_upload_pan_card').change(function(){

            var img_name = $(this).val();
            var file = this.files[0];

            if(img_name != '' && img_name != null)
            {
                var img_arr = img_name.split('.');

                var ext = img_arr.pop();
                ext = ext.toLowerCase();

                var file_size = file.size/1024;

                if((ext == 'jpeg' || ext == 'jpg' || ext == 'png') && (file_size > "299" && file_size < "501"))
                {
                    value = readURL(this);
                }else{

                    $('#old_image_pan_card').attr('src',"{{DefaultImgPath}}");

                    $(this).val('');

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please select an image of .jpeg, .jpg .png file format and size of image in between 300KB to 500KB.'
                    })
                }
            }else{
                $(this).val('');
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select an image of .jpeg, .jpg .png file format.'
                })
            }
        });
    });
</script>
<!-- Employee Passport Images -->
<script type="text/javascript">
    $(document).ready(function(){
        var _URL = window.URL || window.webkitURL;
        $('.passport_images_file_upload').change(function(){

            var img_name = $(this).val();

            if(img_name != '' && img_name != null)
            {   
                var count = 1;
                for(var i = 0; i < this.files.length; i++) {
                    var file = this.files[i];

                    var img = new Image();

                    var file_size = file.size/1024;

                    if((file.type == 'image/jpeg' || file.type == 'image/jpg' || file.type == 'image/png') && (file_size > "299" && file_size < "501"))
                    {

                        $(".id_proof_passport_images").empty();
                        
                        var reader = new FileReader();
                        reader.onload = function(e)
                        {

                            $(".id_proof_passport_images").append('<img src='+e.target.result+'  style="width:40%; height:100%;">')
                        }
                        reader.readAsDataURL(file);
                            
                        
                        count++;
                    }else{

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Please select an image of .jpeg, .jpg .png file format and size of image in between 300KB to 500KB.'
                        }).then(function() {
                            $(".id_proof_passport_images").html('<img style="display: block !important; margin:0 auto; !important" src="{{DefaultImgPath}}" width="40%" height="100%" id="id_proof_old_passport_images"  alt="No image">');
                            
                        });
                        $(this).val('');
                    }
                    img.src = _URL.createObjectURL(file);
                } 
            }else{
                $(this).val('');
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select an image of .jpeg, .jpg .png file format.'
                })
            }
        });
    });
</script>
<!-- Aadhaar Card Images -->
<script type="text/javascript">
    $(document).ready(function(){
        var _URL = window.URL || window.webkitURL;
        $('.aadhaar_card_images_file_upload').change(function(){

            var img_name = $(this).val();

            if(img_name != '' && img_name != null)
            {   
                
                for(var i = 0; i < this.files.length; i++) {
                    var file = this.files[i];

                    var img = new Image();

                    var file_size = file.size/1024;

                    if((file.type == 'image/jpeg' || file.type == 'image/jpg' || file.type == 'image/png') && (file_size > "299" && file_size < "501"))
                    {

                        $(".id_proof_aadhaar_card_images").empty();

                        var reader = new FileReader();
                        reader.onload = function(e)
                        {

                            $(".id_proof_aadhaar_card_images").append('<img src='+e.target.result+'  style="width:40%; height:100%;">')
                        }
                        reader.readAsDataURL(file);

                        
                    }else{

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Please select an image of .jpeg, .jpg .png file format and size of image in between 300KB to 500KB.'
                        }).then(function() {
                            $(".id_proof_aadhaar_card_images").html('<img style="display: block !important; margin:0 auto; !important" src="{{DefaultImgPath}}" width="40%" height="100%" id="id_proof_old_aadhaar_card_images"  alt="No image">');
                            
                        });
                        $(this).val('');

                    }
                    img.src = _URL.createObjectURL(file);
                } 
            }else{
                $(this).val('');
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select an image of .jpeg, .jpg .png file format.'
                })
            }
        });
    });
</script>
<!-- Employee Tenth Qualification Image -->
<script type="text/javascript">
    $(document).ready(function(){
        function readURL(input)
        {
            if(input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function(e)
                {
                    $('#old_image_tenth').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('.img_upload_tenth').change(function(){

            var img_name = $(this).val();

            if(img_name != '' && img_name != null)
            {

                var file = this.files[0];
                var file_size = file.size/1024;

                if((file.type == 'image/jpeg' || file.type == 'image/jpg' || file.type == 'image/png') && (file_size > "299" && file_size < "501"))
                {
                    value = readURL(this);
                }else{

                    $('#old_image_tenth').attr('src',"{{DefaultImgPath}}");

                    $(this).val('');

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please select an image of .jpeg, .jpg .png file format and size of image in between 300KB to 500KB.'
                    })
                }
            }else{
                $(this).val('');
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select an image of .jpeg, .jpg .png file format.'
                })
            }
        });
    });
</script>
<!-- Employee Twelve Qualification Image -->
<script type="text/javascript">
    $(document).ready(function(){
        function readURL(input)
        {
            if(input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function(e)
                {
                    $('#old_image_twelve').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('.img_upload_twelve').change(function(){

            var img_name = $(this).val();

            if(img_name != '' && img_name != null)
            {
                var file = this.files[0];
                var file_size = file.size/1024;

                if((file.type == 'image/jpeg' || file.type == 'image/jpg' || file.type == 'image/png') && (file_size > "299" && file_size < "501"))
                {
                    value = readURL(this);
                }else{

                    $('#old_image_twelve').attr('src',"{{DefaultImgPath}}");

                    $(this).val('');

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please select an image of .jpeg, .jpg .png file format and size of image in between 300KB to 500KB.'
                    })
                }
            }else{
                $(this).val('');
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select an image of .jpeg, .jpg .png file format.'
                })
            }
        });
    });
</script>
<!-- Employee Other Qualification Images -->
<script type="text/javascript">
    $(document).ready(function(){
        var _URL = window.URL || window.webkitURL;
        $('.img_upload_other_qualification_img').change(function(){

            var img_name = $(this).val();

            if(img_name != '' && img_name != null)
            {   
                for(var i = 0; i < this.files.length; i++) {
                    var file = this.files[i];

                    var img = new Image();

                    var file_size = file.size/1024;

                    if((file.type == 'image/jpeg' || file.type == 'image/jpg' || file.type == 'image/png') && (file_size > "299" && file_size < "501"))
                    {

                        $(".other_qualification_img").empty();
                        var reader = new FileReader();
                        reader.onload = function(e)
                        {

                            $(".other_qualification_img").append('<img src='+e.target.result+' style="width:40%; height:100%;">')
                        }
                        reader.readAsDataURL(file);

                    }else{

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Please select an image of .jpeg, .jpg .png file format and size of image in between 300KB to 500KB.'

                        }).then(function() {
                            $(".other_qualification_img").html('<img style="display: block !important; margin:0 auto; !important" src="{{DefaultImgPath}}" width="40%" height="100%" id="other_qualification_img"  alt="No image">');
                            
                        });

                        $(this).val('');
                    }
                    img.src = _URL.createObjectURL(file);
                } 
            }else{
                $(this).val('');
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select an image of .jpeg, .jpg .png file format.'
                })
            }
        });
    });
</script>
<!-- Employee Graduation Image -->
<script type="text/javascript">
    $(document).ready(function(){
        function readURL(input)
        {
            if(input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function(e)
                {
                    $('#old_image_graduation').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('.img_upload_graduation').change(function(){

            var img_name = $(this).val();

            if(img_name != '' && img_name != null)
            {
                var file = this.files[0];
                var file_size = file.size/1024;

                if((file.type == 'image/jpeg' || file.type == 'image/jpg' || file.type == 'image/png') && (file_size > "299" && file_size < "501"))
                {
                    value = readURL(this);
                }else{

                    $('#old_image_graduation').attr('src',"{{DefaultImgPath}}");
                    $(this).val('');

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please select an image of .jpeg, .jpg .png file format and size of image in between 300KB to 500KB.'
                    })
                }
            }else{
                $(this).val('');
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select an image of .jpeg, .jpg .png file format.'
                })
            }
        });
    });
</script>
<!-- Employee Post Graduation Image -->
<script type="text/javascript">
    $(document).ready(function(){
        function readURL(input)
        {
            if(input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function(e)
                {
                    $('#old_image_post_graduation').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('.img_upload_post_graduation').change(function(){

            var img_name = $(this).val();

            if(img_name != '' && img_name != null)
            {
                var file = this.files[0];
                var file_size = file.size/1024;

                if((file.type == 'image/jpeg' || file.type == 'image/jpg' || file.type == 'image/png') && (file_size > "299" && file_size < "501"))
                {
                    value = readURL(this);
                }else{
                    
                    $('#old_image_post_graduation').attr('src',"{{DefaultImgPath}}");
                    $(this).val('');

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please select an image of .jpeg, .jpg .png file format and size of image in between 300KB to 500KB.'
                    })
                }
            }else{
                $(this).val('');
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select an image of .jpeg, .jpg .png file format.'
                })
            }
        });
    });
</script>
<!-- Employee Other Documents Images -->
<script type="text/javascript">
    $(document).ready(function(){
        var _URL = window.URL || window.webkitURL;
        $('.img_upload_other_documents_img').change(function(){

            var img_name = $(this).val();

            if(img_name != '' && img_name != null)
            {   
                for(var i = 0; i < this.files.length; i++) {
                    var file = this.files[i];

                    var img = new Image();

                    var file_size = file.size/1024;

                    if((file.type == 'image/jpeg' || file.type == 'image/jpg' || file.type == 'image/png') && (file_size > "299" && file_size < "501"))
                    {

                        $(".other_documents_img").empty();
                        
                        var reader = new FileReader();
                        reader.onload = function(e)
                        {

                            $(".other_documents_img").append('<img src='+e.target.result+' style="width:40%; height:100%;">')
                        }
                        reader.readAsDataURL(file);
                            
                    }else{

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Please select an image of .jpeg, .jpg .png file format and size of image in between 300KB to 500KB.'

                        }).then(function() {

                            $(".other_documents_img").html('<img style="display: block !important; margin:0 auto; !important" src="{{DefaultImgPath}}" width="40%" height="100%" id="id_proof_other_documents_img"  alt="No image">');
                            
                        });
                        
                        $(this).val('');

                    }
                    img.src = _URL.createObjectURL(file);
                } 
            }else{
                $(this).val('');
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select an image of .jpeg, .jpg .png file format.'
                })
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).on('click','.edit_employee_documents_details',function(){
        $(this).after('<button type="submit" class="btn btn-success submit_employee_documents_details" value="employee_documents_details" name="employee_documents_details">Submit</button>');
        $(this).remove();
        $(".enable_documents_details").attr("disabled",false);
        $(".cancel_employee_documents_details").attr("disabled",false);
    })
    $(document).on('click','.cancel_employee_documents_details',function(){

        location.reload(true);
    })
</script>

<!-- Employee Documents Details Scripts Ends here  -->

<!-- Employee Previous Year Experience Scripts Starts Here -->

<script type="text/javascript">
    $(".years_experience").change(function(){

        var years_experience =  $(this).val()

        $(".months_experience").val('');

        if(years_experience != ''){

            $(".total_experience").val(years_experience);

        }
    })

    $(".months_experience").change(function(){

        var months_experience = $(this).val();

        if(months_experience != ''){

            var years_experience = $(".years_experience option:selected").val();

            $(".total_experience").val(years_experience+' '+months_experience);

        }
    })
</script>
<script type="text/javascript">
    $(function(){

        $(".employee_previous_year_validation").validate({
            rules: {

                name_prev_organization:{
                    required:true,
                },

                years_experience:{
                    required:true,
                },

                months_experience:{
                    required:true,
                },

                total_experience:{
                    required:true,
                },

                annual_salary:{
                    required:true,
                },

                reason_for_resigning:{
                    required:true,
                },

                status:{
                    required:true,
                },
            },

            messages: {

                name_prev_organization:{
                    required: "Please Enter Your Employee Previous Name Organization",
                },
                
                work_from:{
                    required:"Please Enter Your Work From",
                },

                work_to:{
                    required: "Please Enter Your Work to",
                },

                years_experience:{
                    required:"Please Enter Your Employee Years Experience",
                },

                months_experience:{
                    required:"Please Enter Your Employee Months Experience",
                },

                total_experience:{
                    required:"Please Enter Your Employee Total Experience",
                },

                annual_salary:{
                    required:"Please Enter Your Employee Annual Salary",
                },

                reason_for_resigning:{
                    required:"Please Enter Your Employee Reason For Resignation",
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
<!-- Copy of Resignation Letter Image Upload Here -->
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

                        $('#copy_resignation_letter').attr('src', "{{url('public/images/pdf_logo.png')}}");

                    }else{

                        $('#copy_resignation_letter').attr('src', e.target.result);
                    }
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('.copy_resignation_letter').change(function(){

            var img_name = $(this).val();

            if(img_name != '' && img_name != null)
            {
                var img_arr = img_name.split('.');

                var ext = img_arr.pop();
                ext = ext.toLowerCase();

                if(ext == 'jpeg' || ext == 'jpg' || ext == 'pdf')
                {
                    input = document.getElementById('copy_resignation_letter');
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

<!-- Copy of Relieving Letter Image Upload Here -->
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

                        $('#copy_relieving_letter').attr('src', "{{url('public/images/pdf_logo.png')}}");

                    }else{

                        $('#copy_relieving_letter').attr('src', e.target.result);
                    }
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('.copy_relieving_letter').change(function(){

            var img_name = $(this).val();

            if(img_name != '' && img_name != null)
            {
                var img_arr = img_name.split('.');

                var ext = img_arr.pop();
                ext = ext.toLowerCase();

                if(ext == 'jpeg' || ext == 'jpg' || ext == 'pdf')
                {
                    input = document.getElementById('copy_relieving_letter');
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

<script type="text/javascript">
    $(document).on('click','.edit_employee_previous_year',function(){
        $(this).after('<button type="submit" class="btn btn-success submit_employee_previous_year" value="employee_previous_year" name="employee_previous_year">Submit</button>');
        $(this).remove();
        $(".enable_previous_year").attr("disabled",false);
        $(".cancel_employee_previous_year").attr("disabled",false);
    })
    $(document).on('click','.cancel_employee_previous_year',function(){

        location.reload(true);
    })
</script>

<!-- Employee Previous Year Experience Scripts Ends Here -->

@endsection
