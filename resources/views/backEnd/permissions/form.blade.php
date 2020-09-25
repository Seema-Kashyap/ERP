@extends('backEnd.layouts.master')

@section('content')
<?php

    if(isset($user_details)){

        $url = url('admin/edit-permissions-to-user/'.$user_details->id);
        $title = "Edit";
        $class = "edit_permissions_to_user";

    }else{
        $url = url('admin/add-permissions-to-user');
        $title = "Add";
        $class = "add_permission_to_user";
    }
?>
<div style="min-height: 600px;" class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>{{$title}} Permissions To User</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{$title}} Permissions To User</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form method="post" action="{{$url}}"  data-parsley-validate class="{{$class}}">
                            @csrf
                            <?php if(Auth::user()->role_id == '1'){ ?>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="business_unit_id">Business Unit <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control business_unit_id" name="business_unit_id">
                                            <option value="">Select Business Unit</option>
                                            @foreach($units as $data)
                                            <option <?php if(!empty($user_details)){ if($data->id == $user_details->unit_id){ echo "selected"; } }?> value="{{$data->id}}">{{$data->name}}</option>
                                            @endforeach
                                        </select>
                                        
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Employee Name<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                     
                                   <select class="form-control user_details" name="user_id">
                                        <option value="">Select Your Employee</option>
                                        <?php if(!empty($user_details)){
                                        ?>
                                        <option role_id="{{$user_details->role_id}}" selected="selected"  value='{{$user_details->id}}'><?php echo  ucfirst($user_details->first_name).' '.ucfirst($user_details->last_name)." ". "("." ".$user_details->email." ".")"; ?></option>

                                        <?php } ?>
                                   </select>
                                </div>
                            </div>
                            <fieldset class="col-md-12 hcm_class">
                                
                                <?php $hcm_status = false; ?>
                                <?php $employee_details = 0; ?>
                                <?php $hcm_heading = 0; ?>
                                <?php $employee_personal_details = 0; ?>
                                <?php $employee_personal_docuemnts_upload = 0; ?>
                                <?php $employee_resignation_details = 0; ?>
                                <?php $employee_after_joining = 0; ?>
                                <?php $employee_previous_experience = 0; ?>
                                <?php $employee_increment_details = 0; ?>
                                <?php $employee_complete_details = 0; ?>
                                <?php $employee_statutory_details = 0; ?>
                                <?php $user_details = 0; ?>
                                <?php $it_asset_details = 0; ?>
                                <?php $business_unit_details = 0; ?>
                                <?php $employee_designation_details = 0; ?>
                                @foreach($permissions as $data)

                                    @if($data['unit_id'] == 3)

                                        @if($hcm_heading == 0)

                                            <legend align="center">{{$data['unit_name']}} Permissions</legend>
                                            <?php $hcm_status = true;  ?>
                                            <?php $hcm_heading++ ?>

                                        @endif

                                        @if($data['sidebar_name'] == 'Users Details')

                                            @if($user_details == 0)

                                                <h2 class="main_heading"><span>{{$data['sidebar_name']}} Permissions</span></h2>

                                                <div class="row">
                                                    <div class="col-md-12 toggle_margin">
                                                        <label class="toggle">
                                                            <input type="checkbox" name="" class=" user_details_select_all" value="" /> 
                                                            <span class="slider"></span>
                                                        </label>
                                                            <span class="route_name">Select All Users Details</span>
                                                    </div>
                                                </div>
                                                
                                                <?php $user_details++ ?>
                                            @endif

                                            <div class="row">
                                                
                                                <div class="col-md-12 toggle_margin">
                                                    <label class="toggle">

                                                        @if(in_array($data['id'],$permissions_checked_array))
                                                            <input checked="" type="checkbox" name="permissions[]" class=" user_details_checkbox" value="{{$data['id']}}" />
                                                        @else

                                                            <input  type="checkbox" name="permissions[]" class=" user_details_checkbox" value="{{$data['id']}}" />
                                                        @endif
                                                        <span class="slider"></span>
                                                    </label>
                                                        <span class="route_name">{{$data['route_name']}}</span>
                                                </div>
                                            </div>

                                        @endif

                                        @if($data['sidebar_name'] == 'Employee Details')

                                            @if($employee_details == 0)

                                                <h2 class="main_heading"><span>{{$data['sidebar_name']}} Permissions</span></h2>

                                                <div class="row">
                                                    <div class="col-md-12 toggle_margin">
                                                        <label class="toggle">
                                                            <input type="checkbox" name="" class=" employee_details_select_all" value="" /> 
                                                            <span class="slider"></span>
                                                        </label>
                                                            <span class="route_name">Select All Employee Details</span>
                                                    </div>
                                                </div>
                                                
                                                <?php $employee_details++ ?>
                                            @endif

                                            <div class="row">
                                                
                                                <div class="col-md-12 toggle_margin">
                                                    <label class="toggle">

                                                        @if(in_array($data['id'],$permissions_checked_array))
                                                            <input checked="" type="checkbox" name="permissions[]" class=" employee_details_checkbox" value="{{$data['id']}}" />
                                                        @else

                                                            <input  type="checkbox" name="permissions[]" class=" employee_details_checkbox" value="{{$data['id']}}" />
                                                        @endif
                                                        <span class="slider"></span>
                                                    </label>
                                                        <span class="route_name">{{$data['route_name']}}</span>
                                                </div>
                                            </div>

                                        @endif

                                        @if($data['sidebar_name'] == 'Employee Personal Details')

                                            @if($employee_personal_details == 0)

                                                <h2 class="main_heading"><span>{{$data['sidebar_name']}} Permissions</span></h2>

                                                <div class="row">
                                                    <div class="col-md-12 toggle_margin">
                                                        <label class="toggle">
                                                            <input type="checkbox" name="" class=" employee_personal_details_select_all" value="" />
                                                            <span class="slider"></span>
                                                        </label>
                                                        <span class="route_name"> Select All Employee Personal Details</span>
                                                    </div>
                                                </div>

                                                <?php $employee_personal_details++ ?>
                                            @endif
                                            <div class="row">
                                                <div class="col-md-12 toggle_margin">
                                                    <label class="toggle">
                                                        @if(in_array($data['id'],$permissions_checked_array))
                                                            <input checked="" type="checkbox" name="permissions[]" class=" employee_personal_details_checkbox" value="{{$data['id']}}" />
                                                        @else

                                                            <input type="checkbox" name="permissions[]" class=" employee_personal_details_checkbox" value="{{$data['id']}}" />

                                                        @endif
                                                            <span class="slider"></span>
                                                    </label>
                                                    <span class="route_name">{{$data['route_name']}}</span>
                                                </div>
                                            </div>

                                        @endif

                                        @if($data['sidebar_name'] == 'Employee Personal Documents Upload')

                                            @if($employee_personal_docuemnts_upload == 0)

                                                <h2 class="main_heading"><span>{{$data['sidebar_name']}} Permissions</span></h2>

                                                <div class="row">
                                                    <div class="col-md-12 toggle_margin">
                                                        <label class="toggle">
                                                            <input type="checkbox" name="" class=" employee_personal_details_documents_select_all" value="" />
                                                            <span class="slider"></span>
                                                        </label>
                                                        <span class="route_name"> Select All Employee Personal Documents Upload</span>
                                                    </div>
                                                </div>

                                                <?php $employee_personal_docuemnts_upload++ ?>
                                            @endif
                                            <div class="row">
                                                
                                                <div class="col-md-12 toggle_margin">
                                                    <label class="toggle">
                                                        @if(in_array($data['id'],$permissions_checked_array))
                                                            <input checked="" type="checkbox" name="permissions[]" class="employee_personal_documents_details_checkbox" value="{{$data['id']}}" />
                                                        @else
                                                            <input type="checkbox" name="permissions[]" class="employee_personal_documents_details_checkbox" value="{{$data['id']}}" />

                                                        @endif
                                                        <span class="slider"></span>
                                                        
                                                    </label>
                                                    <span class="route_name"> {{$data['route_name']}}</span>
                                                </div>
                                            </div>

                                        @endif

                                        @if($data['sidebar_name'] == 'Employee Resignation Details')

                                            @if($employee_resignation_details == 0)

                                                <h2 class="main_heading"><span>{{$data['sidebar_name']}} Permissions</span></h2>

                                                <div class="row">
                                                    <div class="col-md-12 toggle_margin">
                                                        <label class="toggle">
                                                            <input type="checkbox" name="" class="employee_resignation_details_select_all" value="" />
                                                            <span class="slider"></span>
                                                        </label>
                                                        <span class="route_name">Select All Employee Resignation Details</span>
                                                    </div>
                                                </div>

                                                <?php $employee_resignation_details++ ?>
                                            @endif
                                            <div class="row">
                                                
                                                <div class="col-md-12 toggle_margin">
                                                    <label class="toggle">
                                                        @if(in_array($data['id'],$permissions_checked_array))
                                                            <input checked="" type="checkbox" name="permissions[]" class="employee_resignation_details_checkbox" value="{{$data['id']}}" />
                                                        @else
                                                            <input type="checkbox" name="permissions[]" class="employee_resignation_details_checkbox" value="{{$data['id']}}" />

                                                        @endif
                                                        <span class="slider"></span>
                                                    </label>
                                                    <span class="route_name">{{$data['route_name']}}</span>
                                                </div>
                                            </div>

                                        @endif

                                        @if($data['sidebar_name'] == 'Employee Increment Details')

                                            @if($employee_increment_details == 0)

                                                <h2 class="main_heading"><span>{{$data['sidebar_name']}} Permissions</span></h2>

                                                <div class="row">
                                                    <div class="col-md-12 toggle_margin">
                                                        <label class="toggle">
                                                            <input type="checkbox" name="" class="employee_increment_details_select_all" value="" />
                                                            <span class="slider"></span>
                                                        </label>
                                                        <span class="route_name">Select All Employee Increment Details</span>
                                                    </div>
                                                </div>

                                                <?php $employee_increment_details++ ?>
                                            @endif
                                            <div class="row">
                                                
                                                <div class="col-md-12 toggle_margin">
                                                    <label class="toggle">
                                                        @if(in_array($data['id'],$permissions_checked_array))
                                                            <input checked="" type="checkbox" name="permissions[]" class="employee_increment_details_checkbox" value="{{$data['id']}}" />
                                                        @else
                                                            <input type="checkbox" name="permissions[]" class="employee_increment_details_checkbox" value="{{$data['id']}}" />

                                                        @endif
                                                        <span class="slider"></span>
                                                    </label>
                                                    <span class="route_name">{{$data['route_name']}}</span>
                                                </div>
                                            </div>

                                        @endif

                                        @if($data['sidebar_name'] == 'Employee After Joining Details')

                                            @if($employee_after_joining == 0)

                                                <h2 class="main_heading"><span>{{$data['sidebar_name']}} Permissions</span></h2>

                                                <div class="row">
                                                    <div class="col-md-12 toggle_margin">
                                                        <label class="toggle">
                                                            <input type="checkbox" name="" class="employee_after_joining_select_all" value="" />
                                                            <span class="slider"></span>
                                                        </label>
                                                        <span class="route_name">Select All Employee After Joining Details</span>
                                                    </div>
                                                </div>

                                                <?php $employee_after_joining++ ?>
                                            @endif
                                            <div class="row">
                                                
                                                <div class="col-md-12 toggle_margin">
                                                    <label class="toggle">
                                                        @if(in_array($data['id'],$permissions_checked_array))
                                                            <input checked="" type="checkbox" name="permissions[]" class="employee_after_joining_checkbox" value="{{$data['id']}}" />
                                                        @else
                                                            <input type="checkbox" name="permissions[]" class="employee_after_joining_checkbox" value="{{$data['id']}}" />

                                                        @endif
                                                        <span class="slider"></span>
                                                    </label>
                                                    <span class="route_name">{{$data['route_name']}}</span>
                                                </div>
                                            </div>

                                        @endif

                                        @if($data['sidebar_name'] == 'Employee Previous Experience Details')

                                            @if($employee_previous_experience == 0)

                                                <h2 class="main_heading"><span>{{$data['sidebar_name']}} Permissions</span></h2>

                                                <div class="row">
                                                    <div class="col-md-12 toggle_margin">
                                                        <label class="toggle">
                                                            <input type="checkbox" name="" class="employee_previous_experience_select_all" value="" />
                                                            <span class="slider"></span>
                                                        </label>
                                                        <span class="route_name">Select All Employee Previous Experience</span>
                                                    </div>
                                                </div>

                                                <?php $employee_previous_experience++ ?>
                                            @endif
                                            <div class="row">
                                                
                                                <div class="col-md-12 toggle_margin">
                                                    <label class="toggle">
                                                        @if(in_array($data['id'],$permissions_checked_array))
                                                            <input checked="" type="checkbox" name="permissions[]" class="employee_previous_experience_checkbox" value="{{$data['id']}}" />
                                                        @else
                                                            <input type="checkbox" name="permissions[]" class="employee_previous_experience_checkbox" value="{{$data['id']}}" />

                                                        @endif
                                                        <span class="slider"></span>
                                                    </label>
                                                    <span class="route_name">{{$data['route_name']}}</span>
                                                </div>
                                            </div>

                                        @endif


                                        @if($data['sidebar_name'] == 'Employee Complete Details')

                                            @if($employee_complete_details == 0)

                                                <h2 class="main_heading"><span>{{$data['sidebar_name']}} Permissions</span></h2>

                                                <div class="row">
                                                    <div class="col-md-12 toggle_margin">
                                                        <label class="toggle">
                                                            <input type="checkbox" name="" class="employee_complete_details_select_all" value="" />
                                                            <span class="slider"></span>
                                                        </label>
                                                        <span class="route_name">Select All Employee Complete Details</span>
                                                    </div>
                                                </div>

                                                <?php $employee_complete_details++ ?>
                                            @endif
                                            <div class="row">
                                                
                                                <div class="col-md-12 toggle_margin">
                                                    <label class="toggle">
                                                        @if(in_array($data['id'],$permissions_checked_array))
                                                            <input checked="" type="checkbox" name="permissions[]" class="employee_complete_details_checkbox" value="{{$data['id']}}" />
                                                        @else
                                                            <input type="checkbox" name="permissions[]" class="employee_complete_details_checkbox" value="{{$data['id']}}" />

                                                        @endif
                                                        <span class="slider"></span>
                                                    </label>
                                                    <span class="route_name">{{$data['route_name']}}</span>
                                                </div>
                                            </div>

                                        @endif

                                        @if($data['sidebar_name'] == 'Statutory Details')

                                            @if($employee_statutory_details == 0)

                                                <h2 class="main_heading"><span>{{$data['sidebar_name']}} Permissions</span></h2>

                                                <div class="row">
                                                    <div class="col-md-12 toggle_margin">
                                                        <label class="toggle">
                                                            <input type="checkbox" name="" class="employee_statutory_details_select_all" value="" />
                                                            <span class="slider"></span>
                                                        </label>
                                                        <span class="route_name">Select All Employee Statutory Details</span>
                                                    </div>
                                                </div>

                                                <?php $employee_statutory_details++ ?>
                                            @endif
                                            <div class="row">
                                                
                                                <div class="col-md-12 toggle_margin">
                                                    <label class="toggle">
                                                        @if(in_array($data['id'],$permissions_checked_array))
                                                            <input checked="" type="checkbox" name="permissions[]" class="employee_statutory_details_checkbox" value="{{$data['id']}}" />
                                                        @else
                                                            <input type="checkbox" name="permissions[]" class="employee_statutory_details_checkbox" value="{{$data['id']}}" />

                                                        @endif
                                                        <span class="slider"></span>
                                                    </label>
                                                    <span class="route_name">{{$data['route_name']}}</span>
                                                </div>
                                            </div>

                                        @endif

                                        @if($data['sidebar_name'] == 'IT Assets Details')

                                            @if($it_asset_details == 0)

                                                <h2 class="main_heading"><span>{{$data['sidebar_name']}} Permissions</span></h2>

                                                <div class="row">
                                                    <div class="col-md-12 toggle_margin">
                                                        <label class="toggle">
                                                            <input type="checkbox" name="" class=" it_asset_details_select_all" value="" /> 
                                                            <span class="slider"></span>
                                                        </label>
                                                            <span class="route_name">Select All IT Asset Details</span>
                                                    </div>
                                                </div>
                                                
                                                <?php $it_asset_details++ ?>
                                            @endif

                                            <div class="row">
                                                
                                                <div class="col-md-12 toggle_margin">
                                                    <label class="toggle">

                                                        @if(in_array($data['id'],$permissions_checked_array))
                                                            <input checked="" type="checkbox" name="permissions[]" class=" it_asset_details_checkbox" value="{{$data['id']}}" />
                                                        @else

                                                            <input  type="checkbox" name="permissions[]" class=" it_asset_details_checkbox" value="{{$data['id']}}" />
                                                        @endif
                                                        <span class="slider"></span>
                                                    </label>
                                                        <span class="route_name">{{$data['route_name']}}</span>
                                                </div>
                                            </div>

                                        @endif

                                    @endif

                                    @if($data['sidebar_name'] == 'Business Units')

                                        @if($business_unit_details == 0)

                                            <h2 class="main_heading"><span>{{$data['sidebar_name']}} Permissions</span></h2>

                                            <div class="row">
                                                <div class="col-md-12 toggle_margin">
                                                    <label class="toggle">
                                                        <input type="checkbox" name="" class=" business_unit_details_select_all" value="" /> 
                                                        <span class="slider"></span>
                                                    </label>
                                                        <span class="route_name">Select All Business Unit</span>
                                                </div>
                                            </div>
                                            
                                            <?php $business_unit_details++ ?>
                                        @endif

                                        <div class="row">
                                            
                                            <div class="col-md-12 toggle_margin">
                                                <label class="toggle">

                                                    @if(in_array($data['id'],$permissions_checked_array))
                                                        <input checked="" type="checkbox" name="permissions[]" class=" business_unit_details_checkbox" value="{{$data['id']}}" />
                                                    @else

                                                        <input  type="checkbox" name="permissions[]" class=" business_unit_details_checkbox" value="{{$data['id']}}" />
                                                    @endif
                                                    <span class="slider"></span>
                                                </label>
                                                    <span class="route_name">{{$data['route_name']}}</span>
                                            </div>
                                        </div>

                                    @endif

                                    @if($data['sidebar_name'] == 'Designation')

                                        @if($employee_designation_details == 0)

                                            <h2 class="main_heading"><span>{{$data['sidebar_name']}} Permissions</span></h2>

                                            <div class="row">
                                                <div class="col-md-12 toggle_margin">
                                                    <label class="toggle">
                                                        <input type="checkbox" name="" class=" employee_designation_details_select_all" value="" /> 
                                                        <span class="slider"></span>
                                                    </label>
                                                        <span class="route_name">Select All Employee Designation Details</span>
                                                </div>
                                            </div>
                                            
                                            <?php $employee_designation_details++ ?>
                                        @endif

                                        <div class="row">
                                            
                                            <div class="col-md-12 toggle_margin">
                                                <label class="toggle">

                                                    @if(in_array($data['id'],$permissions_checked_array))
                                                        <input checked="" type="checkbox" name="permissions[]" class=" employee_designation_details_checkbox" value="{{$data['id']}}" />
                                                    @else

                                                        <input  type="checkbox" name="permissions[]" class=" employee_designation_details_checkbox" value="{{$data['id']}}" />
                                                    @endif
                                                    <span class="slider"></span>
                                                </label>
                                                    <span class="route_name">{{$data['route_name']}}</span>
                                            </div>
                                        </div>

                                    @endif

                                @endforeach
                            </fieldset>

                            <?php if($hcm_status == false){ ?>

                                <style type="text/css">
                                    .hcm_class{

                                        border:none !important;    

                                    }
                                </style>
                            <?php } ?>
                            <fieldset class="permission_show_hide col-md-12" style="margin-top: 20px;">
                                <?php $admin_permissions_heading = 0; ?>
                                @foreach($permissions as $admin_permission)

                                    @if($admin_permission['sidebar_name'] == 'Permissions')

                                        @if($admin_permissions_heading == 0)
                                            <legend align="center">Admin Permissions</legend>

                                            <div class="row">
                                                <div class="col-md-12 toggle_margin">
                                                    <label class="toggle">
                                                        <input type="checkbox" name="" class="admin_permissions_select_all permissions_checkbox" value="" /> 
                                                        <span class="slider"></span>
                                                    </label>
                                                        <span class="route_name">Select All Admin Permissions</span>
                                                </div>
                                            </div>

                                            <?php $admin_permissions_heading++ ?>
                                        @endif

                                        <div class="row">
                                            
                                            <div class="col-md-12 toggle_margin">
                                                <label class="toggle">

                                                    @if(in_array($admin_permission['id'],$permissions_checked_array))
                                                        <input checked="" type="checkbox" name="permissions[]" class="admin_permissions_checkbox permissions_checkbox" value="{{$admin_permission['id']}}" />
                                                    @else

                                                        <input  type="checkbox" name="permissions[]" class="admin_permissions_checkbox permissions_checkbox" value="{{$admin_permission['id']}}" />
                                                    @endif
                                                    <span class="slider"></span>
                                                </label>
                                                <span class="route_name">{{$admin_permission['route_name']}}</span>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </fieldset>
                            <div class="ln_solid"></div>
                            <div class="item form-group col-md-12 " style="margin-top: 20px;">
                                <div class="col-md-7 col-sm-7 offset-md-5">
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
            },

            messages: {


                business_unit_id: {
                    required: "Please Select Your Business Unit Name",
                },

                user_id: {
                    required: "Please Select Your Employee Name",
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
                    url: "{{url('admin/user-details-for-permissions')}}"+'/'+unit_id,
                    success:function(resp){
                        $(".permission_show_hide").hide();
                        $(".loader_fixed").hide();
                        $(".user_details").html(resp);
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

                $(".user_details").html("<option value=''>Select Your Employee</option>");
            }
        })
    })
</script>
@if(!isset($user_details))
    <?php if(Auth::user()->role_id == '2'){ ?>
        <script type="text/javascript">
            $(function(){

                var id = "<?php echo  Auth::user()->unit_id ?>";

                if(id != ''){
                    $(".loader_fixed").show();
                    $.ajax({

                        type: "GET",
                        url: "{{url('admin/user-details-for-permissions')}}"+'/'+id,
                        success: function(resp){

                            if(resp != ''){
                                $(".permission_show_hide").hide();
                                $(".loader_fixed").hide();
                                $(".user_details").html(resp);

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
    <?php } ?>
@endif

@if(!isset($user_details))
    <script type="text/javascript">
        $(function(){

            var id = $( ".business_unit_id option:selected" ).val();

            if(id != ''){
                $(".loader_fixed").show();
                $.ajax({

                    type: "GET",
                    url: "{{url('admin/user-details-for-permissions')}}"+'/'+id,
                    success: function(resp){

                        if(resp != ''){
                            $(".permission_show_hide").hide();
                            $(".loader_fixed").hide();
                            $(".user_details").html(resp);

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
        $(".permissions_checkbox").prop("disabled",true);
        $(".permission_show_hide").hide();
        var role_id = $(".user_details").children("option:selected").attr('role_id');

        if(role_id == '3'){

            $(".permission_show_hide").hide();

        }else if(role_id == '2'){

            $(".permission_show_hide").show();

            $(".permissions_checkbox").prop("disabled",false);

            $(document).on('change','input[type="checkbox"]:not(.permissions_checkbox)',function(){

                if($('input[type="checkbox"]:checked:not(.permissions_checkbox)').length > 0){


                    $(".permissions_checkbox").prop("disabled",false);

                    $(".permissions_checkbox").prop("checked",true);

                }else{
                    $(".permissions_checkbox").prop("checked",false);

                    $(".permissions_checkbox").prop("disabled",true);

                }
            })

        }else{

            $(".permission_show_hide").hide();
        }

        $(document).on('change','.user_details',function(){

            var role_id = $(this).children("option:selected").attr('role_id');

            if(role_id == '3'){

                $(".permission_show_hide").hide();

            }else if(role_id == '2'){

                $(".permission_show_hide").show();

                $('input[type="checkbox"]:not(.permissions_checkbox)').change(function(){
                    if($('input[type="checkbox"]:checked:not(.permissions_checkbox)').length > 0){

                        $(".permissions_checkbox").prop("disabled",false);

                        $(".permissions_checkbox").prop("checked",true);
                    }else{

                        $(".permissions_checkbox").prop("checked",false);

                        $(".permissions_checkbox").prop("disabled",true);

                    }
                })

            }else{

                $(".permission_show_hide").hide();
            }

        })


    })

</script>
<script type="text/javascript">
    $(function(){

        $(".user_details_select_all").change(function(){


            if($(this).prop("checked") == true){

                $(".user_details_checkbox").prop("checked",true);

            }else{

                $(".user_details_checkbox").prop("checked",false);
            }
        });
        var user_details_unchecked = $(".user_details_checkbox").length
        $(".user_details_checkbox").click(function(){

            if($(this).prop("checked") == false){

                $(".user_details_select_all").prop("checked",false);

            }

            if(($(".user_details_checkbox:checked").length) == user_details_unchecked){

                $(".user_details_select_all").prop("checked",true);
            }
        })
    })
</script>
<script type="text/javascript">
    $(function(){

        $(".employee_details_select_all").change(function(){


            if($(this).prop("checked") == true){

                $(".employee_details_checkbox").prop("checked",true);

            }else{

                $(".employee_details_checkbox").prop("checked",false);
            }
        });
        var employee_details_unchecked = $(".employee_details_checkbox").length
        $(".employee_details_checkbox").click(function(){

            if($(this).prop("checked") == false){

                $(".employee_details_select_all").prop("checked",false);

            }

            if(($(".employee_details_checkbox:checked").length) == employee_details_unchecked){

                $(".employee_details_select_all").prop("checked",true);
            }
        })
    })
</script>

<script type="text/javascript">
    $(function(){

        $(".employee_personal_details_select_all").change(function(){


            if($(this).prop("checked") == true){

                $(".employee_personal_details_checkbox").prop("checked",true);

            }else{

                $(".employee_personal_details_checkbox").prop("checked",false);
            }
        });
        var employee_personal_details_unchecked = $(".employee_personal_details_checkbox").length
        $(".employee_personal_details_checkbox").click(function(){

            if($(this).prop("checked") == false){

                $(".employee_personal_details_select_all").prop("checked",false);

            }

            if(($(".employee_personal_details_checkbox:checked").length) == employee_personal_details_unchecked){

                $(".employee_personal_details_select_all").prop("checked",true);
            }
        })
    })
</script>
<script type="text/javascript">
    $(function(){

        $(".employee_personal_details_documents_select_all").change(function(){


            if($(this).prop("checked") == true){

                $(".employee_personal_documents_details_checkbox").prop("checked",true);

            }else{

                $(".employee_personal_documents_details_checkbox").prop("checked",false);
            }
        });
        var employee_personal_documents_details_unchecked = $(".employee_personal_documents_details_checkbox").length
        $(".employee_personal_documents_details_checkbox").click(function(){

            if($(this).prop("checked") == false){

                $(".employee_personal_details_documents_select_all").prop("checked",false);

            }

            if(($(".employee_personal_documents_details_checkbox:checked").length) == employee_personal_documents_details_unchecked){

                $(".employee_personal_details_documents_select_all").prop("checked",true);
            }
        })
    })
</script>
<script type="text/javascript">
    $(function(){

        $(".employee_resignation_details_select_all").change(function(){


            if($(this).prop("checked") == true){

                $(".employee_resignation_details_checkbox").prop("checked",true);

            }else{

                $(".employee_resignation_details_checkbox").prop("checked",false);
            }
        });
        var employee_resignation_details_unchecked = $(".employee_resignation_details_checkbox").length
        $(".employee_resignation_details_checkbox").click(function(){

            if($(this).prop("checked") == false){

                $(".employee_resignation_details_select_all").prop("checked",false);

            }

            if(($(".employee_resignation_details_checkbox:checked").length) == employee_resignation_details_unchecked){

                $(".employee_resignation_details_select_all").prop("checked",true);
            }
        })
    })
</script>
<script type="text/javascript">
    $(function(){

        $(".employee_after_joining_select_all").change(function(){


            if($(this).prop("checked") == true){

                $(".employee_after_joining_checkbox").prop("checked",true);

            }else{

                $(".employee_after_joining_checkbox").prop("checked",false);
            }
        });
        var employee_after_joining_unchecked = $(".employee_after_joining_checkbox").length
        $(".employee_after_joining_checkbox").click(function(){

            if($(this).prop("checked") == false){

                $(".employee_after_joining_select_all").prop("checked",false);

            }

            if(($(".employee_after_joining_checkbox:checked").length) == employee_after_joining_unchecked){

                $(".employee_after_joining_select_all").prop("checked",true);
            }
        })
    })
</script>

<script type="text/javascript">
    $(function(){

        $(".employee_previous_experience_select_all").change(function(){


            if($(this).prop("checked") == true){

                $(".employee_previous_experience_checkbox").prop("checked",true);

            }else{

                $(".employee_previous_experience_checkbox").prop("checked",false);
            }
        });
        var employee_previous_experience_unchecked = $(".employee_previous_experience_checkbox").length
        $(".employee_previous_experience_checkbox").click(function(){

            if($(this).prop("checked") == false){

                $(".employee_previous_experience_select_all").prop("checked",false);

            }

            if(($(".employee_previous_experience_checkbox:checked").length) == employee_previous_experience_unchecked){

                $(".employee_previous_experience_select_all").prop("checked",true);
            }
        })
    })
</script>

<script type="text/javascript">
    $(function(){

        $(".employee_increment_details_select_all").change(function(){


            if($(this).prop("checked") == true){

                $(".employee_increment_details_checkbox").prop("checked",true);

            }else{

                $(".employee_increment_details_checkbox").prop("checked",false);
            }
        });
        var employee_increment_details_unchecked = $(".employee_increment_details_checkbox").length
        $(".employee_increment_details_checkbox").click(function(){

            if($(this).prop("checked") == false){

                $(".employee_increment_details_select_all").prop("checked",false);

            }

            if(($(".employee_increment_details_checkbox:checked").length) == employee_increment_details_unchecked){

                $(".employee_increment_details_select_all").prop("checked",true);
            }
        })
    })
</script>

<script type="text/javascript">
    $(function(){

        $(".employee_complete_details_select_all").change(function(){


            if($(this).prop("checked") == true){

                $(".employee_complete_details_checkbox").prop("checked",true);

            }else{

                $(".employee_complete_details_checkbox").prop("checked",false);
            }
        });
        var employee_complete_details_unchecked = $(".employee_complete_details_checkbox").length
        $(".employee_complete_details_checkbox").click(function(){

            if($(this).prop("checked") == false){

                $(".employee_complete_details_select_all").prop("checked",false);

            }

            if(($(".employee_complete_details_checkbox:checked").length) == employee_complete_details_unchecked){

                $(".employee_complete_details_select_all").prop("checked",true);
            }
        })

        if(($(".employee_complete_details_checkbox:checked").length) == employee_complete_details_unchecked){

            $(".employee_complete_details_select_all").prop("checked",true);
        }
    })
</script>

<script type="text/javascript">
    $(function(){

        $(".employee_statutory_details_select_all").change(function(){


            if($(this).prop("checked") == true){

                $(".employee_statutory_details_checkbox").prop("checked",true);

            }else{

                $(".employee_statutory_details_checkbox").prop("checked",false);
            }
        });
        var employee_statutory_details_unchecked = $(".employee_statutory_details_checkbox").length
        $(".employee_statutory_details_checkbox").click(function(){

            if($(this).prop("checked") == false){

                $(".employee_statutory_details_select_all").prop("checked",false);

            }

            if(($(".employee_statutory_details_checkbox:checked").length) == employee_statutory_details_unchecked){

                $(".employee_statutory_details_select_all").prop("checked",true);
            }
        })

        if(($(".employee_statutory_details_checkbox:checked").length) == employee_statutory_details_unchecked){

            $(".employee_statutory_details_select_all").prop("checked",true);
        }
    })
</script>

<script type="text/javascript">
    $(function(){

        $(".it_asset_details_select_all").change(function(){


            if($(this).prop("checked") == true){

                $(".it_asset_details_checkbox").prop("checked",true);

            }else{

                $(".it_asset_details_checkbox").prop("checked",false);
            }
        });
        var it_asset_details_unchecked = $(".it_asset_details_checkbox").length
        $(".it_asset_details_checkbox").click(function(){

            if($(this).prop("checked") == false){

                $(".it_asset_details_select_all").prop("checked",false);

            }

            if(($(".it_asset_details_checkbox:checked").length) == it_asset_details_unchecked){

                $(".it_asset_details_select_all").prop("checked",true);
            }
        })

        if(($(".it_asset_details_checkbox:checked").length) == it_asset_details_unchecked){

            $(".it_asset_details_select_all").prop("checked",true);
        }
    })
</script>

<script type="text/javascript">
    $(function(){

        $(".business_unit_details_select_all").change(function(){


            if($(this).prop("checked") == true){

                $(".business_unit_details_checkbox").prop("checked",true);

            }else{

                $(".business_unit_details_checkbox").prop("checked",false);
            }
        });
        var business_unit_details_unchecked = $(".business_unit_details_checkbox").length
        $(".business_unit_details_checkbox").click(function(){

            if($(this).prop("checked") == false){

                $(".business_unit_details_select_all").prop("checked",false);

            }

            if(($(".business_unit_details_checkbox:checked").length) == business_unit_details_unchecked){

                $(".business_unit_details_select_all").prop("checked",true);
            }
        })

        if(($(".business_unit_details_checkbox:checked").length) == business_unit_details_unchecked){

            $(".business_unit_details_select_all").prop("checked",true);
        }
    })
</script>

<script type="text/javascript">
    $(function(){

        $(".employee_designation_details_select_all").change(function(){


            if($(this).prop("checked") == true){

                $(".employee_designation_details_checkbox").prop("checked",true);

            }else{

                $(".employee_designation_details_checkbox").prop("checked",false);
            }
        });
        var employee_designation_details_unchecked = $(".employee_designation_details_checkbox").length
        $(".employee_designation_details_checkbox").click(function(){

            if($(this).prop("checked") == false){

                $(".employee_designation_details_select_all").prop("checked",false);

            }

            if(($(".employee_designation_details_checkbox:checked").length) == employee_designation_details_unchecked){

                $(".employee_designation_details_select_all").prop("checked",true);
            }
        })

        if(($(".employee_designation_details_checkbox:checked").length) == employee_designation_details_unchecked){

            $(".employee_designation_details_select_all").prop("checked",true);
        }
    })
</script>


<script type="text/javascript">
    $(function(){

        $(".admin_permissions_select_all").change(function(){


            if($(this).prop("checked") == true){

                $(".admin_permissions_checkbox").prop("checked",true);

            }else{

                $(".admin_permissions_checkbox").prop("checked",false);
            }
        });
        var admin_permissions_unchecked = $(".admin_permissions_checkbox").length
        $(".admin_permissions_checkbox").click(function(){

            if($(this).prop("checked") == false){

                $(".admin_permissions_select_all").prop("checked",false);

            }

            if(($(".admin_permissions_checkbox:checked").length) == admin_permissions_unchecked){

                $(".admin_permissions_select_all").prop("checked",true);
            }
        })

        if(($(".admin_permissions_checkbox:checked").length) == admin_permissions_unchecked){

            $(".admin_permissions_select_all").prop("checked",true);
        }
    })
</script>
@endsection