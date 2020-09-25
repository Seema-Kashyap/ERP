<?php

namespace App\Http\Controllers\BackEnd\EmployeeManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AfterJoining, App\BusinessUnit, App\User, File;

class AfterJoiningManagementController extends Controller
{
    public function index(Request $request){

    	$after_joining_employee_list = AfterJoining::select("emp_after_join.*", "users.first_name", "users.last_name", "users.email")
                                          			->join("users","users.id","=","emp_after_join.user_id")
                                            		->get();

    	$units = BusinessUnit::get();

    	return view('backEnd.employees.employee_after_joining_index',compact('after_joining_employee_list','units'));

    }

    public function add(Request $request){
    	
    	$units = BusinessUnit::get();

    	if($request->isMethod('post')){

    		$new_after_joining 								=	new AfterJoining;
    		$new_after_joining->user_id						= 	$request->user_id;
    		$new_after_joining->emp_date_confirmation		=	$request->emp_date_confirmation;
            $new_after_joining->emp_extension_confirmation  =   $request->emp_extension_confirmation;
    		$new_after_joining->emp_name_bank				=	$request->emp_name_bank;
    		$new_after_joining->emp_account_no				=	$request->emp_account_no;
            $new_after_joining->status                      =   $request->status;

    		// Letter of Employment
    		if(!empty($_FILES['emp_letter_employement']['name'])){

    			$emp_letter_employement	= pathinfo($_FILES['emp_letter_employement']['name']);
    			$ext 					= $emp_letter_employement['extension'];
    			$employement_letter_new	= time().'.'.$ext;

    			if($ext == 'jpeg' || $ext == 'pdf' || $ext == 'jpg'){

    				$file_path = base_path().'/'.employmentLetterImageBasePath;

    				move_uploaded_file($_FILES['emp_letter_employement']['tmp_name'], $file_path.'/'.$employement_letter_new);

    				$new_after_joining->emp_letter_employement = $employement_letter_new; 
    			}
    		}

    		// Appointment Letter of Employment
    		if(!empty($_FILES['emp_appointment_letter']['name'])){

    			$emp_appointment_letter	= pathinfo($_FILES['emp_appointment_letter']['name']);
    			$ext 					= $emp_appointment_letter['extension'];
    			$appointment_letter_new	= time().'.'.$ext;

    			if($ext == 'jpeg' || $ext == 'pdf' || $ext == 'jpg'){

    				$file_path = base_path().'/'.appointmentLetterImageBasePath;

    				move_uploaded_file($_FILES['emp_appointment_letter']['tmp_name'], $file_path.'/'.$appointment_letter_new);

    				$new_after_joining->emp_appointment_letter = $appointment_letter_new; 
    			}
    		}

            // Confirmation Letter of Employment
            if(!empty($_FILES['emp_confirmation_letter']['name'])){

                $emp_confirmation_letter = pathinfo($_FILES['emp_confirmation_letter']['name']);
                $ext                    = $emp_confirmation_letter['extension'];
                $confirmation_letter_new = time().'.'.$ext;

                if($ext == 'jpeg' || $ext == 'pdf' || $ext == 'jpg'){

                    $file_path = base_path().'/'.confirmationLetterImageBasePath;

                    move_uploaded_file($_FILES['emp_confirmation_letter']['tmp_name'], $file_path.'/'.$confirmation_letter_new);

                    $new_after_joining->emp_confirmation_letter = $confirmation_letter_new; 
                }
            }

            // Transfer Letter of Employment
            if(!empty($_FILES['emp_transfer_letter']['name'])){

                $emp_transfer_letter = pathinfo($_FILES['emp_transfer_letter']['name']);
                $ext                    = $emp_transfer_letter['extension'];
                $transfer_letter_new = time().'.'.$ext;

                if($ext == 'jpeg' || $ext == 'pdf' || $ext == 'jpg'){

                    $file_path = base_path().'/'.transferLetterImageBasePath;

                    move_uploaded_file($_FILES['emp_transfer_letter']['tmp_name'], $file_path.'/'.$transfer_letter_new);

                    $new_after_joining->emp_transfer_letter = $transfer_letter_new; 
                }
            }


    		if($new_after_joining->save()){

    			return redirect("admin/after-joining-management-list")->with('success', "After Joining Details Added Successfully");
    		}else{

    			return redirect()->back()->with('error',COMMON_ERROR);
    		}   
    	}

    	return view('backEnd.employees.employee_after_joining_form',compact('units'));
    }

    public function edit(Request $request, $aj_id){

        $after_joining_edit = AfterJoining::where('id',$aj_id)->first();

        $user_unit = User::where('id',$after_joining_edit->user_id)->first();
        
        $units = BusinessUnit::get();

        if($request->isMethod('post')){

            $after_joining_edit->user_id                     =   $request->user_id;
            $after_joining_edit->emp_date_confirmation       =   $request->emp_date_confirmation;
            $after_joining_edit->emp_extension_confirmation  =   $request->emp_extension_confirmation;
            $after_joining_edit->emp_name_bank               =   $request->emp_name_bank;
            $after_joining_edit->emp_account_no              =   $request->emp_account_no;
            $after_joining_edit->status                      =   $request->status;

            // Letter of Employment
            if(!empty($_FILES['emp_letter_employement']['name'])){

                $emp_letter_employement = pathinfo($_FILES['emp_letter_employement']['name']);
                $ext                    = $emp_letter_employement['extension'];
                $employement_letter_new = time().'.'.$ext;

                if($ext == 'jpeg' || $ext == 'pdf' || $ext == 'jpg'){

                    $file_path = base_path().'/'.employmentLetterImageBasePath;

                    if(move_uploaded_file($_FILES['emp_letter_employement']['tmp_name'], $file_path.'/'.$employement_letter_new)){

                        if(file::exists($file_path.'/'.$employement_letter_new)){

                            file::delete($file_path.'/'.$after_joining_edit->emp_letter_employement);
                        }

                    }

                    $after_joining_edit->emp_letter_employement = $employement_letter_new; 
                }
            }

            // Appointment Letter of Employment
            if(!empty($_FILES['emp_appointment_letter']['name'])){

                $emp_appointment_letter = pathinfo($_FILES['emp_appointment_letter']['name']);
                $ext                    = $emp_appointment_letter['extension'];
                $appointment_letter_new = time().'.'.$ext;

                if($ext == 'jpeg' || $ext == 'pdf' || $ext == 'jpg'){

                    $file_path = base_path().'/'.appointmentLetterImageBasePath;

                    if(move_uploaded_file($_FILES['emp_appointment_letter']['tmp_name'], $file_path.'/'.$appointment_letter_new)){

                        if(file::exists($file_path.'/'.$appointment_letter_new)){

                            file::delete($file_path.'/'.$after_joining_edit->emp_appointment_letter);
                        }

                    }

                    $after_joining_edit->emp_appointment_letter = $appointment_letter_new; 
                }
            }

            // Confirmation Letter of Employment
            if(!empty($_FILES['emp_confirmation_letter']['name'])){

                $emp_confirmation_letter = pathinfo($_FILES['emp_confirmation_letter']['name']);
                $ext                    = $emp_confirmation_letter['extension'];
                $confirmation_letter_new = time().'.'.$ext;

                if($ext == 'jpeg' || $ext == 'pdf' || $ext == 'jpg'){

                    $file_path = base_path().'/'.confirmationLetterImageBasePath;

                    if(move_uploaded_file($_FILES['emp_confirmation_letter']['tmp_name'], $file_path.'/'.$confirmation_letter_new)){

                        if(file::exists($file_path.'/'.$confirmation_letter_new)){

                            file::delete($file_path.'/'.$after_joining_edit->emp_confirmation_letter);
                        }
                    }

                    $after_joining_edit->emp_confirmation_letter = $confirmation_letter_new; 
                }
            }

            // Transfer Letter of Employment
            if(!empty($_FILES['emp_transfer_letter']['name'])){

                $emp_transfer_letter = pathinfo($_FILES['emp_transfer_letter']['name']);
                $ext                    = $emp_transfer_letter['extension'];
                $transfer_letter_new = time().'.'.$ext;

                if($ext == 'jpeg' || $ext == 'pdf' || $ext == 'jpg'){

                    $file_path = base_path().'/'.transferLetterImageBasePath;

                    if(move_uploaded_file($_FILES['emp_transfer_letter']['tmp_name'], $file_path.'/'.$transfer_letter_new)){

                        if(file::exists($file_path.'/'.$transfer_letter_new)){

                            file::delete($file_path.'/'.$after_joining_edit->emp_transfer_letter);
                        }
                    }

                    $after_joining_edit->emp_transfer_letter = $transfer_letter_new; 
                }
            }


            if($after_joining_edit->save()){

                return redirect("admin/after-joining-management-list")->with('success', "After Joining Details Updated Successfully");
            }else{

                return redirect()->back()->with('error',COMMON_ERROR);
            }   
        }

        return view('BackEnd.employees.employee_after_joining_form',compact('units','after_joining_edit','user_unit'));
    }

    public function delete($aj_id){

        $after_joining_delete = AfterJoining::where('id',$aj_id)->first();

        $employement_letter     = base_path().'/'.employmentLetterImageBasePath;
        $confirmation_letter    = base_path().'/'.confirmationLetterImageBasePath;
        $appointment_letter     = base_path().'/'.appointmentLetterImageBasePath;
        $transfer_letter        = base_path().'/'.transferLetterImageBasePath;

        // Employment Letter Delete
        if(file::exists($employement_letter.'/'.$after_joining_delete->emp_letter_employement)){

            file::delete($employement_letter.'/'.$after_joining_delete->emp_letter_employement);
        }

        // Confirmation Letter Delete
        if(file::exists($confirmation_letter.'/'.$after_joining_delete->emp_confirmation_letter)){

            file::delete($confirmation_letter.'/'.$after_joining_delete->emp_confirmation_letter);
        }

        // Appointment Letter Delete
        if(file::exists($appointment_letter.'/'.$after_joining_delete->emp_appointment_letter)){

            file::delete($appointment_letter.'/'.$after_joining_delete->emp_appointment_letter);
        }

        // Transfer Letter Delete
        if(file::exists($transfer_letter.'/'.$after_joining_delete->emp_transfer_letter)){

            file::delete($transfer_letter.'/'.$after_joining_delete->emp_transfer_letter);
        }

        if($after_joining_delete->delete()){
            echo "1";
        }else{
            echo "2";
        }


    }

    public function user_after_join_details(Request $request, $unit_id){

        $user_details = User::where('unit_id',$unit_id)->get();

        // echo "<pre>"; print_r($user_details); die;

        $after_join_already_exists = array();

        $after_join_list =  AfterJoining::get();

        foreach ($after_join_list as $key => $value) {
            $after_join_already_exists[] = $value['user_id'];
        }

        if(!empty($user_details[0])){

            echo "<option value=''>Select Employee</option>";

            foreach ($user_details as $key => $value) {
                
                if(in_array($value->id, $after_join_already_exists)){

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
