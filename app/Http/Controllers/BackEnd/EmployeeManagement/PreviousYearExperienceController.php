<?php

namespace App\Http\Controllers\BackEnd\EmployeeManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PreviousYearExperience, App\User, App\BusinessUnit;
use File;

class PreviousYearExperienceController extends Controller
{
    
	public function index(Request $request){


    	$previous_experience_details_list	= PreviousYearExperience::select("emp_previous_experience.*","users.first_name", "users.last_name", "users.email")
			    													->join("users", "users.id", "=", "emp_previous_experience.user_id")
			    													->get();
        $units  = BusinessUnit::get();

        return view("backEnd.employees.employee_previous_experience_index", compact('previous_experience_details_list','units'));
	}

    public function add(Request $request){

    	$units         = BusinessUnit::get();

    	if($request->isMethod('post')){

    		$new_previous_experience							=	new PreviousYearExperience;
    		$new_previous_experience->user_id					=	$request->user_id;
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

    			return redirect("admin/previous-experience-details-list")->with('success', "Previous Years Organization Details Added Successfully");
    		}else{

    			return redirect()->back()->with('error',COMMON_ERROR);
    		} 
    	}

    	return view("backEnd.employees.employee_previous_experience_form", compact('units'));
    }

     public function edit(Request $request, $previous_id){

     	$previous_details_edit = PreviousYearExperience::where('id',$previous_id)->first();

    	$units         = BusinessUnit::get();

    	$user_unit = User::where('id',$previous_details_edit->user_id)->first();

    	if($request->isMethod('post')){

    		$previous_details_edit->user_id					=	$request->user_id;
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

    			return redirect("admin/previous-experience-details-list")->with('success', "Previous Years Organization Details Updated Successfully");
    		}else{

    			return redirect()->back()->with('error',COMMON_ERROR);
    		} 
    	}

    	return view("backEnd.employees.employee_previous_experience_form", compact('units','previous_details_edit','user_unit'));
    }

    public function delete(Request $request, $previous_id){

    	$previous_experience_delete = PreviousYearExperience::where('id',$previous_id)
    														->first();

    	//  Delete Copy Resignation Letter Image Here
    	$file_path = base_path().'/'.copyResignationLetterImageBasePath;
        
        if(file::exists($file_path.'/'.$previous_experience_delete->copy_resignation_letter)){

            file::delete($file_path.'/'.$previous_experience_delete->copy_resignation_letter);
        }

        // Delete Relieving Letter Image Here
        $file_path = base_path().'/'.previousRelievingLetterImageBasePath;
        
        if(file::exists($file_path.'/'.$previous_experience_delete->copy_relieving_letter)){

            file::delete($file_path.'/'.$previous_experience_delete->copy_relieving_letter);
        }

    	if($previous_experience_delete->delete()){	

    	    echo "1";
        }else{

            echo "2";
        }


    }

    public function previous_experience_details(Request $request, $previous_id){

        $user_details = User::where('unit_id',$previous_id)->get();

        // echo "<pre>"; print_r($user_details); die;

        $previous_experience_already_exists = array();

        $previous_experience_list =  PreviousYearExperience::get();

        foreach ($previous_experience_list as $key => $value) {
            $previous_experience_already_exists[] = $value['user_id'];
        }

        if(!empty($user_details[0])){

            echo "<option value=''>Select Employee</option>";

            foreach ($user_details as $key => $value) {
                
                if(in_array($value->id, $previous_experience_already_exists)){

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