<?php

namespace App\Http\Controllers\BackEnd\EmployeeDetails;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\State, App\EmployeeDetail, Auth, App\Designation, App\City, App\EmployeePersonalDetail, App\EmployeeDocument, File, App\PreviousYearExperience;

class EmployeeDetailsController extends Controller
{
    public function employee_details(Request $request){

    	// Employee Details

    	$employee_edit  = EmployeeDetail::where('user_id',Auth::user()->id)->first();

    	// echo "<pre>"; print_r($employee_edit); die;

    	$india_states   = State::where('country_id','101')
                               ->get();

        $designations   = Designation::where('business_unit_id',Auth::user()->unit_id)
                                     ->get();

        // echo "<pre>"; print_r($designations); die;

        if(!empty($employee_edit)){

        	$cities   	= City::where('state_id',$employee_edit->emp_state)->get();

        }else{

        	$cities 	= "";
        }

        // Employee Personal Details

        $employee_personal_details_edit  = EmployeePersonalDetail::where('user_id',Auth::user()->id)
        														 ->first();

       	$employee_documents_edit = EmployeeDocument::where('user_id',Auth::user()->id)->first();

       	$previous_details_edit = PreviousYearExperience::where('user_id',Auth::user()->id)->first();

      	if($request->isMethod('post')){


      		if(!empty($request->employee_details)){

	      		$employee_edit->emp_marital_status   = $request->emp_marital_status;
	            $employee_edit->emp_doj              = $request->emp_doj;
	            $employee_edit->emp_formality        = $request->emp_formality;
	            $employee_edit->emp_dob              = $request->emp_dob;
	            $employee_edit->emp_age              = $request->emp_age;
	            $employee_edit->emp_blood_group      = $request->emp_blood_group;
	            $employee_edit->emp_addr_one         = $request->emp_addr_one;
	            $employee_edit->emp_addr_second      = $request->emp_addr_second;
	            $employee_edit->emp_city             = $request->emp_city;
	            $employee_edit->emp_state            = $request->emp_state;
	            $employee_edit->emp_pincode          = $request->emp_pincode;

	            if($employee_edit->save()){

                	return redirect()->back()->with('success',"Employee Details Form Updated Successfully");
	            }else{

	    			return redirect()->back()->with('error',COMMON_ERROR);
	    		}

      		}

      		if(!empty($request->employee_personal_details)){

	      		$employee_personal_details_edit->emp_ctc_appointment             	 = $request->emp_ctc_appointment;
	            $employee_personal_details_edit->emp_father_name                     = $request->emp_father_name;
	            $employee_personal_details_edit->emp_father_dob                      = $request->emp_father_dob;
	            $employee_personal_details_edit->emp_mother_name                     = $request->emp_mother_name;
	            $employee_personal_details_edit->emp_mother_dob                      = $request->emp_mother_dob;
	            $employee_personal_details_edit->emp_spouse_name                     = $request->emp_spouse_name;
	            $employee_personal_details_edit->emp_spouse_dob                      = $request->emp_spouse_dob;
	            if(!empty($request->emp_child_name[0])){

	                $employee_personal_details_edit->emp_child_name                  = implode(",", $request->emp_child_name);
	            }else{
	                
	                $employee_personal_details_edit->emp_child_name                  = "";
	            }
	            if(!empty($request->emp_child_dob[0])){
	                $employee_personal_details_edit->emp_child_dob                   = implode(",", $request->emp_child_dob);
	            }else{

	                $employee_personal_details_edit->emp_child_dob                   = "";
	            }
	            $employee_personal_details_edit->emp_emer_con_person                 = $request->emp_emer_con_person;
	            $employee_personal_details_edit->emp_emer_con_no                     = $request->emp_emer_con_no;
	            $employee_personal_details_edit->emp_tenth_qualification             = $request->emp_tenth_qualification;
	            $employee_personal_details_edit->emp_twelve_qualification            = $request->emp_twelve_qualification;
	            $employee_personal_details_edit->emp_graduation_qualification        = $request->emp_graduation_qualification;
	            $employee_personal_details_edit->emp_post_graduation_qualification   = $request->emp_post_graduation_qualification;
	            $employee_personal_details_edit->emp_additional_qualification        = $request->emp_additional_qualification;
	            $employee_personal_details_edit->emp_pancard_no                      = $request->emp_pancard_no;
	            $employee_personal_details_edit->emp_passport_no                     = $request->emp_passport_no;
	            $employee_personal_details_edit->emp_adhaar_card_no                  = $request->emp_adhaar_card_no;
	            $employee_personal_details_edit->emp_other_information               = $request->emp_other_information;

	            if($employee_personal_details_edit->save()){

                	return redirect()->back()->with('success',"Employee Personal Details Form Updated Successfully");
	            }else{

	    			return redirect()->back()->with('error',COMMON_ERROR);
	    		}
      		}

      		if(!empty($request->employee_documents_details)){

	            $employee_documents_edit->status         = $request->status;

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

	                return redirect()->back()->with('success',"Employee Documents Details Form Updated Successfully");

	            }else{

	                return redirect()->back()->with('error',COMMON_ERROR);
	            }
      		}

      		if(!empty($request->employee_previous_year)){

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

	    			return redirect()->back()->with('success', "Employee Previous Years Details Form Updated Successfully");
	    		}else{

	    			return redirect()->back()->with('error',COMMON_ERROR);
	    		}

      		}
      	}
      	$page = "employee_details";
    	return view("backEnd.employee_details.employee_details_form",compact('page','india_states','cities','employee_edit','designations','employee_personal_details_edit','employee_documents_edit','previous_details_edit'));
    }
}
