@extends('backEnd.layouts.master')

@section('content')
<?php

    if(isset($previous_details_edit)){

        $url = url('admin/previous-experience-details-edit/'.$previous_details_edit->id);
        $title = "Edit";
        $class = "previous_experience_details_edit";

    }else{
        $url = url('admin/previous-experience-details-add');
        $title = "Add";
        $class = "previous_experience_details_add";
    }
?>
<div style="min-height: 600px;" class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>{{$title}} Previous Experience Details</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{$title}} Previous Experience Detail</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form method="post" class="{{$class}}" action="{{$url}}" enctype="multipart/form-data">
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
                                   <select class="form-control previous_experience_details" name="user_id">
                                        <option value="">Select Your Employee</option>
                                        <?php if(!empty($user_unit)){
                                        ?>
                                        <option selected="selected"  value='{{$user_unit->id}}'><?php echo  ucfirst($user_unit->first_name).' '.ucfirst($user_unit->last_name)." ". "("." ".$user_unit->email." ".")"; ?></option>

                                        <?php } ?>
                                   </select>
                                </div>
                            </div>  

                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Name of the Previous Organization<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control name_prev_organization" name="name_prev_organization" value="{{isset($previous_details_edit->name_prev_organization) ? $previous_details_edit->name_prev_organization : '' }}" placeholder="Previous Organization">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Years Of Experience<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control years_experience" name="years_experience">
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
                                    <select class="form-control months_experience" name="months_experience">
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
                                    <input type="text" class="form-control total_experience" name="total_experience" value="{{isset($previous_details_edit->total_experience) ? $previous_details_edit->total_experience : '' }}" placeholder="Total Experience">
                                </div>
                            </div>  
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Annual Salary<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control annual_salary" name="annual_salary" value="{{isset($previous_details_edit->annual_salary) ? $previous_details_edit->annual_salary : '' }}" placeholder="Annual Salary">
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Reason For Resigning<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea  class="form-control  reason_for_resigning" name="reason_for_resigning" placeholder="Reason For Resignation">{{isset($previous_details_edit-> reason_for_resigning ) ? $previous_details_edit-> reason_for_resigning  : '' }}</textarea>
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
                                    <input type="file" class="form-control copy_resignation_letter" name="copy_resignation_letter" accept=".jpg, .jpeg, .pdf">
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
                                    <input type="file" class="form-control copy_relieving_letter" name="copy_relieving_letter" accept=".jpg, .jpeg, .pdf">
                                </div>
                            </div> 
                            <!-- Copy of Relieving Letter Image Upload End Here -->

                                      
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="status">
                                        <option value="">Select Status</option>
                                        <option <?php if(!empty($previous_details_edit->status)){ if($previous_details_edit->status == 'Active'){ echo "selected";} } ?> value="Active">Active</option>
                                        <option <?php if(!empty($previous_details_edit->status)){ if($previous_details_edit->status == 'Inactive'){ echo "selected";} } ?>  value="Inactive">Inactive</option>
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

        $(".{{$class}}").validate({
            rules: {

               business_unit_id:{
                    required:true,
                },

                user_id: {
                    required:true,
                },
                
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

                business_unit_id:{
                    required: "Please Select Your Business Unit Name",
                },

                user_id: {
                    required: "Please Select Your Employee Name",
                },

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

<script type="text/javascript">
    $(function(){

        $(".business_unit_id").change(function(){

            var unit_id = $(this).val();

            if(unit_id != ''){
                $(".loader_fixed").show();
                $.ajax({
                    method: "get",
                    url: "{{url('admin/previous-experience-details')}}"+'/'+unit_id,
                    success:function(resp){
                        $(".loader_fixed").hide();
                        $(".previous_experience_details").html(resp);
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

                $(".previous_experience_details").html("<option value=''>Select Your Employee</option>");
            }
        })
    })
</script>

@if(!isset($previous_details_edit))
    <script type="text/javascript">
        $(function(){

            var id = $( ".business_unit_id option:selected" ).val();

            if(id != ''){
                $(".loader_fixed").show();
                $.ajax({

                    type: "GET",
                    url: "{{url('admin/previous-experience-details')}}"+'/'+id,
                    success: function(resp){

                        if(resp != ''){
                            $(".loader_fixed").hide();
                            $(".previous_experience_details").html(resp);

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
@endsection