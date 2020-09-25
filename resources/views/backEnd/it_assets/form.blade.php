@extends('backEnd.layouts.master')

@section('content')
<?php

    if(isset($asset_edit)){

        $url = url('admin/asset-edit/'.$asset_edit->id);
        $title = "Edit";
        $class = "asset_edit";

    }else{
        $url = url('admin/asset-add');
        $title = "Add";
        $class = "asset_add";
    }
?>
<div style="min-height: 600px;" class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>{{$title}} Asset Detail</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{$title}} Asset Detail</h2>
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
                            
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Asset Issued</label>
                                <div class="col-md-6 col-sm-6 ">
                                     <input type="text" class="form-control" name="asset_issued" value="{{isset($asset_edit->asset_issued) ? $asset_edit->asset_issued : '' }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Asset Serial No.</label>
                                <div class="col-md-6 col-sm-6 ">
                                     <input type="text" class="form-control " name="asset_serial_no" value="{{isset($asset_edit->asset_serial_no) ? $asset_edit->asset_serial_no : '' }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Asset Date of Issue</label>
                                <div class="col-md-6 col-sm-6 ">
                                     <input type="text" class="form-control asset_date_issued" name="asset_date_issued" value="{{isset($asset_edit->asset_date_issued) ? $asset_edit->asset_date_issued : '' }}" placeholder="YYYY-MM-DD">
                                </div>
                            </div>   

                             <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Asset Remarks</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea  class="form-control " name="asset_remarks">{{isset($asset_edit->asset_remarks) ? $asset_edit->asset_remarks : '' }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="status">
                                        <option value="">Select Status</option>
                                        <option <?php if(!empty($asset_edit->status)){ if($asset_edit->status == 'Active'){ echo "selected";} } ?> value="Active">Active</option>
                                        <option <?php if(!empty($asset_edit->status)){ if($asset_edit->status == 'Inactive'){ echo "selected";} } ?>  value="Inactive">Inactive</option>
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

                asset_issued: {
                    required:true
                },

                asset_serial_no: {
                    required:true
                },

                asset_date_issued: {
                    required:true
                },

                asset_remarks: {
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

                asset_issued: {
                    required: "Please Enter Your Asset Issued Name",
                },

                asset_serial_no: {
                    required: "Please Enter Your Asset Serial No.",
                },

                asset_date_issued: {
                    required: "Please Enter Your Asset Date Issued",
                },

                asset_remarks: {
                    required: "Please Enter Your Asset Remarks",
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
                    url: "{{url('admin/user-details-assets')}}"+'/'+unit_id,
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

@if(!isset($asset_edit))
    <script type="text/javascript">
        $(function(){

            var id = $( ".business_unit_id option:selected" ).val();

            if(id != ''){
                $(".loader_fixed").show();
                $.ajax({

                    type: "GET",
                    url: "{{url('admin/user-details-assets')}}"+'/'+id,
                    success: function(resp){

                        if(resp != ''){
                            $(".loader_fixed").hide();
                            $(".employee_details").html(resp);

                        }

                    },


                })
            }
        })
    </script>
@endif

<script type="text/javascript">
    $(function(){

        $('.asset_date_issued').datetimepicker({
            format: 'YYYY-MM-DD',
            maxDate: moment(),
        });

   

        <?php if(!empty($asset_edit)){ ?>
                var asset_date_issued = "{{$asset_edit->asset_date_issued}}";

                $(".asset_date_issued").val(asset_issued);

            <?php }else{ ?>

                $(".asset_date_issued").val("");
        <?php } ?>      
    })
</script>
@endsection