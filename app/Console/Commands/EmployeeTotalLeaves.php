<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\EmployeesLeaveByMonth, App\EmployeeTotalLeaveByYear, App\User;

class EmployeeTotalLeaves extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'employee:total_leaves';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Employees Total Leaves Per Year';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $users_list = User::where('status','Active')->get();
        $user_list_array = array();

        foreach ($users_list as $key => $value) {
            
            $user_list_array[] = $value['id'];
        }

        // Privileges Leaves 
            
        $privileges_leaves = EmployeesLeaveByMonth::select("employees_leave_by_month.*","leave_type")
                                                ->join("leave_types","leave_types.id","employees_leave_by_month.leave_id")
                                                ->whereYear('employees_leave_by_month.created_at', now()->year)
                                                ->where('leave_id','1')
                                                ->whereIn('user_id',$user_list_array)
                                                ->groupBy('user_id')
                                                ->get()->toArray();


        foreach ($privileges_leaves as $key => $data) {
            

            $user_leaves_count = EmployeesLeaveByMonth::select("employees_leave_by_month.*","leave_type")
                                                            ->whereYear('employees_leave_by_month.created_at', now()->year)
                                                            ->where('leave_id','1')
                                                            ->where('user_id',$data['user_id'])
                                                            ->count();

            if(!empty($data)){

                $user_leaves_total = $data['leave_by_month'] * $user_leaves_count;

            }else{

                $user_leaves_total = "";
            }

            $employee_leaves_by_year = EmployeeTotalLeaveByYear::whereYear('created_at',now()->year)
                                                           ->where('leave_id','1')
                                                           ->where('user_id',$data['user_id'])
                                                           ->first();
                                                           
            if(!empty($employee_leaves_by_year->availed)){

                $availed = $employee_leaves_by_year['availed'];

            }else{

                $availed = 0;
            }


            if(empty($employee_leaves_by_year)){

                $new_employee_leaves_by_year                            = new EmployeeTotalLeaveByYear;
                $new_employee_leaves_by_year->user_id                   = $data['user_id'];
                $new_employee_leaves_by_year->leave_id                  = $data['leave_id'];
                $new_employee_leaves_by_year->opening_balance           = NULL;
                $new_employee_leaves_by_year->total_leaves_by_year      = $user_leaves_total;
                $new_employee_leaves_by_year->total_months_leave_credit = $user_leaves_count;
                $new_employee_leaves_by_year->closing_balance           = $user_leaves_total;
                $new_employee_leaves_by_year->save();

            }else{

                $employee_leaves_by_year->opening_balance           = NULL;
                $employee_leaves_by_year->user_id                   = $data['user_id'];
                $employee_leaves_by_year->leave_id                  = $data['leave_id'];
                $employee_leaves_by_year->total_leaves_by_year      = $user_leaves_total;
                $employee_leaves_by_year->total_months_leave_credit = $user_leaves_count;
                $employee_leaves_by_year->closing_balance           = $user_leaves_total - $availed;
                $employee_leaves_by_year->save();

            } 
        }
        
        //Sick Leave

        $sick_leaves = EmployeesLeaveByMonth::select("employees_leave_by_month.*","leave_type")
                                                ->join("leave_types","leave_types.id","employees_leave_by_month.leave_id")
                                                ->whereYear('employees_leave_by_month.created_at', now()->year)
                                                ->where('leave_id','2')
                                                ->whereIn('user_id',$user_list_array)
                                                ->groupBy('user_id')
                                                ->get()->toArray();


        foreach ($sick_leaves as $key => $data) {
            

            $user_leaves_count = EmployeesLeaveByMonth::select("employees_leave_by_month.*","leave_type")
                                                            ->whereYear('employees_leave_by_month.created_at', now()->year)
                                                            ->where('leave_id','2')
                                                            ->where('user_id',$data['user_id'])
                                                            ->count();

            if(!empty($data)){

                $user_leaves_total = $data['leave_by_month'] * $user_leaves_count;

            }else{

                $user_leaves_total = "";
            }

            $employee_leaves_by_year = EmployeeTotalLeaveByYear::whereYear('created_at',now()->year)
                                                           ->where('leave_id','2')
                                                           ->where('user_id',$data['user_id'])
                                                           ->first();
                                                           
            if(!empty($employee_leaves_by_year->availed)){

                $availed = $employee_leaves_by_year['availed'];

            }else{

                $availed = 0;
            }


            if(empty($employee_leaves_by_year)){

                $new_employee_leaves_by_year                            = new EmployeeTotalLeaveByYear;
                $new_employee_leaves_by_year->user_id                   = $data['user_id'];
                $new_employee_leaves_by_year->leave_id                  = $data['leave_id'];
                $new_employee_leaves_by_year->opening_balance           = "Not Available";
                $new_employee_leaves_by_year->total_leaves_by_year      = $user_leaves_total;
                $new_employee_leaves_by_year->total_months_leave_credit = $user_leaves_count;
                $new_employee_leaves_by_year->closing_balance           = $user_leaves_total;
                $new_employee_leaves_by_year->save();

            }else{

                $employee_leaves_by_year->opening_balance           = "Not Available";
                $employee_leaves_by_year->user_id                   = $data['user_id'];
                $employee_leaves_by_year->leave_id                  = $data['leave_id'];
                $employee_leaves_by_year->total_leaves_by_year      = $user_leaves_total;
                $employee_leaves_by_year->total_months_leave_credit = $user_leaves_count;
                $employee_leaves_by_year->closing_balance           = $user_leaves_total - $availed;
                $employee_leaves_by_year->save();

            } 
        }
    }
}
