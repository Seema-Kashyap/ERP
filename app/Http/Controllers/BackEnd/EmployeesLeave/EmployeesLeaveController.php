<?php

namespace App\Http\Controllers\BackEnd\EmployeesLeave;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EmployeesLeaveByMonth;
use App\EmployeeTotalLeaveByYear;
use Auth;
use Carbon\Carbon;
use App\User;

class EmployeesLeaveController extends Controller
{
    public function leaves_by_year_month(Request $request){

    	

    	return view("backEnd.employees_leave.leaves_by_year_month");
    }

    public function leaves_by_year_month_ajax(Request $request){

    	$month = $request->month;

    	$year  = $request->year;

    	$user_leaves_current_by_month_year = EmployeesLeaveByMonth::select("employees_leave_by_month.*","leave_type")
				    											   ->join("leave_types","leave_types.id","employees_leave_by_month.leave_id")
																	->whereYear('employees_leave_by_month.created_at', $year)
																	->whereMonth('employees_leave_by_month.created_at', $month)
					    											->where('user_id',Auth::user()->id)
					    											->get()
					    											->toArray();

	    $privileges_leaves_count = EmployeesLeaveByMonth::select("employees_leave_by_month.*","leave_type")
															->whereYear('employees_leave_by_month.created_at', $year)
															->whereMonth('employees_leave_by_month.created_at', '<=', $month)
			    											->where('user_id',Auth::user()->id)
			    											->where('leave_id','1')
			    											->count();

		$sickleave_count = EmployeesLeaveByMonth::select("employees_leave_by_month.*","leave_type")
															->whereYear('employees_leave_by_month.created_at', $year)
															->whereMonth('employees_leave_by_month.created_at', '<=', $month)
			    											->where('user_id',Auth::user()->id)
			    											->where('leave_id','2')
			    											->count();

		// echo "<pre>"; print_r($sickleave_count); die;	    											
		if(!empty($user_leaves_current_by_month_year[0])){

		    foreach ($user_leaves_current_by_month_year as $key => $value) {

		    	if($value['leave_id'] == '1'){

		    		echo  	"<tr><td>".$value['leave_type']."</td><td>".$value['leave_by_month'] * $privileges_leaves_count."</td></tr>";

		    	}else if($value['leave_id'] == '2'){

		    		echo  	"<tr><td>".$value['leave_type']."</td><td>".$value['leave_by_month'] * $sickleave_count."</td></tr>";

		    	}

		    }

		}else{

			echo "<tr><td colspan='2' align='center'>No Record Found</td></tr>";
		}											
    }

    public function leaves_by_year(Request $request){


		return view("backEnd.employees_leave.leaves_by_year");
    }

    public function leaves_by_year_ajax(Request $request){

    	$year  = $request->year;


    	$user_leaves_current_year = EmployeeTotalLeaveByYear::select("employee_total_leaves_by_year.*","leave_type")
												->join("leave_types","leave_types.id","employee_total_leaves_by_year.leave_id")
												->whereYear('employee_total_leaves_by_year.created_at', $year)
												->where('user_id',Auth::user()->id)
												->get()
												->toArray();

		if(!empty($user_leaves_current_year[0])){

		    foreach ($user_leaves_current_year as $key => $value) {

		    	echo  	"<tr><td>".$value['leave_type']."</td>
		    				<td>".$value['opening_balance']."</td>
		    				<td>".$value['total_leaves_by_year']."</td>
		    				<td>".$value['total_months_leave_credit']."</td>
		    				<td>".$value['availed']."</td>
		    				<td>".$value['closing_balance']."</td>
		    			</tr>";
		    }

		}else{

			echo "<tr><td colspan='6' align='center'>No Record Found</td></tr>";
		}

    }
}
