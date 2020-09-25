<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\EmployeesLeaveByMonth;
use App\User;
use App\Leave;
class LeaveOfTheMonth extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'employee:leaves';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Employee Multiple Leaves Scheduler';

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
        $user_data          = User::where('status','Active')->get();

        $leave_privilege_id = Leave::where('id','1')
                                    ->where('status','Active')
                                    ->first();

        foreach ($user_data as $key => $value) {
                            
            $employee_privilege_leave_add                   = new EmployeesLeaveByMonth;
            $employee_privilege_leave_add->user_id          = $value->id;
            $employee_privilege_leave_add->leave_id         = $leave_privilege_id->id;
            $employee_privilege_leave_add->leave_by_month   = "1.25";
            $employee_privilege_leave_add->save();

        }                   

    }
}
