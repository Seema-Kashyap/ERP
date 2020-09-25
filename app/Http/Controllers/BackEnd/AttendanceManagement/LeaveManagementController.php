<?php

namespace App\Http\Controllers\BackEnd\AttendanceManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\leave;

class LeaveManagementController extends Controller
{
	public function index(Request $request){

		$leave_list = Leave::get();

		return view("backEnd.attendance.leave_index", compact('leave_list'));
	}

    public function add(Request $request){

    	if($request->isMEthod('post')){

    		$new_leave				=	new Leave;
    		$new_leave->leave_type	=	$request->leave_type;
    		$new_leave->status 		=	$request->status;

    		if($new_leave->save()){
    			return redirect("admin/leave-management-list")->with('success',"Leave Type Added Successfully");
    		}
	    }

	    return view("backEnd.attendance.leave_form");
    }


    public function edit(Request $request, $leave_id){

    	 $leave_edit =  Leave::where('id',$leave_id)->first();

    	if($request->isMethod('post')){

    		$leave_edit->leave_type	=	$request->leave_type;
    		$leave_edit->status 	=	$request->status;

    		if($leave_edit->save()){
    			return redirect("admin/leave-management-list")->with('success',"Leave Type Updated Successfully");
    		}
	    }

	    return view("backEnd.attendance.leave_form", compact('leave_edit'));
    }

    public function delete(Request $request, $leave_id){

    	$leave_delete 	=	Leave::where('id',$leave_id)->first();

    	if($leave_delete->delete()){

    		echo "1";
    	}else{
    		echo "2";
    	}
    }
}
