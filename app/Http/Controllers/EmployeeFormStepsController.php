<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State, App\User, App\EmployeeDetail, App\City, App\EmployeePersonalDetail, App\EmployeeDocument, App\PreviousYearExperience;

class EmployeeFormStepsController extends Controller
{
    public function employee_personal_detail_form_step_1(Request $request, $user_id, $security_code){

        $decoded_user_id       = base64_decode(urldecode($user_id));
        $decoded_security_code = base64_decode(urldecode($security_code));


        $user_details = User::where('id',$decoded_user_id)
                            ->where('security_code',$decoded_security_code)
                            ->first();

        if(empty($user_details)){

        	return redirect("/")->with('error',"Link Has Been Expired Or Invalid");
        }

        $employee_edit  = EmployeeDetail::where('user_id',$user_details->id)->first();

        $india_states   = State::where('country_id','101')
                                ->get();

        if(!empty($employee_edit)){

        	$cities         = City::where('state_id',$employee_edit->emp_state)->get();
        }else{

        	$cities = "";
        }


        if($request->isMethod('post')){

        	if(!empty($employee_edit)){

        		$employee_edit->user_id 			= $user_details->id;
	            $employee_edit->emp_marital_status	= $request->emp_marital_status;
	          	$employee_edit->emp_doj	  			= $request->emp_doj;
	            $employee_edit->emp_formality		= $request->emp_formality;
	            $employee_edit->emp_dob  			= $request->emp_dob;
	            $employee_edit->emp_age  			= $request->emp_age;
	            $employee_edit->emp_blood_group		= $request->emp_blood_group;
	            $employee_edit->emp_addr_one  		= $request->emp_addr_one;
	            $employee_edit->emp_addr_second  	= $request->emp_addr_second;
	            $employee_edit->emp_city  			= $request->emp_city;
	            $employee_edit->emp_state  			= $request->emp_state;
	            $employee_edit->emp_pincode 		= $request->emp_pincode;
	            $employee_edit->emp_status 			= "Active";

	            if($employee_edit->save()){

	                return redirect("employee-personal-form/".$user_id."/".$security_code.
	                	"/step-2")->with('success',"Your Personal Details Step 1 Updated Successfully");
	            }else{

	    			return redirect()->back()->with('error',COMMON_ERROR);
	    		}


        	}else{

	        	$new_employee          				= new EmployeeDetail;
	            $new_employee->user_id 				= $user_details->id;
	            $new_employee->emp_marital_status	= $request->emp_marital_status;
	          	$new_employee->emp_doj	  			= $request->emp_doj;
	            $new_employee->emp_formality		= $request->emp_formality;
	            $new_employee->emp_dob  			= $request->emp_dob;
	            $new_employee->emp_age  			= $request->emp_age;
	            $new_employee->emp_blood_group		= $request->emp_blood_group;
	            $new_employee->emp_addr_one  		= $request->emp_addr_one;
	            $new_employee->emp_addr_second  	= $request->emp_addr_second;
	            $new_employee->emp_city  			= $request->emp_city;
	            $new_employee->emp_state  			= $request->emp_state;
	            $new_employee->emp_pincode 			= $request->emp_pincode;
	            $new_employee->emp_status 			= "Active";

	            if($new_employee->save()){

	                return redirect("employee-personal-form/".$user_id."/".$security_code.
	                	"/step-2")->with('success',"Your Personal Details Step 1 Added Successfully");
	            }else{

	    			return redirect()->back()->with('error',COMMON_ERROR);
	    		}

        	}

        }

        return view("employee_form_steps.employee_form_step_1",compact('india_states','employee_edit','cities'));

    }

    public function employee_personal_detail_form_step_2(Request $request, $user_id, $security_code){

    	$decoded_user_id       = base64_decode(urldecode($user_id));
        $decoded_security_code = base64_decode(urldecode($security_code));

		$user_details = User::where('id',$decoded_user_id)
                            ->where('security_code',$decoded_security_code)
                            ->first();

        $employee_personal_details_edit  = EmployeePersonalDetail::where('user_id',$user_details->id)->first();

        if(empty($user_details)){

        	return redirect("/")->with('error',"Link Has Been Expired Or Invalid");
        }                    


        if($request->isMethod('post')){


        	if(!empty($employee_personal_details_edit)){

	            $employee_personal_details_edit->user_id 							= $user_details->id;
	            $employee_personal_details_edit->emp_ctc_appointment 				= $request->emp_ctc_appointment ;
	            $employee_personal_details_edit->emp_father_name  					= $request->emp_father_name;
	            $employee_personal_details_edit->emp_father_dob						= $request->emp_father_dob;
	          	$employee_personal_details_edit->emp_mother_name	  					= $request->emp_mother_name;
	            $employee_personal_details_edit->emp_mother_dob						= $request->emp_mother_dob;
	            $employee_personal_details_edit->emp_spouse_name  					= $request->emp_spouse_name;
	            $employee_personal_details_edit->emp_spouse_dob  					= $request->emp_spouse_dob;
	            $employee_personal_details_edit->emp_child_name						= implode(",", $request->emp_child_name);
	            $employee_personal_details_edit->emp_child_dob  						= implode(",", $request->emp_child_dob);
	            $employee_personal_details_edit->emp_emer_con_person 				= $request->emp_emer_con_person;
	            $employee_personal_details_edit->emp_emer_con_no 					= $request->emp_emer_con_no;
	            $employee_personal_details_edit->emp_tenth_qualification 			= $request->emp_tenth_qualification;
	            $employee_personal_details_edit->emp_twelve_qualification			= $request->emp_twelve_qualification;
	            $employee_personal_details_edit->emp_graduation_qualification		= $request->emp_graduation_qualification;
	            $employee_personal_details_edit->emp_post_graduation_qualification	= $request->emp_post_graduation_qualification;
	            $employee_personal_details_edit->emp_additional_qualification		= $request->emp_additional_qualification;
	            $employee_personal_details_edit->emp_pancard_no						= $request->emp_pancard_no;
	            $employee_personal_details_edit->emp_passport_no					= $request->emp_passport_no;
	            $employee_personal_details_edit->emp_adhaar_card_no					= $request->emp_adhaar_card_no;
	            $employee_personal_details_edit->emp_other_information				= $request->emp_other_information;
	            $employee_personal_details_edit->status								= "Active";

	            if($employee_personal_details_edit->save()){

	                return redirect("employee-personal-form/".$user_id."/".$security_code.
		                	"/step-3")->with('success',"Your Personal Details Step 2 Updated Successfully");
	            }else{

	    			return redirect()->back()->with('error',COMMON_ERROR);
	    		}

        	}else{

	            $new_employee_personal_details 										= new EmployeePersonalDetail;

	            $new_employee_personal_details->user_id 							= $user_details->id;

	            $new_employee_personal_details->emp_ctc_appointment 				= $request->emp_ctc_appointment ;
	            $new_employee_personal_details->emp_father_name  					= $request->emp_father_name;
	            $new_employee_personal_details->emp_father_dob						= $request->emp_father_dob;
	          	$new_employee_personal_details->emp_mother_name	  					= $request->emp_mother_name;
	            $new_employee_personal_details->emp_mother_dob						= $request->emp_mother_dob;
	            $new_employee_personal_details->emp_spouse_name  					= $request->emp_spouse_name;
	            $new_employee_personal_details->emp_spouse_dob  					= $request->emp_spouse_dob;
	            $new_employee_personal_details->emp_child_name						= implode(",", $request->emp_child_name);
	            $new_employee_personal_details->emp_child_dob  						= implode(",", $request->emp_child_dob);
	            $new_employee_personal_details->emp_emer_con_person 				= $request->emp_emer_con_person;
	            $new_employee_personal_details->emp_emer_con_no 					= $request->emp_emer_con_no;
	            $new_employee_personal_details->emp_tenth_qualification 			= $request->emp_tenth_qualification;
	            $new_employee_personal_details->emp_twelve_qualification			= $request->emp_twelve_qualification;
	            $new_employee_personal_details->emp_graduation_qualification		= $request->emp_graduation_qualification;
	            $new_employee_personal_details->emp_post_graduation_qualification	= $request->emp_post_graduation_qualification;
	            $new_employee_personal_details->emp_additional_qualification		= $request->emp_additional_qualification;
	            $new_employee_personal_details->emp_pancard_no						= $request->emp_pancard_no;
	            $new_employee_personal_details->emp_passport_no						= $request->emp_passport_no;
	            $new_employee_personal_details->emp_adhaar_card_no					= $request->emp_adhaar_card_no;
	            $new_employee_personal_details->emp_other_information				= $request->emp_other_information;
	            $new_employee_personal_details->status								= "Active";

	            if($new_employee_personal_details->save()){

	                return redirect("employee-personal-form/".$user_id."/".$security_code.
		                	"/step-3")->with('success',"Your Personal Details Step 2 Added Successfully");
	            }else{

	    			return redirect()->back()->with('error',COMMON_ERROR);
	    		}
        	}

        }


        return view("employee_form_steps.employee_form_step_2",compact('user_id','security_code','employee_personal_details_edit'));

    }

    public function employee_personal_detail_form_step_3(Request $request, $user_id, $security_code){

    	$decoded_user_id       = base64_decode(urldecode($user_id));
        $decoded_security_code = base64_decode(urldecode($security_code));

		$user_details = User::where('id',$decoded_user_id)
                            ->where('security_code',$decoded_security_code)
                            ->first();

        if(empty($user_details)){

        	return redirect("/")->with('error',"Link Has Been Expired Or Invalid");
        }                    

        $employee_documents_edit = EmployeeDocument::where('user_id',$user_details->id)->first();

        // echo "<pre>"; print_r($employee_documents_edit); die;                  

        if($request->isMethod('post')){

            // echo "<pre>"; print_r($_FILES); die;

            if(!empty($employee_documents_edit)){


	            $employee_documents_edit->user_id        = $user_details->id;
	            $employee_documents_edit->status         = "Active";

	            // Passport Size Images Files Upload
	            if(!empty($_FILES['passport_size_images']['name'][0])){

	                foreach($_FILES['passport_size_images']['name'] as $i => $name){

	                    $tmp_name             = $_FILES['passport_size_images']['tmp_name'][$i];

	                    $passport_size_images = pathinfo($_FILES['passport_size_images']['name'][$i]);

	                    $ext                  = $passport_size_images['extension'];
	                    $passport_images[]    = uniqid(rand(), true).'.'.$ext;

	                    if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg'|| $ext == 'JPG'){

	                        $file_path = base_path().'/'.employeePassportImageBasePath;

	                        if(move_uploaded_file($tmp_name, $file_path.'/'.$passport_images[$i])){


	                            if(File::exists($file_path.'/'.$passport_images[$i])){

	                                $emp_imgs = explode(",",$employee_documents_edit->emp_img);
	                                foreach ($emp_imgs as $key => $value) {
	                                    File::delete($file_path.'/'.$value);
	                                }

	                            }
	                        }
	                    }

	                }
	                if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg'|| $ext == 'JPG'){
	                    $employee_documents_edit->emp_img = implode(",",$passport_images);
	                }
	                
	            }
	            // Pan Card Image Upload
	            if(!empty($_FILES['pan_card_image']['name'])){

	                $pan_card_image  = pathinfo($_FILES['pan_card_image']['name']);
	                $ext             = $pan_card_image['extension'];
	                $pan_card        = uniqid(rand(), true).'.'.$ext;

	                if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg'|| $ext == 'JPG'){

	                    $file_path = base_path().'/'.employeePancardImageBasePath;

	                    if(move_uploaded_file($_FILES['pan_card_image']['tmp_name'], $file_path.'/'.$pan_card)){

	                        if(File::exists($file_path.'/'.$pan_card)){

	                            File::delete($file_path.'/'.$employee_documents_edit->emp_pan_card);
	                        }
	                    }

	                    $employee_documents_edit->emp_pan_card = $pan_card; 
	                }
	            }
	            // Passport Images Upload
	            if(!empty($_FILES['passport_images']['name'][0])){

	                foreach($_FILES['passport_images']['name'] as $i => $name){

	                    $tmp_name        = $_FILES['passport_images']['tmp_name'][$i];

	                    $passport_images = pathinfo($_FILES['passport_images']['name'][$i]);

	                    $ext             = $passport_images['extension'];
	                    $p_imgs[]        = uniqid(rand(), true).'.'.$ext;

	                    if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg'|| $ext == 'JPG'){

	                        $file_path = base_path().'/'.employeePassportImagesBasePath;

	                        if(move_uploaded_file($tmp_name, $file_path.'/'.$p_imgs[$i])){


	                            if(File::exists($file_path.'/'.$p_imgs[$i])){

	                                $emp_passport = explode(",",$employee_documents_edit->emp_passport);
	                                foreach ($emp_passport as $key => $value) {
	                                    File::delete($file_path.'/'.$value);
	                                }

	                            }
	                        }
	                    }
	                }
	                if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg'|| $ext == 'JPG'){
	                    $employee_documents_edit->emp_passport  = implode(",",$p_imgs);
	                }
	            }
	            // Aadhaar Card Images Upload
	            if(!empty($_FILES['aadhaar_card_images']['name'][0])){

	                foreach($_FILES['aadhaar_card_images']['name'] as $i => $name){

	                    $tmp_name                    = $_FILES['aadhaar_card_images']['tmp_name'][$i];

	                    $aadhaar_card_images         = pathinfo($_FILES['aadhaar_card_images']['name'][$i]);

	                    $ext                         = $aadhaar_card_images['extension'];
	                    $aadhaar_card_images_array[] = uniqid(rand(), true).'.'.$ext;

	                    if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg'|| $ext == 'JPG'){

	                        $file_path = base_path().'/'.employeeAadhaarCardImagesBasePath;

	                        if(move_uploaded_file($tmp_name, $file_path.'/'.$aadhaar_card_images_array[$i])){

	                            if(File::exists($file_path.'/'.$aadhaar_card_images_array[$i])){

	                                $emp_aadhaar_card = explode(",",$employee_documents_edit->emp_aadhaar_card);
	                                foreach ($emp_aadhaar_card as $key => $value) {
	                                    File::delete($file_path.'/'.$value);
	                                }

	                            }
	                        }
	                    }
	                }
	                if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg'|| $ext == 'JPG'){
	                    $employee_documents_edit->emp_aadhaar_card  = implode(",",$aadhaar_card_images_array);
	                }
	            }
	            // 10th Qualification Image Upload
	            if(!empty($_FILES['tenth_image']['name'])){

	                $tenth_image        = pathinfo($_FILES['tenth_image']['name']);
	                $ext                = $tenth_image['extension'];
	                $tenth_image_new    = uniqid(rand(), true).'.'.$ext;

	                if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg'|| $ext == 'JPG'){

	                    $file_path = base_path().'/'.tenthQualificationImageBasePath;

	                    // echo "<pre>"; print_r($file_path); die;

	                    if(move_uploaded_file($_FILES['tenth_image']['tmp_name'], $file_path.'/'.$tenth_image_new)){

	                        if(File::exists($file_path.'/'.$tenth_image_new)){

	                            File::delete($file_path.'/'.$employee_documents_edit->emp_tenth_qualification_img);
	                        }
	                    }

	                    $employee_documents_edit->emp_tenth_qualification_img = $tenth_image_new; 
	                }
	            }
	            // 12th Qualification Image Upload
	            if(!empty($_FILES['twelve_image']['name'])){

	                $twelve_image        = pathinfo($_FILES['twelve_image']['name']);
	                $ext                 = $twelve_image['extension'];
	                $twelve_image_new    = uniqid(rand(), true).'.'.$ext;

	                if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg'|| $ext == 'JPG'){

	                    $file_path = base_path().'/'.twelveQualificationImageBasePath;

	                    // echo "<pre>"; print_r($file_path); die;

	                    if(move_uploaded_file($_FILES['twelve_image']['tmp_name'], $file_path.'/'.$twelve_image_new)){

	                        if(File::exists($file_path.'/'.$twelve_image_new)){

	                            File::delete($file_path.'/'.$employee_documents_edit->emp_twelve_qualification_img);
	                        }
	                    }

	                    $employee_documents_edit->emp_twelve_qualification_img = $twelve_image_new; 
	                }
	            }
	            // Other Qualification Img
	            if(!empty($_FILES['other_qualification_img']['name'][0])){

	                foreach($_FILES['other_qualification_img']['name'] as $i => $name){

	                    $tmp_name                           = $_FILES['other_qualification_img']['tmp_name'][$i];

	                    $other_qualification_images         = pathinfo($_FILES['other_qualification_img']['name'][$i]);

	                    $ext                                = $other_qualification_images['extension'];
	                    $other_qualification_images_array[] = uniqid(rand(), true).'.'.$ext;

	                    if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg'|| $ext == 'JPG'){

	                        $file_path = base_path().'/'.otherQualificationImageBasePath;

	                        if(move_uploaded_file($tmp_name, $file_path.'/'.$other_qualification_images_array[$i])){

	                            if(File::exists($file_path.'/'.$other_qualification_images_array[$i])){

	                                $emp_other_qualification_img = explode(",",$employee_documents_edit->emp_other_qualification_img);

	                                foreach ($emp_other_qualification_img as $key => $value) {

	                                    File::delete($file_path.'/'.$value);
	                                }

	                            }
	                        }
	                    }
	                }
	                if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg'|| $ext == 'JPG'){
	                    $employee_documents_edit->emp_other_qualification_img  = implode(",",$other_qualification_images_array);
	                }
	            }
	            // Graduation Image Upload
	            if(!empty($_FILES['graduation_image']['name'])){

	                $graduation_image        = pathinfo($_FILES['graduation_image']['name']);
	                $ext                     = $graduation_image['extension'];
	                $graduation_image_new    = uniqid(rand(), true).'.'.$ext;

	                if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg'|| $ext == 'JPG'){

	                    $file_path = base_path().'/'.graduationImageBasePath;

	                    // echo "<pre>"; print_r($file_path); die;

	                    if(move_uploaded_file($_FILES['graduation_image']['tmp_name'], $file_path.'/'.$graduation_image_new)){

	                        if(File::exists($file_path.'/'.$graduation_image_new)){

	                            File::delete($file_path.'/'.$employee_documents_edit->emp_graduation_img);
	                        }

	                    }

	                    $employee_documents_edit->emp_graduation_img = $graduation_image_new; 
	                }
	            }

	            // Post Graduation Image Upload
	            if(!empty($_FILES['post_graduation_image']['name'])){

	                $post_graduation_image        = pathinfo($_FILES['post_graduation_image']['name']);
	                $ext                          = $post_graduation_image['extension'];
	                $post_graduation_image_new    = uniqid(rand(), true).'.'.$ext;

	                if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg'|| $ext == 'JPG'){

	                    $file_path = base_path().'/'.postGraduationImageBasePath;

	                    if(move_uploaded_file($_FILES['post_graduation_image']['tmp_name'], $file_path.'/'.$post_graduation_image_new)){

	                        if(File::exists($file_path.'/'.$post_graduation_image_new)){

	                            File::delete($file_path.'/'.$employee_documents_edit->emp_post_graduation_img);
	                        }
	                    }

	                    $employee_documents_edit->emp_post_graduation_img = $post_graduation_image_new; 
	                }
	            }
	            // Other Documents Images Upload
	            if(!empty($_FILES['other_documents']['name'][0])){

	                foreach($_FILES['other_documents']['name'] as $i => $name){

	                    $tmp_name           = $_FILES['other_documents']['tmp_name'][$i];

	                    $other_documents    = pathinfo($_FILES['other_documents']['name'][$i]);

	                    $ext                = $other_documents['extension'];
	                    $other_documents_array[]  = uniqid(rand(), true).'.'.$ext;

	                    if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg'|| $ext == 'JPG'){

	                        $file_path = base_path().'/'.otherDocumentsImageBasePath;

	                        if(move_uploaded_file($tmp_name, $file_path.'/'.$other_documents_array[$i])){

	                            if(File::exists($file_path.'/'.$other_documents_array[$i])){

	                                $emp_other = explode(",",$employee_documents_edit->emp_other);
	                                
	                                foreach ($emp_other as $key => $value) {

	                                    File::delete($file_path.'/'.$value);
	                                }

	                            }
	                        }
	                    }
	                }
	                if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg'|| $ext == 'JPG'){
	                    $employee_documents_edit->emp_other  = implode(",",$other_documents_array);
	                }
	            }

	            if($employee_documents_edit->save()){

	                return redirect("employee-personal-form/".$user_id."/".$security_code.
		                	"/step-4")->with('success',"Your Personal Documents Upload Step 3 Updated Successfully");

	            }else{

	                return redirect()->back()->with('error',COMMON_ERROR);
	            }


            }else{

	            $new_employee_documents                 = new EmployeeDocument;
	            $new_employee_documents->user_id        = $user_details->id;
	            $new_employee_documents->status        	= "Active";


	            // Passport Size Images Files Upload
	            if(!empty($_FILES['passport_size_images']['name'][0])){

	                foreach($_FILES['passport_size_images']['name'] as $i => $name){

	                    $tmp_name             = $_FILES['passport_size_images']['tmp_name'][$i];

	                    $passport_size_images = pathinfo($_FILES['passport_size_images']['name'][$i]);

	                    $ext                  = $passport_size_images['extension'];
	                    $passport_images[]    = uniqid(rand(), true).'.'.$ext;

	                    if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg'|| $ext == 'JPG'){

	                        $file_path = base_path().'/'.employeePassportImageBasePath;

	                        move_uploaded_file($tmp_name, $file_path.'/'.$passport_images[$i]);
	                    }

	                }
	                if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg'|| $ext == 'JPG'){
	                    $new_employee_documents->emp_img = implode(",",$passport_images);
	                }
	                
	            }
	            // Pan Card Image Upload
	            if(!empty($_FILES['pan_card_image']['name'])){

	                $pan_card_image  = pathinfo($_FILES['pan_card_image']['name']);
	                $ext             = $pan_card_image['extension'];
	                $pan_card        = uniqid(rand(), true).'.'.$ext;

	                if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg'|| $ext == 'JPG'){

	                    $file_path = base_path().'/'.employeePancardImageBasePath;

	                    move_uploaded_file($_FILES['pan_card_image']['tmp_name'], $file_path.'/'.$pan_card);

	                    $new_employee_documents->emp_pan_card = $pan_card; 
	                }
	            }
	            // Passport Images Upload
	            if(!empty($_FILES['passport_images']['name'][0])){

	                foreach($_FILES['passport_images']['name'] as $i => $name){

	                    $tmp_name        = $_FILES['passport_images']['tmp_name'][$i];

	                    $passport_images = pathinfo($_FILES['passport_images']['name'][$i]);

	                    $ext             = $passport_images['extension'];
	                    $p_imgs[]        = uniqid(rand(), true).'.'.$ext;

	                    if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg'|| $ext == 'JPG'){

	                        $file_path = base_path().'/'.employeePassportImagesBasePath;

	                        move_uploaded_file($tmp_name, $file_path.'/'.$p_imgs[$i]);
	                    }
	                }
	                if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg'|| $ext == 'JPG'){
	                    $new_employee_documents->emp_passport  = implode(",",$p_imgs);
	                }
	            }
	            // Aadhaar Card Images Upload
	            if(!empty($_FILES['aadhaar_card_images']['name'][0])){

	                foreach($_FILES['aadhaar_card_images']['name'] as $i => $name){

	                    $tmp_name                    = $_FILES['aadhaar_card_images']['tmp_name'][$i];

	                    $aadhaar_card_images         = pathinfo($_FILES['aadhaar_card_images']['name'][$i]);

	                    $ext                         = $aadhaar_card_images['extension'];
	                    $aadhaar_card_images_array[] = uniqid(rand(), true).'.'.$ext;

	                    if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg'|| $ext == 'JPG'){

	                        $file_path = base_path().'/'.employeeAadhaarCardImagesBasePath;

	                        move_uploaded_file($tmp_name, $file_path.'/'.$aadhaar_card_images_array[$i]);
	                    }
	                }
	                if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg'|| $ext == 'JPG'){
	                    $new_employee_documents->emp_aadhaar_card  = implode(",",$aadhaar_card_images_array);
	                }
	            }
	            // 10th Qualification Image Upload
	            if(!empty($_FILES['tenth_image']['name'])){

	                $tenth_image        = pathinfo($_FILES['tenth_image']['name']);
	                $ext                = $tenth_image['extension'];
	                $tenth_image_new    = uniqid(rand(), true).'.'.$ext;

	                if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg'|| $ext == 'JPG'){

	                    $file_path = base_path().'/'.tenthQualificationImageBasePath;

	                    // echo "<pre>"; print_r($file_path); die;

	                    move_uploaded_file($_FILES['tenth_image']['tmp_name'], $file_path.'/'.$tenth_image_new);

	                    $new_employee_documents->emp_tenth_qualification_img = $tenth_image_new; 
	                }
	            }
	            // 12th Qualification Image Upload
	            if(!empty($_FILES['twelve_image']['name'])){

	                $twelve_image        = pathinfo($_FILES['twelve_image']['name']);
	                $ext                 = $twelve_image['extension'];
	                $twelve_image_new    = uniqid(rand(), true).'.'.$ext;

	                if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg'|| $ext == 'JPG'){

	                    $file_path = base_path().'/'.twelveQualificationImageBasePath;

	                    // echo "<pre>"; print_r($file_path); die;

	                    move_uploaded_file($_FILES['twelve_image']['tmp_name'], $file_path.'/'.$twelve_image_new);

	                    $new_employee_documents->emp_twelve_qualification_img = $twelve_image_new; 
	                }
	            }
	            // Other Qualification Img
	            if(!empty($_FILES['other_qualification_img']['name'][0])){

	                foreach($_FILES['other_qualification_img']['name'] as $i => $name){

	                    $tmp_name                           = $_FILES['other_qualification_img']['tmp_name'][$i];

	                    $other_qualification_images         = pathinfo($_FILES['other_qualification_img']['name'][$i]);

	                    $ext                                = $other_qualification_images['extension'];
	                    $other_qualification_images_array[] = uniqid(rand(), true).'.'.$ext;

	                    if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg'|| $ext == 'JPG'){

	                        $file_path = base_path().'/'.otherQualificationImageBasePath;

	                        move_uploaded_file($tmp_name, $file_path.'/'.$other_qualification_images_array[$i]);
	                    }
	                }
	                if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg'|| $ext == 'JPG'){
	                    $new_employee_documents->emp_other_qualification_img  = implode(",",$other_qualification_images_array);
	                }
	            }
	            // Graduation Image Upload
	            if(!empty($_FILES['graduation_image']['name'])){

	                $graduation_image        = pathinfo($_FILES['graduation_image']['name']);
	                $ext                     = $graduation_image['extension'];
	                $graduation_image_new    = uniqid(rand(), true).'.'.$ext;

	                if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg'|| $ext == 'JPG'){

	                    $file_path = base_path().'/'.graduationImageBasePath;

	                    // echo "<pre>"; print_r($file_path); die;

	                    move_uploaded_file($_FILES['graduation_image']['tmp_name'], $file_path.'/'.$graduation_image_new);

	                    $new_employee_documents->emp_graduation_img = $graduation_image_new; 
	                }
	            }

	            // Post Graduation Image Upload
	            if(!empty($_FILES['post_graduation_image']['name'])){

	                $post_graduation_image        = pathinfo($_FILES['post_graduation_image']['name']);
	                $ext                          = $post_graduation_image['extension'];
	                $post_graduation_image_new    = uniqid(rand(), true).'.'.$ext;

	                if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg'|| $ext == 'JPG'){

	                    $file_path = base_path().'/'.postGraduationImageBasePath;

	                    move_uploaded_file($_FILES['post_graduation_image']['tmp_name'], $file_path.'/'.$post_graduation_image_new);

	                    $new_employee_documents->emp_post_graduation_img = $post_graduation_image_new; 
	                }
	            }
	            // Other Documents Images Upload
	            if(!empty($_FILES['other_documents']['name'][0])){

	                foreach($_FILES['other_documents']['name'] as $i => $name){

	                    $tmp_name           = $_FILES['other_documents']['tmp_name'][$i];

	                    $other_documents    = pathinfo($_FILES['other_documents']['name'][$i]);

	                    $ext                = $other_documents['extension'];
	                    $other_documents_array[]  = uniqid(rand(), true).'.'.$ext;

	                    if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg'|| $ext == 'JPG'){

	                        $file_path = base_path().'/'.otherDocumentsImageBasePath;

	                        move_uploaded_file($tmp_name, $file_path.'/'.$other_documents_array[$i]);
	                    }
	                }
	                if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg'|| $ext == 'JPG'){
	                    $new_employee_documents->emp_other  = implode(",",$other_documents_array);
	                }
	            }

	            if($new_employee_documents->save()){

	                return redirect("employee-personal-form/".$user_id."/".$security_code.
		                	"/step-4")->with('success',"Your Personal Documents Upload Step 3 Added Successfully");

	            }else{

	                return redirect()->back()->with('error',COMMON_ERROR);
	            }
            }

        }                    

    	return view("employee_form_steps.employee_form_step_3",compact('user_id','security_code','employee_documents_edit'));

    }

    public function employee_personal_detail_form_step_4(Request $request, $user_id, $security_code){

    	$decoded_user_id       = base64_decode(urldecode($user_id));
        $decoded_security_code = base64_decode(urldecode($security_code));

		$user_details = User::where('id',$decoded_user_id)
                            ->where('security_code',$decoded_security_code)
                            ->first();

        if(empty($user_details)){

        	return redirect("/")->with('error',"Link Has Been Expired Or Invalid");
        }                    

        $previous_details_edit = PreviousYearExperience::where('user_id',$user_details->id)->first();


    	if($request->isMethod('post')){

    		if(!empty($previous_details_edit)){

	    		$previous_details_edit->user_id					=	$user_details->id;
	    		$previous_details_edit->name_prev_organization	=	$request->name_prev_organization;
	    		$previous_details_edit->years_experience        =   $request->years_experience;
	            $previous_details_edit->months_experience       =   $request->months_experience;
	            $previous_details_edit->total_experience        =   $request->total_experience;
	    		$previous_details_edit->annual_salary			=	$request->annual_salary;
	    		$previous_details_edit->reason_for_resigning	=	$request->reason_for_resigning;
	    		
	    		
	    		//  Copy Resignation Letter Image Edit Start Here
	    		if(!empty($_FILES['copy_resignation_letter']['name'])){

	    			$copy_resignation_letter 	= pathinfo($_FILES['copy_resignation_letter']['name']);
	    			$ext 						= $copy_resignation_letter['extension'];
	    			$new_name 					= time().'.'.$ext;

	    			if($ext == 'jpeg' || $ext == 'pdf' || $ext == 'jpg' || $ext == 'JPG'){

	    				$file_path = base_path().'/'.copyResignationLetterImageBasePath;

	    				if(move_uploaded_file($_FILES['copy_resignation_letter']['tmp_name'], $file_path.'/'.$new_name)){

		    				if(File::exists($file_path.'/'.$new_name)){

		    					File::delete($file_path.'/'.$previous_details_edit->copy_resignation_letter);
							}

	    				}

	    				$previous_details_edit->copy_resignation_letter = $new_name; 
	    			}
	    		}
	    		//  Copy Resignation Letter Image Edit End Here


	    		//  Copy Relieving Letter Image Edit Start Here
	    		if(!empty($_FILES['copy_relieving_letter']['name'])){

	    			$copy_relieving_letter 		= pathinfo($_FILES['copy_relieving_letter']['name']);
	    			$ext 						= $copy_relieving_letter['extension'];
	    			$new_name 					= time().'.'.$ext;

	    			if($ext == 'jpeg' || $ext == 'pdf' || $ext == 'jpg' || $ext == 'JPG'){

	    				$file_path = base_path().'/'.previousRelievingLetterImageBasePath;

	    				if(move_uploaded_file($_FILES['copy_relieving_letter']['tmp_name'], $file_path.'/'.$new_name)){

	    					if(File::exists($file_path.'/'.$new_name)){

		    					File::delete($file_path.'/'.$previous_details_edit->copy_relieving_letter	);
							}

	    				}
	    				$previous_details_edit->copy_relieving_letter = $new_name;
	    			}
	    		}
	    		//  Copy Relieving Letter Image Edit End Here

	    		if($previous_details_edit->save()){

	    			return redirect("employee-personal-form/".$user_id."/?form=finish")->with('success', "Your Previous Year Experience Details Step 4");
	    		}else{

	    			return redirect()->back()->with('error',COMMON_ERROR);
	    		} 

    		}else{

	    		$new_previous_experience							=	new PreviousYearExperience;
	    		$new_previous_experience->user_id					=	$user_details->id;
	    		$new_previous_experience->name_prev_organization	=	$request->name_prev_organization;
	    		$new_previous_experience->years_experience 			=	$request->years_experience;
	    		$new_previous_experience->months_experience			=	$request->months_experience;
	    		$new_previous_experience->total_experience			=	$request->total_experience;
	    		$new_previous_experience->annual_salary			    =	$request->annual_salary;
	    		$new_previous_experience->reason_for_resigning		=	$request->reason_for_resigning;
	    		$new_previous_experience->copy_relieving_letter	    =	$request->copy_relieving_letter;
	    		
	    		//  Copy Resignation Letter Image Insert End Here
	    		if(!empty($_FILES['copy_resignation_letter']['name'])){

	    			$copy_resignation_letter 	= pathinfo($_FILES['copy_resignation_letter']['name']);
	    			$ext 						= $copy_resignation_letter['extension'];
	    			$new_name 					= time().'.'.$ext;

	    			if($ext == 'jpeg' || $ext == 'pdf' || $ext == 'jpg' || $ext == 'JPG'){

	    				$file_path = base_path().'/'.copyResignationLetterImageBasePath;

	    				move_uploaded_file($_FILES['copy_resignation_letter']['tmp_name'], $file_path.'/'.$new_name);

	    				$new_previous_experience->copy_resignation_letter = $new_name; 
	    			}
	    		}
	    		//  Copy Resignation Letter Image Insert End Here

	    		//  Copy Relieving Letter Image Insert Start Here
	    		if(!empty($_FILES['copy_relieving_letter']['name'])){

	    			$copy_relieving_letter 		= pathinfo($_FILES['copy_relieving_letter']['name']);
	    			$ext 						= $copy_relieving_letter['extension'];
	    			$new_name 					= time().'.'.$ext;

	    			if($ext == 'jpeg' || $ext == 'pdf' || $ext == 'jpg' || $ext == 'JPG'){
	                    
	    				$file_path = base_path().'/'.previousRelievingLetterImageBasePath;

	    				move_uploaded_file($_FILES['copy_relieving_letter']['tmp_name'], $file_path.'/'.$new_name);

	    				$new_previous_experience->copy_relieving_letter = $new_name; 
	    			}
	    		}
	    		//  Copy Relieving Letter Image Insert End Here

	    		if($new_previous_experience->save()){

	    			return redirect("employee-personal-form/".$user_id."/?form=finish")->with('success', "Your Previous Year Experience Details Step 4 Added Successfully");
	    		}else{

	    			return redirect()->back()->with('error',COMMON_ERROR);
	    		} 

    		}

    	}

    	return view("employee_form_steps.employee_form_step_4",compact('user_id','security_code','previous_details_edit'));

    }

    public function employee_form_finish(Request $request, $user_id){

    	$decoded_user_id       = base64_decode(urldecode($user_id));

    	if(!empty($_GET['form'])){

    		User::where('id',$decoded_user_id)
    		    ->update(['security_code'=> NULL]);	

    		$user_details = User::where('id',$decoded_user_id)
    		    				->first();	    
    	}

    	return view("employee_form_steps.employee_form_finish",compact('user_details'));

    }
}
