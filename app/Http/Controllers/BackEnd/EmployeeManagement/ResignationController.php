<?php

namespace App\Http\Controllers\BackEnd\EmployeeManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Resignation, App\User, App\BusinessUnit;
use File;

class ResignationController extends Controller
{
    public function index(Request $request){

    $resignation_employee_list =    Resignation::select("employees_resignation.*", "users.first_name", "users.last_name", "users.email")

                                                ->join("users","users.id","=","employees_resignation.user_id")
                                                ->get();

    $units                     = BusinessUnit::get();

	return view("backEnd.employees.employee_resignation_index", compact('resignation_employee_list','units'));
    }


    public function add(Request $request){

    	$units         = BusinessUnit::get();

    	if($request->isMethod('post')){

    		$new_resignation 								=	new Resignation;
    		$new_resignation->user_id 						=	$request->user_id;
    		$new_resignation->emp_reason_resig 				=	$request->emp_reason_resig;
    		$new_resignation->emp_date_resigning_letter 	=	$request->emp_date_resigning_letter;
    		$new_resignation->emp_date_relieving 			=	$request->emp_date_relieving;
    		$new_resignation->emp_resigned 					=	$request->emp_resigned;
    		$new_resignation->emp_resigned_date 			=	$request->emp_resigned_date;

    		if(!empty($_FILES['emp_ipr_letter']['name'])){

    			$ipr_letter 	= pathinfo($_FILES['emp_ipr_letter']['name']);
    			$ext 			= $ipr_letter['extension'];
    			$new_name 		= time().'.'.$ext;

    			if($ext == 'jpeg' || $ext == 'pdf' || $ext == 'jpg'){

    				$file_path = base_path().'/'.iprLetterImageBasePath;

    				move_uploaded_file($_FILES['emp_ipr_letter']['tmp_name'], $file_path.'/'.$new_name);

    				$new_resignation->emp_ipr_letter = $new_name; 
    			}
    		}

    		if($new_resignation->save()){

    			return redirect("admin/resignation-management-list")->with('success', "Resignation Detailes Added Successfully");
    		}else{

    			return redirect()->back()->with('error',COMMON_ERROR);
    		}   

    	}    	
        return view("backEnd.employees.employee_resignation_form", compact('units'));
    }

    public function edit(Request $request, $resignation_id){


        $resignation_edit =  Resignation::where('id',$resignation_id)->first();


        $units  = BusinessUnit::get();

        $user_unit = User::where('id',$resignation_edit->user_id)->first();

        if($request->isMethod('post')){

            
            $resignation_edit->user_id                       =   $request->user_id;
            $resignation_edit->emp_reason_resig              =   $request->emp_reason_resig;
            $resignation_edit->emp_date_resigning_letter     =   $request->emp_date_resigning_letter;
            $resignation_edit->emp_date_relieving            =   $request->emp_date_relieving;
            $resignation_edit->emp_resigned                  =   $request->emp_resigned;
            $resignation_edit->emp_resigned_date             =   $request->emp_resigned_date;

            if(!empty($_FILES['emp_ipr_letter']['name'])){

    			$ipr_letter 	= pathinfo($_FILES['emp_ipr_letter']['name']);
    			$ext 			= $ipr_letter['extension'];
    			$new_name 		= time().'.'.$ext;

    			if($ext == 'jpeg' || $ext == 'pdf' || $ext == 'jpg'){

    				$file_path = base_path().'/'.iprLetterImageBasePath;

    				if(move_uploaded_file($_FILES['emp_ipr_letter']['tmp_name'], $file_path.'/'.$new_name)){

    					if(file::exists($file_path.'/'.$new_name)){

    						file::delete($file_path.'/'.$resignation_edit->emp_ipr_letter);
    					}
    				}
    				$resignation_edit->emp_ipr_letter = $new_name; 
    			}
    		}

            if($resignation_edit->save()){

                return redirect("admin/resignation-management-list")->with('success', "Resignation Detailes Updated Successfully");
            }else{

                return redirect()->back()->with('error',COMMON_ERROR);
            }   

        }       
        return view("backEnd.employees.employee_resignation_form", compact('resignation_edit','units','user_unit'));
    }

    public function delete(Request $request, $resignation_id){

        $resignation_delete = Resignation::where('id',$resignation_id)->first();

        $file_path = base_path().'/'.iprLetterImageBasePath;
        
        if(file::exists($file_path.'/'.$resignation_delete->emp_ipr_letter)){

            file::delete($file_path.'/'.$resignation_delete->emp_ipr_letter);
        }

        if($resignation_delete->delete()){
            echo "1";
        }else{
            echo "2";
        }
    }

    public function user_resignation_details(Request $request, $unit_id){

        $user_details = User::where('unit_id',$unit_id)->get();

        // echo "<pre>"; print_r($user_details); die;

        $resignation_already_exists = array();

        $resignation_list =  Resignation::get();

        foreach ($resignation_list as $key => $value) {
            $resignation_already_exists[] = $value['user_id'];
        }

        if(!empty($user_details[0])){

            echo "<option value=''>Select Employee</option>";

            foreach ($user_details as $key => $value) {
                
                if(in_array($value->id, $resignation_already_exists)){

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
