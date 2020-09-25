<?php

namespace App\Http\Controllers\BackEnd\EmployeeManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BusinessUnit, App\User, App\EmployeeDetail, App\EmployeePersonalDetail, App\EmployeeDocument, App\PreviousYearExperience;

class EmployeeMasterController extends Controller
{
    public function employee_master(Request $request){

    	$units	= BusinessUnit::get();

    	return view("backEnd.employees.employee_master",compact('units'));
    }


    public function employee_master_users(Request $request, $unit_id){

        $user_details = User::where('unit_id',$unit_id)
                            ->where('role_id','!=','1')
                            ->get();

        if(!empty($user_details[0])){

            echo "<option value=''>Select Employee</option>";

            foreach ($user_details as $key => $value) {
                
                echo "<option  value='".$value->id."'>".ucfirst($value->first_name).' '.ucfirst($value->last_name)." ". "("." ".$value->email." ".")"."</option>";
            }

        }else{

            echo "<option value=''>No Record Found</option>";
        }

    }

    public function employee_master_user_details(Request $request){

    	$user_id         = $request->user_id;

    	$user_profile    = User::where('id',$user_id)
                                ->first();

		$html = "";

		$html .= '<fieldset>
					<legend>'.ucfirst($user_profile->first_name).' '.ucfirst($user_profile->last_name) .' Profile Details</legend>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="name" value="'.ucfirst($user_profile->first_name).' '.ucfirst($user_profile->last_name) .'" readonly>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Mobile No">Mobile No<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="mobile_no" value="'.$user_profile->phone.'" readonly>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Email">Email<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="email" value="'.$user_profile->email.'" readonly>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Gender">Gender<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="gender" value="'.ucfirst($user_profile->gender).'" readonly>
                                </div>
                            </div>
				 </fieldset>';

	  // Employee Details Started Here

    	$employee_detail = EmployeeDetail::where('user_id',$user_id)
										->with('states')
                                       	->with('cities')
    									->first();
    									
    	$emp_code 		 		= !empty($employee_detail->emp_code) ? $employee_detail->emp_code : 'NA';

    	$emp_marital_status 	= !empty($employee_detail->emp_marital_status) ? $employee_detail->emp_marital_status : 'NA';

    	$emp_designation 		= !empty($employee_detail->emp_designation) ? $employee_detail->emp_designation : 'NA';

    	$emp_level 				= !empty($employee_detail->emp_level) ? $employee_detail->emp_level : 'NA';

    	$emp_doj 				= !empty($employee_detail->emp_doj) ? date('d-M-Y', strtotime($employee_detail->emp_doj)) : 'NA';

    	$emp_formality 			= !empty($employee_detail->emp_formality) ? date('d-M-Y', strtotime($employee_detail->emp_formality)) : 'NA';

    	$emp_dob  				= !empty($employee_detail->emp_dob) ? date('d-M-Y', strtotime($employee_detail->emp_dob )) : 'NA';

    	$emp_age 				= !empty($employee_detail->emp_age) ? $employee_detail->emp_age : 'NA';

    	$emp_blood_group  		= !empty($employee_detail->emp_blood_group) ? $employee_detail->emp_blood_group  : 'NA';

    	$emp_addr_one  			= !empty($employee_detail->emp_addr_one) ? $employee_detail->emp_addr_one  : 'NA';

    	$emp_addr_second  		= !empty($employee_detail->emp_addr_second) ? $employee_detail->emp_addr_second  : 'NA';

    	$emp_state   			= !empty($employee_detail->states->name) ? $employee_detail->states->name   : 'NA';
    	$emp_city   			= !empty($employee_detail->cities->name) ? $employee_detail->cities->name   : 'NA';

    	$emp_pincode   			= !empty($employee_detail->emp_pincode) ? $employee_detail->emp_pincode   : 'NA';	 

	  $html .=  '<fieldset style="margin-top:20px;">
					<legend>'.ucfirst($user_profile->first_name).' '.ucfirst($user_profile->last_name) .' Employee Details</legend>';
						  if(!empty($employee_detail)){

      $html .=             '<div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee Code">Employee Code<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="emp_code" value="'.$emp_code.'" readonly>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee Marital Status">Employee Marital Status<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="emp_marital_status" value="'.ucfirst($emp_marital_status).'" readonly>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee Designation">Employee Designation<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="emp_designation" value="'.ucwords($emp_designation).'" readonly>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee Level">Employee Level<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="emp_level" value="'.ucwords($emp_level).'" readonly>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee Date Of Joining">Employee Date Of Joining<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="emp_doj" value="'.$emp_doj.'" readonly>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee Formalities Completed On">Employee Formalities Completed On<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="emp_formality" value="'.$emp_formality.'" readonly>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee Date Of Birth">Employee Date Of Birth<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="emp_dob" value="'.$emp_dob.'" readonly>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee Age">Employee Age<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="emp_age" value="'.$emp_age.'" readonly>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee Blood Group">Employee Blood Group<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="emp_blood_group" value="'.$emp_blood_group.'" readonly>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee Address 1">Employee Address 1<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea  class="form-control " name="emp_addr_one" readonly>'.$emp_addr_one.'</textarea>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee Address 2">Employee Address 2<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea  class="form-control " name="emp_addr_one" readonly>'.$emp_addr_second.'</textarea>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee State">Employee State<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="emp_state" value="'.$emp_state.'" readonly>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee City">Employee City<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="emp_pincode" value="'.$emp_city.'" readonly>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee Pincode">Employee Pincode<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="emp_pincode" value="'.$emp_pincode .'" readonly>
                                </div>
                            </div>';

                        	}else{

     $html .=                '<p style="padding:20px 0px; text-align:center; font-weight:bold; font-size:25px;">No Details Found</p>';    		

                        	}
	 $html .= '</fieldset>';

	 	// Employee Details Ended Here	

	    // Employee Personal Details Started Here

	 	$employee_personal_details 			= EmployeePersonalDetail::where('user_id',$user_id)
    													   ->first();

    	$emp_des_report_auth 				= !empty($employee_personal_details->emp_des_report_auth) ? $employee_personal_details->emp_des_report_auth : 'NA';

    	$emp_ctc_appointment 				= !empty($employee_personal_details->emp_ctc_appointment) ? $employee_personal_details->emp_ctc_appointment : 'NA';

    	$emp_father_name 					= !empty($employee_personal_details->emp_father_name) ? $employee_personal_details->emp_father_name : 'NA';

    	$emp_father_dob 					= !empty($employee_personal_details->emp_father_dob) ? date('d-M-Y', strtotime($employee_personal_details->emp_father_dob)) : 'NA';

    	$emp_mother_name 					= !empty($employee_personal_details->emp_mother_name) ? $employee_personal_details->emp_mother_name : 'NA';

    	$emp_mother_dob  					= !empty($employee_personal_details->emp_mother_dob) ? date('d-M-Y', strtotime($employee_personal_details->emp_mother_dob)) : 'NA';

    	$emp_spouse_name  					= !empty($employee_personal_details->emp_spouse_name) ? $employee_personal_details->emp_spouse_name  : 'NA';

    	$emp_spouse_dob  					= !empty($employee_personal_details->emp_spouse_dob) ? date('d-M-Y', strtotime($employee_personal_details->emp_spouse_dob )) : 'NA';

    	$emp_child_name  					= !empty($employee_personal_details->emp_child_name) ? $employee_personal_details->emp_child_name  : 'NA';

    	$emp_child_dob  					= !empty($employee_personal_details->emp_child_dob) ? $employee_personal_details->emp_child_dob : 'NA';

    	$emp_emer_con_person    			= !empty($employee_personal_details->emp_emer_con_person) ? $employee_personal_details->emp_emer_con_person   : 'NA';

    	$emp_emer_con_no   					= !empty($employee_personal_details->emp_emer_con_no) ? $employee_personal_details->emp_emer_con_no   : 'NA';

    	$emp_tenth_qualification			= !empty($employee_personal_details->emp_tenth_qualification) ? $employee_personal_details->emp_tenth_qualification   : 'NA';

    	$emp_twelve_qualification			= !empty($employee_personal_details->emp_twelve_qualification) ? $employee_personal_details->emp_twelve_qualification   : 'NA';

    	$emp_graduation_qualification		= !empty($employee_personal_details->emp_graduation_qualification) ? $employee_personal_details->emp_graduation_qualification   : 'NA';

    	$emp_post_graduation_qualification	= !empty($employee_personal_details->emp_post_graduation_qualification) ? $employee_personal_details->emp_post_graduation_qualification   : 'NA';

    	$emp_additional_qualification		= !empty($employee_personal_details->emp_additional_qualification) ? $employee_personal_details->emp_additional_qualification   : 'NA';

    	$emp_pancard_no						= !empty($employee_personal_details->emp_pancard_no) ? $employee_personal_details->emp_pancard_no   : 'NA';

    	$emp_passport_no					= !empty($employee_personal_details->emp_passport_no) ? $employee_personal_details->emp_passport_no   : 'NA';

    	$emp_adhaar_card_no					= !empty($employee_personal_details->emp_adhaar_card_no) ? $employee_personal_details->emp_adhaar_card_no   : 'NA';

    	$emp_other_information				= !empty($employee_personal_details->emp_other_information) ? $employee_personal_details->emp_other_information   : 'NA';


	  $html .= '<fieldset style="margin-top:20px;">
					<legend>'.ucfirst($user_profile->first_name).' '.ucfirst($user_profile->last_name) .' Employee Personal Details</legend>';
						  if(!empty($employee_personal_details)){

      $html .=             '<div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee Designation Report Authority">Employee Designation Report Authority<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="emp_des_report_auth" value="'.$emp_des_report_auth.'" readonly>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee CTC Appointment">Employee CTC Appointment<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="emp_ctc_appointment" value="'.$emp_ctc_appointment.'" readonly>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee Father Name">Employee Father Name<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="emp_father_name" value="'.$emp_father_name.'" readonly>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee Father Date Of Birth">Employee Father Date Of Birth<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="emp_father_dob" value="'.$emp_father_dob.'" readonly>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee Mother Name">Employee Mother Name<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="emp_mother_name" value="'.$emp_mother_name.'" readonly>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee Mother Date Of Birth">Employee Mother Date Of Birth<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="emp_mother_dob" value="'.$emp_mother_dob.'" readonly>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee Spouse Name">Employee Spouse Name<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="emp_spouse_name" value="'.$emp_spouse_name.'" readonly>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee Spouse Date Of Birth">Employee Spouse Date Of Birth<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="emp_spouse_dob" value="'.$emp_spouse_dob.'" readonly>
                                </div>
                            </div>';
                            $emp_children_name = explode(",",$emp_child_name);
                            $i = 1;
                            foreach ($emp_children_name as $key => $value) {
	      $html .=              '<div class="item form-group">
	                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee Child Name '.$i.'">Employee Child Name '.$i.'<span class="required">*</span>
	                                </label>
	                                <div class="col-md-6 col-sm-6 ">
	                                    <input type="text" class="form-control " name="emp_child_name" value="'.$value.'" readonly>
	                                </div>
	                            </div>';
	                            $i++;
                            }
                            $emp_children_dob = explode(",",$emp_child_dob);
                            $i = 1;
                            foreach ($emp_children_dob as $key => $value) {

                            	$child_date = date('d-M-Y', strtotime($value));
	      $html .=              '<div class="item form-group">
	                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee Child Date Of Birth '.$i.'">Employee Child Date Of Birth '.$i.'<span class="required">*</span>
	                                </label>
	                                <div class="col-md-6 col-sm-6 ">
	                                    <input type="text" class="form-control " name="emp_child_name" value="'.$child_date.'" readonly>
	                                </div>
	                            </div>';
                            	$i++;
                            }
      $html .=              '<div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee Emergency Connection Person">Employee Emergency Connection Person<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="emp_emer_con_person" value="'.$emp_emer_con_person.'" readonly>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee Emergency Connection Number">Employee Emergency Connection Number<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="emp_emer_con_no" value="'.$emp_emer_con_no.'" readonly>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee 10th Qualification">Employee 10th Qualification<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea  class="form-control " name="emp_tenth_qualification" readonly>'.$emp_tenth_qualification.'</textarea>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee 12th Qualification">Employee 12th Qualification<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea  class="form-control " name="emp_twelve_qualification" readonly>'.$emp_twelve_qualification.'</textarea>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee Graduation">Employee Graduation<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea  class="form-control " name="emp_graduation_qualification" readonly>'.$emp_graduation_qualification.'</textarea>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee Post Graduation">Employee Post Graduation<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea  class="form-control " name="emp_post_graduation_qualification" readonly>'.$emp_post_graduation_qualification.'</textarea>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee Additional Qualification">Employee Additional Qualification<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea  class="form-control " name="emp_additional_qualification" readonly>'.$emp_additional_qualification.'</textarea>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee Pancard">Employee Pancard<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="emp_pancard_no" value="'.$emp_pancard_no.'" readonly>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee Passport">Employee Passport<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="emp_passport_no" value="'.$emp_passport_no.'" readonly>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee Aadhaar Card">Employee Aadhaar Card<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="emp_adhaar_card_no" value="'.$emp_adhaar_card_no.'" readonly>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="Employee Other Information">Employee Other Information<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" class="form-control " name="emp_other_information" value="'.$emp_other_information.'" readonly>
                                </div>
                            </div>';


                        	}else{

      $html .=                '<p style="padding:20px 0px; text-align:center; font-weight:bold; font-size:25px;">No Details Found</p>';    		

                        	}
	  $html .= '</fieldset>';

	  // Employee Personal Details Ended Here

	  // Employee Documents Detail Started Here

	  $employee_documents_details    = EmployeeDocument::where('user_id',$user_id)->first();

	  $html .=  '<fieldset style="margin-top:20px;">
					<legend>'.ucfirst($user_profile->first_name).' '.ucfirst($user_profile->last_name) .' Employee Documents Details</legend>';
						if(!empty($employee_documents_details)){


	   		$html .=        '<div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Passport Size Images Preview</label>
        						<div class="col-md-6 col-sm-6 mb-50 ">
        						 	<div class="col-sm-12 col-md-12 passport_size_images" style="padding: 0; border: 1px solid #ced4da">'; 		  	

									  	if(!empty($employee_documents_details->emp_img)){

			                                $passport_size_images = explode(",",$employee_documents_details->emp_img);

			                                foreach ($passport_size_images as $key => $value) {

			                                	$url = url(employeePassportImagePath.'/'.$value);

		  $html .=                    			'<a href="'.$url.'">
							                        <img style="width:40%; height:100%;" src="'.$url.'" width="40%" height="100%">
						                    	</a>';

			                            	} 
			                        	}else{ 
	      $html .=                      	'<img style="display: block !important; margin:0 auto;
			      								 !important" src="'.DefaultImgPath.'" width="40%" height="100%"  alt="No image">';
		  								}

		    $html .=                '</div>  
                  				</div>
          					</div>';


          $html .= 			'<div class="form-group row" style="margin-top:20px;">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Pan Card Image Preview</label>
        						<div class="col-md-6 col-sm-6 mb-50 ">
        						 	<div class="col-sm-12 col-md-12 pan_card_div" style="padding: 0; border: 1px solid #ced4da">'; 		  	

									  	if(!empty($employee_documents_details->emp_pan_card)){

									  		$url = url(employeePancardImageBasePath.'/'.$employee_documents_details->emp_pan_card);

	     $html .=                    		'<a href="'.$url.'">
						                        <img style="width:40%; height:100%;display: block !important; margin:0 auto
			      								 !important" src="'.$url.'" width="40%" height="100%">
					                    	</a>';

			                        	}else{ 
	      $html .=                      	'<img style="display: block !important; margin:0 auto
			      								 !important" src="'.DefaultImgPath.'" width="40%" height="100%"  alt="No image"  >';
		  								}
		  $html .=                '</div>  
                  				</div>
          					</div>';								


 		  $html .=        '<div class="form-group row" style="margin-top:20px;">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Passport Images Preview</label>
        						<div class="col-md-6 col-sm-6 mb-50 ">
        						 	<div class="col-sm-12 col-md-12 id_proof_passport_images" style="padding: 0; border: 1px solid #ced4da">'; 		  	

									  	if(!empty($employee_documents_details->emp_passport)){

			                                $passport_images = explode(",",$employee_documents_details->emp_passport);

			                                foreach ($passport_images as $key => $value) {

			                                	$url = url(employeePassportImagesPath.'/'.$value);

		  $html .=                    			'<a href="'.$url.'">
							                        <img style="width:40%; height:100%;" src="'.$url.'" width="40%" height="100%">
						                    	</a>';

			                            	} 
			                        	}else{ 
	      $html .=                      	'<img style="display: block !important; margin:0 auto;
			      								 !important" src="'.DefaultImgPath.'" width="40%" height="100%"  alt="No image"  >';
		  								}
		  $html .=                '</div>  
                  				</div>
          					</div>';								

           $html .=        '<div class="form-group row" style="margin-top:20px;">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Aadhaar Card Images Preview</label>
        						<div class="col-md-6 col-sm-6 mb-50 ">
        						 	<div class="col-sm-12 col-md-12 id_proof_aadhaar_card_images" style="padding: 0; border: 1px solid #ced4da">'; 		  	

									  	if(!empty($employee_documents_details->emp_aadhaar_card)){

			                                $aadhaar_card_images = explode(",",$employee_documents_details->emp_aadhaar_card);

			                                foreach ($aadhaar_card_images as $key => $value) {

			                                	$url = url(employeeAadhaarCardImagesPath.'/'.$value);

		  $html .=                    			'<a href="'.$url.'">
							                        <img style="width:40%; height:100%;" src="'.$url.'" width="40%" height="100%">
						                    	</a>';

			                            	} 
			                        	}else{ 
	      $html .=                      	'<img style="display: block !important; margin:0 auto;
			      								 !important" src="'.DefaultImgPath.'" width="40%" height="100%"  alt="No image"  >';
			      					    }
			$html .=                '</div>  
                  				</div>
          					</div>';      					    
		  
          					
          $html .= 			'<div class="form-group row" style="margin-top:20px;">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">10th Qualification Image Preview</label>
        						<div class="col-md-6 col-sm-6 mb-50 ">
        						 	<div class="col-sm-12 col-md-12 tenth_div" style="padding: 0; border: 1px solid #ced4da">'; 		  	

									  	if(!empty($employee_documents_details->emp_tenth_qualification_img)){

									  		$url = url(tenthQualificationImagePath.'/'.$employee_documents_details->emp_tenth_qualification_img);

	     $html .=                    		'<a href="'.$url.'">
						                        <img style="width:40%; height:100%;display: block !important; margin:0 auto
			      								 !important" src="'.$url.'" width="40%" height="100%">
					                    	</a>';

			                        	}else{ 
	      $html .=                      	'<img style="display: block !important; margin:0 auto
			      								 !important" src="'.DefaultImgPath.'" width="40%" height="100%"  alt="No image"  >';
		  								}
		  $html .=                '</div>  
                  				</div>
          					</div>';
          					
          $html .= 			'<div class="form-group row" style="margin-top:20px;">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">12th Qualification Image Preview</label>
        						<div class="col-md-6 col-sm-6 mb-50 ">
        						 	<div class="col-sm-12 col-md-12 twelve_div" style="padding: 0; border: 1px solid #ced4da">'; 		  	

									  	if(!empty($employee_documents_details->emp_twelve_qualification_img)){

									  		$url = url(twelveQualificationImagePath.'/'.$employee_documents_details->emp_twelve_qualification_img);

	     $html .=                    		'<a href="'.$url.'">
						                        <img style="width:40%; height:100%;display: block !important; margin:0 auto
			      								 !important" src="'.$url.'" width="40%" height="100%">
					                    	</a>';

			                        	}else{ 
	      $html .=                      	'<img style="display: block !important; margin:0 auto
			      								 !important" src="'.DefaultImgPath.'" width="40%" height="100%"  alt="No image"  >';
		  								}
		  $html .=                '</div>  
                  				</div>
          					</div>';

           $html .=        '<div class="form-group row" style="margin-top:20px;">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Other Qualification Images Preview</label>
        						<div class="col-md-6 col-sm-6 mb-50 ">
        						 	<div class="col-sm-12 col-md-12 other_qualification_img" style="padding: 0; border: 1px solid #ced4da">'; 		  	

									  	if(!empty($employee_documents_details->emp_other_qualification_img)){

			                                $emp_other_qualification_img = explode(",",$employee_documents_details->emp_other_qualification_img);

			                                foreach ($emp_other_qualification_img as $key => $value) {

			                                	$url = url(otherQualificationImagePath.'/'.$value);

		  $html .=                    			'<a href="'.$url.'">
							                        <img style="width:40%; height:100%;" src="'.$url.'" width="40%" height="100%">
						                    	</a>';

			                            	} 
			                        	}else{ 
	      $html .=                      	'<img style="display: block !important; margin:0 auto;
			      								 !important" src="'.DefaultImgPath.'" width="40%" height="100%"  alt="No image"  >';
			      					    }
			$html .=                '</div>  
                  				</div>
          					</div>'; 

        $html .= 			'<div class="form-group row" style="margin-top:20px;">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Graduation Image Preview</label>
        						<div class="col-md-6 col-sm-6 mb-50 ">
        						 	<div class="col-sm-12 col-md-12 graduation_div" style="padding: 0; border: 1px solid #ced4da">'; 		  	

									  	if(!empty($employee_documents_details->emp_graduation_img)){

									  		$url = url(graduationImagePath.'/'.$employee_documents_details->emp_graduation_img);

	     $html .=                    		'<a href="'.$url.'">
						                        <img style="width:40%; height:100%;display: block !important; margin:0 auto
			      								 !important" src="'.$url.'" width="40%" height="100%">
					                    	</a>';

			                        	}else{ 
	      $html .=                      	'<img style="display: block !important; margin:0 auto
			      								 !important" src="'.DefaultImgPath.'" width="40%" height="100%"  alt="No image"  >';
		  								}
		  $html .=                '</div>  
                  				</div>
          					</div>';

          $html .= 			'<div class="form-group row" style="margin-top:20px;">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Post Graduation Image Preview</label>
        						<div class="col-md-6 col-sm-6 mb-50 ">
        						 	<div class="col-sm-12 col-md-12 post_graduation_div" style="padding: 0; border: 1px solid #ced4da">'; 		  	

									  	if(!empty($employee_documents_details->emp_post_graduation_img)){

									  		$url = url(postGraduationImagePath.'/'.$employee_documents_details->emp_post_graduation_img);

	     $html .=                    		'<a href="'.$url.'">
						                        <img style="width:40%; height:100%;display: block !important; margin:0 auto
			      								 !important" src="'.$url.'" width="40%" height="100%">
					                    	</a>';

			                        	}else{ 
	      $html .=                      	'<img style="display: block !important; margin:0 auto
			      								 !important" src="'.DefaultImgPath.'" width="40%" height="100%"  alt="No image"  >';
		  								}
		  $html .=                '</div>  
                  				</div>
          					</div>'; 

           $html .=        '<div class="form-group row" style="margin-top:20px;">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Other Documents Images Preview</label>
        						<div class="col-md-6 col-sm-6 mb-50 ">
        						 	<div class="col-sm-12 col-md-12 other_documents_img" style="padding: 0; border: 1px solid #ced4da">'; 		  	

									  	if(!empty($employee_documents_details->emp_other)){

			                                $emp_other = explode(",",$employee_documents_details->emp_other);

			                                foreach ($emp_other as $key => $value) {

			                                	$url = url(otherDocumentsImagePath.'/'.$value);

		  $html .=                    			'<a href="'.$url.'">
							                        <img style="width:40%; height:100%;" src="'.$url.'" width="40%" height="100%">
						                    	</a>';

			                            	} 
			                        	}else{ 
	      $html .=                      	'<img style="display: block !important; margin:0 auto;
			      								 !important" src="'.DefaultImgPath.'" width="40%" height="100%"  alt="No image"  >';
			      					    }
			$html .=                '</div>  
                  				</div>
          					</div>'; 														

                        }else{

          $html .=         '<p style="padding:20px 0px; text-align:center;                         font-weight:bold; font-size:25px;">No Details Found</p>';    		

                        	}
	  $html .= '</fieldset>';

      // Employee Previous Year Experience Details Started Here

      $employee_previous_year    = PreviousYearExperience::where('user_id',$user_id)->first();

      $previous_organisation     = isset($employee_previous_year->name_prev_organization) ? $employee_previous_year->name_prev_organization : 'NA'; 

      $years_of_experience       = isset($employee_previous_year->years_experience) ? $employee_previous_year->years_experience : 'NA'; 

      $months_experience         = isset($employee_previous_year->months_experience) ? $employee_previous_year->months_experience : 'NA'; 

      $total_experience          = isset($employee_previous_year->total_experience) ? $employee_previous_year->total_experience : 'NA';

      $annual_salary             = isset($employee_previous_year->annual_salary ) ? $employee_previous_year->annual_salary  : 'NA';

      $reason_for_resigning      = isset($employee_previous_year->reason_for_resigning  ) ? $employee_previous_year->reason_for_resigning   : 'NA';

        //  Copy of Resignation Letter Image Upload Start Here 
        if(!empty($employee_previous_year->copy_resignation_letter)) {

            $image = copyResignationLetterImagePath.'/'.$employee_previous_year->copy_resignation_letter;
            $path_info  = pathinfo($image);
            if(!empty($path_info['extension'])){
                
                $image_extension =  $path_info['extension']; 

            }else{

                $image_extension = "";
            }

        }else{
            $image_extension = "";
            $image = DefaultImgPath;
        }

        $pdf_image = url('public/images/pdf_logo.png');


        if(!empty($employee_previous_year->copy_relieving_letter)) {

            $image_c_r_l = previousRelievingLetterImagePath.'/'.$employee_previous_year->copy_relieving_letter;
            $path_info  = pathinfo($image_c_r_l);
            if(!empty($path_info['extension'])){
                
                $image_extension_c_r_l =  $path_info['extension']; 

            }else{

                $image_extension_c_r_l = "";
            }

        }else{
            $image_extension_c_r_l = "";
            $image_c_r_l = DefaultImgPath;
        }


      $html .=  '<fieldset style="margin-top:20px;">
                    <legend>'.ucfirst($user_profile->first_name).' '.ucfirst($user_profile->last_name) .' Employee Previous Year Experience</legend>';
                        if(!empty($employee_previous_year)){

      $html .= '<div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Name of the Previous Organization<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" class="form-control name_prev_organization" name="name_prev_organization" value="'.$previous_organisation.'" placeholder="Previous Organization">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Years Of Experience Organization<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" class="form-control" name="years_of_experience" value="'.$years_of_experience.'" placeholder="Year Of Experience">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Month Of Experience<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" class="form-control" name="months_experience" value="'.$months_experience.'" placeholder="Months Experience">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Total Experience<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" class="form-control" name="total_experience" value="'.$total_experience.'" placeholder="Total Experience">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Annual Salary<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" class="form-control" name="annual_salary" value="'.$annual_salary.'" placeholder="Annual Salary">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Reason For Resigning<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 ">
                        <textarea  class="form-control  reason_for_resigning" name="reason_for_resigning" placeholder="Reason For Resignation">'.$reason_for_resigning.'</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Copy Resignation Letter PDF/JPG Image Preview</label>
                    <div class="col-md-6 col-sm-6 mb-50">
                        <div class="col-sm-10 " style="padding: 0">';
                            if($image_extension == 'pdf'){

        $html .=                '<img src="'.$pdf_image.'" width="50%" height="100%" id="copy_resignation_letter" alt="No image"><a href="'.$image.'" download="" style="display: block;  margin-top:10px;"><input class="btn btn-primary" type="button" value="Download"></a>';

                            }else{ 

        $html .=                '<img src="'.$image.'" width="50%" height="100%" id="copy_resignation_letter"  alt="No image"><a href="'.$image.'" download="" style="display: block; margin-top:10px;"><input class="btn btn-primary" type="button" value="Download"></a>';
                            }
        $html .=       '</div>
                    </div>
                </div>';

        $html .='<div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Copy Relieving Letter PDF/JPG Image Preview</label>
                    <div class="col-md-6 col-sm-6 mb-50">
                        <div class="col-sm-10 " style="padding: 0">';
                        if($image_extension_c_r_l == 'pdf'){

        $html .=  '<img src="'.$pdf_image.'" width="50%" height="100%" id="copy_resignation_letter" alt="No image"><a href="'.$image_c_r_l.'" download="" style="display: block;  margin-top:10px;"><input class="btn btn-primary" type="button" value="Download"></a>';

                            }else{ 

        $html .=  '<img src="'.$image_c_r_l.'" width="50%" height="100%" id="copy_resignation_letter"  alt="No image"><a href="'.$image_c_r_l.'" download="" style="display: block; margin-top:10px;"><input class="btn btn-primary" type="button" value="Download"></a>';
                            }
        $html .=       '</div>
                    </div>
                </div>';                

                }else{

      $html .=         '<p style="padding:20px 0px; text-align:center;                         font-weight:bold; font-size:25px;">No Details Found</p>';  
                    }
      $html .= '</fieldset>';


	   echo $html;     	
    }
}
