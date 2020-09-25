@extends('backEnd.layouts.master')

@section('content')
<style type="text/css">
    .form-control:disabled, .form-control[readonly] {
        background-color: #fafafa;
        opacity: 1;
    }
</style>
<div class="right_col" role="main" style="min-height: 1100px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Employees Master's Details</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Employees Master's Details</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form method="post" action="" class="form_submit"  data-parsley-validate enctype="multipart/form-data">
                            @csrf
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="business_unit_id">Business Unit <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control business_unit_id" name="business_unit_id">
                                        <option value="">Select Business Unit</option>
                                        @foreach($units as $data)
                                        <option  value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div> 
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Employee Name<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                     
                                   <select class="form-control employee_master_users" name="user_id">
                                        <option value="">Select Your Employee</option>
                                   </select>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <button class="btn btn-primary reset" type="reset" >Cancel</button>
                                </div>
                            </div>
                        </form>
                        <div class="employee_data" >
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){

        $(".reset").click(function(){

            $(".employee_data").empty();
        })
    })
</script>
<script type="text/javascript">
    $(function(){

        $(".business_unit_id").change(function(){
            $(".employee_data").empty();
            var unit_id = $(this).val();

            if(unit_id != ''){
                $(".loader_fixed").show();
                $.ajax({
                    method: "get",
                    url: "{{url('admin/employee-master-users')}}"+'/'+unit_id,
                    success:function(resp){
                        $(".loader_fixed").hide();
                        $(".employee_master_users").html(resp);
                    }
                });
            }else if(unit_id == ''){

                $(".employee_master_users").html("<option value=''>Select Your Employee</option>");
            }
        })
    })
</script>
<script type="text/javascript">
    $(function(){

        var id = $( ".business_unit_id option:selected" ).val();

        if(id != ''){
            $(".loader_fixed").show();
            $.ajax({

                type: "GET",
                url: "{{url('admin/employee-master-users')}}"+'/'+id,
                success: function(resp){

                    if(resp != ''){
                        $(".loader_fixed").hide();
                        $(".employee_master_users").html(resp);

                    }

                },
            })
        }
    })
</script>
<script type="text/javascript">
    $(function(){

        $(".form_submit").validate({
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

                $(".loader_fixed").show();
                $.ajax({
                    type:"POST",
                    url: "{{url('admin/employee-master-user-details')}}",
                    data: $(form).serialize(),
                    success:function(resp){
                        if(resp != ''){


                            $(".loader_fixed").hide();
                            $(".employee_data").html(resp);

                            var $passport_size_images = $('.passport_size_images'); 
                            $passport_size_images.lightGallery(); 
                            $passport_size_images.data('lightGallery').destroy(true);         
                            $passport_size_images.lightGallery();

                            var $pan_card_div = $('.pan_card_div').lightGallery();
                            $pan_card_div.lightGallery(); 
                            $pan_card_div.data('lightGallery').destroy(true);         
                            $pan_card_div.lightGallery();

                            var $id_proof_passport_images = $('.id_proof_passport_images').lightGallery();
                            $id_proof_passport_images.lightGallery(); 
                            $id_proof_passport_images.data('lightGallery').destroy(true);         
                            $id_proof_passport_images.lightGallery();

                            var $id_proof_aadhaar_card_images = $('.id_proof_aadhaar_card_images').lightGallery();
                            $id_proof_aadhaar_card_images.lightGallery(); 
                            $id_proof_aadhaar_card_images.data('lightGallery').destroy(true);         
                            $id_proof_aadhaar_card_images.lightGallery();

                            var $tenth_div = $('.tenth_div').lightGallery();
                            $tenth_div.lightGallery(); 
                            $tenth_div.data('lightGallery').destroy(true);         
                            $tenth_div.lightGallery();

                            var $twelve_div = $('.twelve_div').lightGallery();
                            $twelve_div.lightGallery(); 
                            $twelve_div.data('lightGallery').destroy(true);         
                            $twelve_div.lightGallery();

                            var $other_qualification_img = $('.other_qualification_img').lightGallery();
                            $other_qualification_img.lightGallery(); 
                            $other_qualification_img.data('lightGallery').destroy(true);         
                            $other_qualification_img.lightGallery();

                            var $graduation_div = $('.graduation_div').lightGallery();
                            $graduation_div.lightGallery(); 
                            $graduation_div.data('lightGallery').destroy(true);         
                            $graduation_div.lightGallery();

                            var $post_graduation_div = $('.post_graduation_div').lightGallery();
                            $post_graduation_div.lightGallery(); 
                            $post_graduation_div.data('lightGallery').destroy(true);         
                            $post_graduation_div.lightGallery();

                            var $other_documents_img = $('.other_documents_img').lightGallery();
                            $other_documents_img.lightGallery(); 
                            $other_documents_img.data('lightGallery').destroy(true);         
                            $other_documents_img.lightGallery();
                        }

                    }
                })

                return false;
            }
        });
    })
</script>
@endsection