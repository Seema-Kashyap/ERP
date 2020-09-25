<?php

namespace App\Http\Controllers\BackEnd\StatutoryManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Statutory,  App\User, App\BusinessUnit;


class StatutoryManagementController extends Controller
{

	public function index(Request $request){

    	$statutory_employee_list	= Statutory::select("emp_statutory.*","users.first_name", "users.last_name", "users.email")
			    								->join("users", "users.id", "=", "emp_statutory.user_id")
			    								->get();

        $units         				= BusinessUnit::get();

    	// echo "<pre>"; print_r($statutory_employee_list); die;

        return view("backEnd.statutory.index", compact('statutory_employee_list','units'));
	}

    public function add(Request $request){

    	$units         = BusinessUnit::get();

    	if($request->isMethod('post')){

    		$new_statutory	 						= new Statutory;
    		$new_statutory->user_id					= $request->user_id;
    		$new_statutory->emp_pfi_no	 			= $request->emp_pfi_no;
    		$new_statutory->emp_nominee_name	 	= $request->emp_nominee_name;
    		$new_statutory->emp_nominee_dob	 		= $request->emp_nominee_dob;
    		$new_statutory->emp_nominee_relation	= $request->emp_nominee_relation; 
    		
    		if($new_statutory->save()){

    			return redirect("admin/statutory-management-list")->with('success', "Statutory Detailes Added Successfully");
    		}else{

    			return redirect()->back()->with('error',COMMON_ERROR);
    		}   		
    	}

    	return view("backEnd.statutory.form", compact('units'));
    }

     public function edit(Request $request, $statutory_id){

        $statutory_edit =  Statutory::where('id',$statutory_id)->first();


        $units  = BusinessUnit::get();

        $user_unit = User::where('id',$statutory_edit->user_id)->first();

        // echo "<pre>"; print_r($user_unit); die;

        if($request->isMethod('post')){

           	$statutory_edit->user_id				= $request->user_id;
    		$statutory_edit->emp_pfi_no	 			= $request->emp_pfi_no;
    		$statutory_edit->emp_nominee_name	 	= $request->emp_nominee_name;
    		$statutory_edit->emp_nominee_dob	 	= $request->emp_nominee_dob;
    		$statutory_edit->emp_nominee_relation	= $request->emp_nominee_relation; 

            if($statutory_edit->save()){

               	return redirect("admin/statutory-management-list")->with('success', "Statutory Details  Updated Successfully");
            }else{

    			return redirect()->back()->with('error',COMMON_ERROR);
    		}
        }
       return view("backEnd.statutory.form", compact('units','statutory_edit','user_unit'));
    }

    public function delete(Request $request, $statutory_id){

    	$statutory_delete	=	Statutory::where('id', $statutory_id)->first();

    	if($statutory_delete->delete()){
    		echo "1";
    	}else{
    		echo "2";
    	}
    }


    public function user_statutory_details(Request $request, $unit_id){

        $user_details = User::where('unit_id',$unit_id)->get();

        // echo "<pre>"; print_r($user_details); die;

        $statutory_already_exists = array();

        $statutory_list =  Statutory::get();

        foreach ($statutory_list as $key => $value) {
            $statutory_already_exists[] = $value['user_id'];
        }

        if(!empty($user_details[0])){

            echo "<option value=''>Select Employee</option>";

            foreach ($user_details as $key => $value) {
                
                if(in_array($value->id, $statutory_already_exists)){

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
