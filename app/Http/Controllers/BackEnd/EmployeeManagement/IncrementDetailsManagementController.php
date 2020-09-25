<?php

namespace App\Http\Controllers\BackEnd\EmployeeManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EmployeeIncrementDetail, App\User, App\BusinessUnit;

class IncrementDetailsManagementController extends Controller
{

	public function index(Request $request){


    	$increment_details_list	= EmployeeIncrementDetail::select("emp_increment_details.*","users.first_name", "users.last_name", "users.email")
			    								->join("users", "users.id", "=", "emp_increment_details.user_id")
			    								->get();

        $units         				= BusinessUnit::get();

    	// echo "<pre>"; print_r($statutory_employee_list); die;

        return view("backEnd.employees.employee_increment_details_index", compact('increment_details_list','units'));


	}
    public function add(Request $request){

    	$units		=	BusinessUnit::get();

    	if($request->isMethod('post')){

    		$new_increment_detail							=	new EmployeeIncrementDetail;
    		$new_increment_detail->user_id					=	$request->user_id;
    		$new_increment_detail->emp_period_increment		=	$request->emp_period_increment;
    		$new_increment_detail->emp_current_salary		=	$request->emp_current_salary;
    		$new_increment_detail->emp_increased_salary		=	$request->emp_increased_salary;
    		$new_increment_detail->emp_emp_esicno_mediclaim	=	$request->emp_emp_esicno_mediclaim;

    		if($new_increment_detail->save()){

    			return redirect("admin/increment-details-management-list")->with('success', "Increment Details Added Successfully");
    		}else{

    			return redirect()->back()->with('error',COMMON_ERROR);
    		} 

    	}

    	return view("backEnd.employees.employee_increment_details_form",compact('units'));
    }

    public function edit(Request $request, $increment_detail_id){

    	$increment_details_edit =  EmployeeIncrementDetail::where('id',$increment_detail_id)->first();


        $units  = BusinessUnit::get();

        $user_unit = User::where('id',$increment_details_edit->user_id)->first();

        // echo "<pre>"; print_r($user_unit); die;

        if($request->isMethod('post')){

           	$increment_details_edit->user_id					= $request->user_id;
    		$increment_details_edit->emp_period_increment		= $request->emp_period_increment;
    		$increment_details_edit->emp_current_salary	 		= $request->emp_current_salary;
    		$increment_details_edit->emp_increased_salary	 	= $request->emp_increased_salary;
    		$increment_details_edit->emp_emp_esicno_mediclaim	= $request->emp_emp_esicno_mediclaim; 

            if($increment_details_edit->save()){

               	return redirect("admin/increment-details-management-list")->with('success', "Increment Details  Updated Successfully");
            }else{

    			return redirect()->back()->with('error',COMMON_ERROR);
    		}
        }
       return view("backEnd.employees.employee_increment_details_form", compact('units','increment_details_edit','user_unit'));
    }

    public function delete(Request $request, $increment_detail_id){

    	$new_increment_detail_delete 	=	EmployeeIncrementDetail::where('id',$increment_detail_id)->first();
    	if($new_increment_detail_delete->delete()){
    		echo "1";
    	}else{
    		echo "2";
    	}
    }

    public function increment_details(Request $request, $unit_id){

        $user_details = User::where('unit_id',$unit_id)->get();

        // echo "<pre>"; print_r($user_details); die;

        $increments_already_exists = array();

        $increments_list =  EmployeeIncrementDetail::get();

        foreach ($increments_list as $key => $value) {
            $increments_already_exists[] = $value['user_id'];
        }

        if(!empty($user_details[0])){

            echo "<option value=''>Select Employee</option>";

            foreach ($user_details as $key => $value) {
                
                if(in_array($value->id, $increments_already_exists)){

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
