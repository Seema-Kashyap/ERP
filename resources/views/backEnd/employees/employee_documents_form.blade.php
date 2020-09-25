@extends('backEnd.layouts.master')

@section('content')
<?php

    if(isset($employee_documents_edit)){

        $url = url('admin/employee-personal-document-edit/'.$employee_documents_edit->id);
        $title = "Edit";
        $class = "employee_documents_edit";

    }else{
        $url = url('admin/employee-personal-document-add');
        $title = "Add";
        $class = "employee_documents_add";
    }
?>

<div style="min-height: 600px;" class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>{{$title}} Employee Documents</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{$title}} Employee Documents</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form method="post" action="{{$url}}"  data-parsley-validate class="{{$class}}" enctype="multipart/form-data">
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
                                     
                                   <select class="form-control employee_documents_details" name="user_id">
                                        <option value="">Select Your Employee</option>
                                        <?php if(!empty($user_unit)){
                                        ?>
                                        <option selected="selected"  value='{{$user_unit->id}}'><?php echo  ucfirst($user_unit->first_name).' '.ucfirst($user_unit->last_name)." ". "("." ".$user_unit->email." ".")"; ?></option>

                                        <?php } ?>
                                   </select>
                                </div>
                            </div>
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
                                    <input type="file" class="form-control img_upload_passport_images" name="passport_size_images[]" multiple accept=".jpg, .jpeg, .png" />
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
                                    <input type="file" class="form-control img_upload_pan_card" name="pan_card_image" accept=".jpg, .jpeg, .png">
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
                                    <input type="file" class="form-control passport_images_file_upload" name="passport_images[]" multiple accept=".jpg, .jpeg, .png" />
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
                                    <input type="file" class="form-control aadhaar_card_images_file_upload" name="aadhaar_card_images[]" multiple accept=".jpg, .jpeg, .png" />
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
                                    <input type="file" class="form-control img_upload_tenth" name="tenth_image" accept=".jpg, .jpeg, .png">
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
                                    <input type="file" class="form-control img_upload_twelve" name="twelve_image" accept=".jpg, .jpeg, .png">
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
                                    <input type="file" class="form-control img_upload_other_qualification_img" name="other_qualification_img[]" multiple accept=".jpg, .jpeg, .png" />
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
                                    <input type="file" class="form-control img_upload_graduation" name="graduation_image" accept=".jpg, .jpeg, .png">
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
                                    <input type="file" class="form-control img_upload_post_graduation" name="post_graduation_image" accept=".jpg, .jpeg, .png">
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
                                    <input type="file" class="form-control img_upload_other_documents_img" name="other_documents[]" multiple accept=".jpg, .jpeg, .png" />
                                </div>
                            </div>                                                    
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="status">
                                        <option value="">Select Status</option>
                                        <option <?php if(!empty($employee_documents_edit->status)){ if($employee_documents_edit->status == 'Active'){ echo "selected";} } ?> value="Active">Active</option>
                                        <option <?php if(!empty($employee_documents_edit->status)){ if($employee_documents_edit->status == 'Inactive'){ echo "selected";} } ?>  value="Inactive">Inactive</option>
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
    $(function(){

        $(".employee_documents_edit").validate({
            rules: {

                business_unit_id: {
                    required:true
                },

                user_id: {
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
@if(!isset($employee_documents_edit))
    <script type="text/javascript">
        $(function(){
            $(".employee_documents_add").validate({
                rules: {

                    business_unit_id: {
                        required:true
                    },

                    user_id: {
                        required:true
                    },
                    status: {
                        required:true,
                    },

                    "passport_size_images[]": {
                        required:true
                    },

                    pan_card_image: {
                        required:true,
                    },
                    "aadhaar_card_images[]": {
                        required:true
                    },
                    tenth_image: {
                        required:true,
                    },
                    twelve_image: {
                        required:true,
                    },
                    graduation_image: {
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
                    status: {

                        required: "Please Select Your Status",
                    },

                    "passport_size_images[]": {
                        required: "Please Select Four Passport Images To Upload",
                    },
                    pan_card_image: {

                        required: "Please Select Pan Card Image To Upload",
                    },
                    "aadhaar_card_images[]": {
                        required: "Please Select Aadhaar Card Images To Upload",
                    },
                    tenth_image: {

                        required: "Please Select 10th Qualification Image To Upload",
                    },
                    twelve_image: {

                        required: "Please Select 12th Qualification Image To Upload",
                    },
                    graduation_image: {

                        required: "Please Select Graduation Image To Upload",
                    },

                },
                submitHandler: function(form) {
                
                form.submit();
                }
            });
        })
    </script>
@endif

<script type="text/javascript">
    $(function(){

        $(".business_unit_id").change(function(){

            var unit_id = $(this).val();

            if(unit_id != ''){
                $(".loader_fixed").show();
                $.ajax({
                    method: "get",
                    url: "{{url('admin/user-details-documents-details')}}"+'/'+unit_id,
                    success:function(resp){
                        $(".loader_fixed").hide();
                        $(".employee_documents_details").html(resp);
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

                $(".employee_documents_details").html("<option value=''>Select Your Employee</option>");
            }
        })
    })
</script>
@if(!isset($employee_documents_edit))
    <script type="text/javascript">
        $(function(){

            var id = $( ".business_unit_id option:selected" ).val();

            if(id != ''){
                $(".loader_fixed").show();
                $.ajax({

                    type: "GET",
                    url: "{{url('admin/user-details-documents-details')}}"+'/'+id,
                    success: function(resp){

                        if(resp != ''){
                            $(".loader_fixed").hide();
                            $(".employee_documents_details").html(resp);

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

        $('.passport_size_images').lightGallery();

        $('.pan_card_div').lightGallery();

        $('.id_proof_passport_images').lightGallery();

        $('.id_proof_aadhaar_card_images').lightGallery();

        $('.tenth_div').lightGallery();

        $('.twelve_div').lightGallery();

        $('.other_qualification_img').lightGallery();

        $('.graduation_div').lightGallery();

        $('.post_graduation_div').lightGallery();

        $('.other_documents_img').lightGallery();
    })
</script>
@endsection