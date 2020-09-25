@extends('backEnd.layouts.master')

@section('content')
<?php

    if(isset($designation_edit)){

        $url = url('admin/designation-management-edit/'.$designation_edit->id);
        $title = "Edit";
        $class = "designation_edit";

    }else{
        $url = url('admin/designation-management-add');
        $title = "Add";
        $class = "designation_add";
    }
 ?>
<div style="min-height: 600px;" class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Create New Designation</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Create New Designation</h2>
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
                                     
                                   <select class="form-control" name="business_unit_id">
                                        <option value="">Select Your Business Unit</option>
                                        @foreach($units as $data)
                                             <option <?php if(!empty($designation_edit->business_unit_id)){ if($data->id == $designation_edit->business_unit_id){ echo "selected"; }} ?> value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                   </select>
                                </div>
                            </div>
                            
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Designation Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="designation_name" value="{{isset($designation_edit->designation_name) ? $designation_edit->designation_name : '' }}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="level">Level Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="level" value="{{isset($designation_edit->level) ? $designation_edit->level : '' }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="status">
                                        <option value="">Select Status</option>
                                        <option <?php if(!empty($designation_edit)){ if($designation_edit->status == 'Active'){ echo "selected"; }} ?> value="Active">Active</option>
                                        <option <?php if(!empty($designation_edit)){ if($designation_edit->status == 'Inactive'){ echo "selected"; }} ?> value="Inactive">Inactive</option>
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

                designation_name: {
                    required:true
                },
                business_unit_id: {
                    required:true
                },
                level: {
                    required:true
                },
                status: {
                    required:true,
                },
            },

            messages: {

                business_unit_id: {
                    required: "Please Select Your Business Unit",
                },
                designation_name: {
                    required: "Please Enter Your Designation Name",
                },
                level: {
                    required: "Please Enter Your Level Name",
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

@endsection