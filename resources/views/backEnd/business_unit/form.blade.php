@extends('backEnd.layouts.master')

@section('content')
<?php

    if(isset($business_unit_edit)){

        $url = url('admin/business-management-edit/'.$business_unit_edit->id);
        $title = "Edit";
        $class = "business_unit_edit";

    }else{
        $url = url('admin/business-management-add');
        $title = "Add";
        $class = "business_unit_add";
    }
 ?>
<div style="min-height: 600px;" class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Create New Unit</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Create New Unit</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form method="post" action="{{$url}}"  data-parsley-validate class="{{$class}}">
                            @csrf
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Unit Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="name" value="{{isset($business_unit_edit->name) ? $business_unit_edit->name : '' }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Unit Url <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="business_unit_url" value="{{isset($business_unit_edit->business_unit_url) ? $business_unit_edit->business_unit_url : '' }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="status">
                                        <option value="">Select Status</option>
                                        <option <?php if(!empty($business_unit_edit)){ if($business_unit_edit->status == 'Active'){ echo "selected"; }} ?> value="Active">Active</option>
                                        <option <?php if(!empty($business_unit_edit)){ if($business_unit_edit->status == 'Inactive'){ echo "selected"; }} ?> value="Inactive">Inactive</option>
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

                name: {
                    required:true
                },
                business_unit_url: {
                    required:true
                },
                status: {
                    required:true,
                },
            },

            messages: {

                name: {
                    required: "Please Enter Your  Business Unit Name",
                },
                business_unit_url: {
                    required: "Please Enter Your  Business Unit Url",
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