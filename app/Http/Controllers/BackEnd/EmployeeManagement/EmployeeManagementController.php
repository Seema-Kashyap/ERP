<?php

namespace App\Http\Controllers\BackEnd\EmployeeManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EmployeeDetail, App\BusinessUnit, App\User, App\Designation, App\State, App\City, App\EmployeePersonalDetail, App\EmployeeDocument;
use File;

class EmployeeManagementController extends Controller
{

	public function index(Request $request){

    	$employee_list = EmployeeDetail::with("user_details")
                                       ->with('states')
                                       ->with('cities')
                                       ->get();

        $units         = BusinessUnit::get();

    	// echo "<pre>"; print_r($employee_list); die;

        return view("backEnd.employees.index", compact('employee_list','units'));
	}

    public function add(Request $request){

        $units          = BusinessUnit::get();

        $india_states   = State::where('country_id','101')
                                ->get();

        $last_emp_code  = EmployeeDetail::where('emp_code','!=', '')
                                        ->orderBy('id','DESC')
                                        ->value('emp_code');

        // echo "<pre>"; print_r($last_emp_code); die;

        if($request->isMethod('post')){

            $new_employee          				= new EmployeeDetail;
            $new_employee->emp_code 			= "E-".$request->emp_code;
            $new_employee->user_id 				= $request->user_id;
            $new_employee->emp_designation   	= $request->emp_designation ;
            $new_employee->emp_level  			= $request->emp_level;
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

            if($new_employee->save()){

                return redirect("admin/employee-management-list")->with('success',"Employee Details Added Successfully");
            }else{

    			return redirect()->back()->with('error',COMMON_ERROR);
    		}
        }
        return view("backEnd.employees.form",compact('units','india_states','last_emp_code'));
    }

    public function edit(Request $request, $emp_id){

        $employee_edit  = EmployeeDetail::where('id',$emp_id)->first();

        $units          = BusinessUnit::get();

        $user_unit      = User::where('id',$employee_edit->user_id)->first();

        $designations   = Designation::where('business_unit_id',$user_unit->unit_id)
                                     ->get();

        $cities         = City::where('state_id',$employee_edit->emp_state)->get();

        $last_emp_code  = EmployeeDetail::where('emp_code','!=', '')
                                        ->orderBy('id','DESC')
                                        ->value('emp_code');

        // echo "<pre>"; print_r($last_emp_code); die;

        $india_states   = State::where('country_id','101')
                                ->get();

        if($request->isMethod('post')){

            $employee_edit->emp_code             = "E-".$request->emp_code;
            $employee_edit->user_id              = $request->user_id;
            $employee_edit->emp_designation      = $request->emp_designation ;
            $employee_edit->emp_level            = $request->emp_level;
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

                return redirect("admin/employee-management-list")->with('success',"Employee Details Updated Successfully");
            }else{

    			return redirect()->back()->with('error',COMMON_ERROR);
    		}
        }
        return view("backEnd.employees.form",compact('units','india_states','user_unit','employee_edit','designations','cities','last_emp_code'));
    }

    public function user_details(Request $request, $unit_id){

        $user_details = User::where('unit_id',$unit_id)->get();

        // echo "<pre>"; print_r($user_details); die;

        $employee_already_exists = array();

        $employees_list =  EmployeeDetail::get();

        foreach ($employees_list as $key => $value) {
            $employee_already_exists[] = $value['user_id'];
        }

        if(!empty($user_details[0])){

            echo "<option value=''>Select Employee</option>";

            foreach ($user_details as $key => $value) {
                
                if(in_array($value->id, $employee_already_exists)){

                    echo "<option disabled='disabled' value='".$value->id."'>".ucfirst($value->first_name).' '.ucfirst($value->last_name)." ". "("." ".$value->email." ".")"."</option>";
                }else{

                    echo "<option  value='".$value->id."'>".ucfirst($value->first_name).' '.ucfirst($value->last_name)." ". "("." ".$value->email." ".")"."</option>";
                }
            }

        }else{

            echo "<option value=''>No Record Found</option>";
        }

    }

    public function designation_details(Request $request, $business_unit_id){

        $designation_details = Designation::where('business_unit_id',$business_unit_id)
                                          ->get();

        // echo "<pre>"; print_r($designation_details); die;

        $designation_name = "";
        $designation_level = "";

        if(!empty($designation_details[0])){

            $designation_name  .= "<option value=''>Select Designation Name</option>";

            $designation_level  .= "<option value=''>Select Designation Level</option>";

            foreach ($designation_details as $key => $value) {
                
                $designation_name .= "<option value='".$value->designation_name."'>".ucfirst($value->designation_name)."</option>";

                $designation_level .= "<option value='".$value->level."'>".ucfirst($value->level)."</option>";
            }

        }

        return response()->json(['designation_name' => $designation_name,'designation_level' => $designation_level]);
    }

    public function delete($emp_id){

        $emp_details_delete = EmployeeDetail::where('id',$emp_id)->first();

        if($emp_details_delete->delete()){

            echo "1";
        }else{

            echo "2"; 
        }
    }

    // Employee Personal Details Functions Started Here

    public function employee_personal_details_index(Request $request){

    	$employee_personal_details_list = EmployeePersonalDetail::with("user_details")
						                                       ->get();

		$units         = BusinessUnit::get();

		return view("backEnd.employees.employee_personal_details_index",compact('employee_personal_details_list','units'));
    }

    public function employee_personal_details_add(Request $request){

    	$units  = BusinessUnit::get();

    	if($request->isMethod('post')){

            $new_employee_personal_details 										= new EmployeePersonalDetail;
            $new_employee_personal_details->user_id 							= $request->user_id;
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
            $new_employee_personal_details->status								= $request->status;

            if($new_employee_personal_details->save()){

                return redirect("admin/employee-personal-details-list")->with('success',"Employee Personal Details Added Successfully");
            }else{

    			return redirect()->back()->with('error',COMMON_ERROR);
    		}
        }

    	return view("backEnd.employees.employee_personal_detail_form",compact('units'));
    }

    public function employee_personal_details_edit(Request $request, $emp_id){

    	$employee_personal_details_edit  = EmployeePersonalDetail::where('id',$emp_id)->first();

        $units          				 = BusinessUnit::get();

        $user_unit      				 = User::where('id',$employee_personal_details_edit->user_id)->first();

        if($request->isMethod('post')){

            // echo "<pre>"; print_r($request->input()); die;

            $employee_personal_details_edit->user_id                             = $request->user_id;
            $employee_personal_details_edit->emp_ctc_appointment                 = $request->emp_ctc_appointment;
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
            $employee_personal_details_edit->status                              = $request->status;

            if($employee_personal_details_edit->save()){

                return redirect("admin/employee-personal-details-list")->with('success',"Employee Personal Details Updated Successfully");
            }else{

                return redirect()->back()->with('error',COMMON_ERROR);
            }
        }

        return view("backEnd.employees.employee_personal_detail_form",compact('units','user_unit','employee_personal_details_edit'));
    	
    }

    public function employee_personal_details_delete(Request $request, $emp_id){

        $emp_details_personal_delete = EmployeePersonalDetail::where('id',$emp_id)->first();

        if($emp_details_personal_delete->delete()){

            echo "1";
        }else{

            echo "2"; 
        }
    	
    }

    // Employee Personal Details Functions Ended Here


    // Employee Documents Functions Started Here

    public function user_details_personal_details(Request $request, $unit_id){

        $user_details = User::where('unit_id',$unit_id)->get();

        // echo "<pre>"; print_r($user_details); die;

        $employee_personal_details_already_exists = array();

        $employee_personal_details_list =  EmployeePersonalDetail::get();

        foreach ($employee_personal_details_list as $key => $value) {
            $employee_personal_details_already_exists[] = $value['user_id'];
        }

        if(!empty($user_details[0])){

            echo "<option value=''>Select Employee</option>";

            foreach ($user_details as $key => $value) {
                
                if(in_array($value->id, $employee_personal_details_already_exists)){

                    echo "<option disabled='disabled' value='".$value->id."'>".ucfirst($value->first_name).' '.ucfirst($value->last_name)." ". "("." ".$value->email." ".")"."</option>";
                }else{

                    echo "<option  value='".$value->id."'>".ucfirst($value->first_name).' '.ucfirst($value->last_name)." ". "("." ".$value->email." ".")"."</option>";
                }
            }

        }else{

            echo "<option value=''>No Record Found</option>";
        }

    }

    public function employee_personal_documents_index(Request $request){

        $employee_documents    = EmployeeDocument::with("user_details")
                                                 ->get();

        $units                      = BusinessUnit::get();

        return view("backEnd.employees.employee_documents_index",compact('units','employee_documents')); 
    }

    public function employee_personal_documents_add(Request $request){

        $units  = BusinessUnit::get();

        if($request->isMethod('post')){

            // echo "<pre>"; print_r($_FILES); die;

            $new_employee_documents                 = new EmployeeDocument;
            $new_employee_documents->user_id        = $request->user_id;
            $new_employee_documents->status         = $request->status;


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

                return redirect("admin/employee-personal-documents-list")->with('success',"Employee Documents Added Successfully");

            }else{

                return redirect()->back()->with('error',COMMON_ERROR);
            }
        }
        return view("backEnd.employees.employee_documents_form",compact('units'));  
    }

    public function employee_personal_documents_edit(Request $request, $emp_id){

        $employee_documents_edit = EmployeeDocument::where('id',$emp_id)->first();

        $units  = BusinessUnit::get();

        $user_unit = User::where('id',$employee_documents_edit->user_id)->first();

        if($request->isMethod('post')){

            // echo "<pre>"; print_r($_FILES); die;

            $employee_documents_edit->user_id        = $request->user_id;
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

                return redirect("admin/employee-personal-documents-list")->with('success',"Employee Documents Updated Successfully");

            }else{

                return redirect()->back()->with('error',COMMON_ERROR);
            }
        }

        return view("backEnd.employees.employee_documents_form",compact('units','user_unit','employee_documents_edit')); 
    }

    public function employee_personal_documents_delete(Request $request, $emp_id){

        $documents_delete = EmployeeDocument::where('id',$emp_id)->first();

        $employee_passport_image     = base_path().'/'.employeePassportImageBasePath;
        $employee_pancard_image      = base_path().'/'.employeePancardImageBasePath;
        $employee_passport_images    = base_path().'/'.employeePassportImagesBasePath;
        $employee_aadhaarCard_images = base_path().'/'.employeeAadhaarCardImagesBasePath;
        $tenth_qualification_image   = base_path().'/'.tenthQualificationImageBasePath;
        $twelve_qualification_image  = base_path().'/'.twelveQualificationImageBasePath;
        $other_qualification_image   = base_path().'/'.otherQualificationImageBasePath;
        $graduation_image            = base_path().'/'.graduationImageBasePath;
        $post_graduation_image       = base_path().'/'.postGraduationImageBasePath;
        $other_documents_imgs        = base_path().'/'.otherDocumentsImageBasePath;

        // Employee Passport Size Images Delete
        $emp_imgs = explode(",",$documents_delete->emp_img);

        foreach ($emp_imgs as $key => $value) {

            if(file::exists($employee_passport_image.'/'.$value)){

                file::delete($employee_passport_image.'/'.$value);
            }
        }

        // Employee Pan Card Image Delete
        if(file::exists($employee_pancard_image.'/'.$documents_delete->emp_pan_card)){

            file::delete($employee_pancard_image.'/'.$documents_delete->emp_pan_card);
        }


        // Employee Passport Images Delete
        $emp_passport = explode(",",$documents_delete->emp_passport);

        foreach ($emp_passport as $key => $value) {

            if(file::exists($employee_passport_images.'/'.$value)){

                file::delete($employee_passport_images.'/'.$value);
            }
        }

        // Aadhaar Card Images Delete
        $emp_aadhaar_card = explode(",",$documents_delete->emp_aadhaar_card);

        foreach ($emp_aadhaar_card as $key => $value) {

            if(file::exists($employee_aadhaarCard_images.'/'.$value)){

                file::delete($employee_aadhaarCard_images.'/'.$value);
            }
        }

        // Tenth Qualification Image Delete
        if(file::exists($tenth_qualification_image.'/'.$documents_delete->emp_tenth_qualification_img)){

            file::delete($tenth_qualification_image.'/'.$documents_delete->emp_tenth_qualification_img);
        }

        // 12th Qualification Image Delete
        if(file::exists($twelve_qualification_image.'/'.$documents_delete->emp_twelve_qualification_img)){

            file::delete($twelve_qualification_image.'/'.$documents_delete->emp_twelve_qualification_img);
        }

        // Other Qualification Images Delete
        $emp_other_qualification_img = explode(",",$documents_delete->emp_other_qualification_img);

        foreach ($emp_other_qualification_img as $key => $value) {

            if(file::exists($other_qualification_image.'/'.$value)){

                file::delete($other_qualification_image.'/'.$value);
            }
        }

        // Graduation Image Delete
        if(file::exists($graduation_image.'/'.$documents_delete->emp_graduation_img)){

            file::delete($graduation_image.'/'.$documents_delete->emp_graduation_img);
        }

        // Post Graduation Image Delete
        if(file::exists($post_graduation_image.'/'.$documents_delete->emp_post_graduation_img)){

            file::delete($post_graduation_image.'/'.$documents_delete->emp_post_graduation_img);
        }

        // Other Documents Images Delete
        $other_documents = explode(",",$documents_delete->emp_other);

        foreach ($other_documents as $key => $value) {

            if(file::exists($other_documents_imgs.'/'.$value)){

                file::delete($other_documents_imgs.'/'.$value);
            }
        }

        if($documents_delete->delete()){
            echo "1";
        }else{
            echo "2";
        }
        
    }
    public function user_details_documents(Request $request, $unit_id){

        $user_details = User::where('unit_id',$unit_id)->get();

        // echo "<pre>"; print_r($user_details); die;

        $employee_document_details_already_exists = array();

        $employee_document_details_list =  EmployeeDocument::get();

        foreach ($employee_document_details_list as $key => $value) {
            $employee_document_details_already_exists[] = $value['user_id'];
        }

        if(!empty($user_details[0])){

            echo "<option value=''>Select Employee</option>";

            foreach ($user_details as $key => $value) {
                
                if(in_array($value->id, $employee_document_details_already_exists)){

                    echo "<option disabled='disabled' value='".$value->id."'>".ucfirst($value->first_name).' '.ucfirst($value->last_name)." ". "("." ".$value->email." ".")"."</option>";
                }else{

                    echo "<option  value='".$value->id."'>".ucfirst($value->first_name).' '.ucfirst($value->last_name)." ". "("." ".$value->email." ".")"."</option>";
                }
            }

        }else{

            echo "<option value=''>No Record Found</option>";
        }

    }
}
