@extends('backEnd.layouts.master')

@section('content')
<?php

    if(isset($leave_edit)){

        $url = url('admin/leave-edit/'.$leave_edit->id);
        $title = "Edit";
        $class = "edit_leave";

    }else{
        $url = url('admin/leave-add');
        $title = "Add";
        $class = "create_new_leave";
    }
 ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Create New Leave</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Create New Leave</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form method="post" action="{{$url}}"  data-parsley-validate class="{{$class}}">
                            @csrf
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="leave_type">Leave Type <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="leave_type" value="{{isset($leave_edit->leave_type) ? $leave_edit->leave_type : ''}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="status">
                                        <option value="">Select Status</option>
                                        <option <?php if(!empty($leave_edit->status)){ if($leave_edit->status == 'Active'){ echo "selected";} } ?> value="Active">Active</option>
                                        <option <?php if(!empty($leave_edit->status)){ if($leave_edit->status == 'Inactive'){ echo "selected";} } ?>  value="Inactive">Inactive</option>
                                        <option <?php if(!empty($leave_edit->status)){ if($leave_edit->status == 'Disabled'){ echo "selected";} } ?>  value="Disabled">Disabled</option>
                                    </select>
                                </div>
                            </div>
                           
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <button class="btn btn-primary" type="reset" >Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if(!isset($leave_edit))
    <script type="text/javascript">
        $(function(){

            $(".{{$class}}").validate({
                rules: {

                    leave_type: {
                        required:true
                    },
              
                    status: {
                        required:true,
                    },
                  
                },

                messages: {

                    leave_type: {
                        required: "Please Enter Your Leave Type",
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
@endif
@if(isset($leave_edit))
<script type="text/javascript">
    $(function(){
        var user_id = "{{$leave_edit->id}}";
        $(".{{$class}}").validate({
            rules: {

                leave_type: {
                    required:true
                },  
            },

            messages: {

                leave_type: {
                    required: "Please Enter Leave Type",
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
@endif
@endsection