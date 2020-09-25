<?php

namespace App\Http\Controllers\BackEnd\UserManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User, App\BusinessUnit;
use Mail;

class UserManagementController extends Controller
{

    public function index(Request $request){

        $user_list = User::select("users.*",'business_unit.name')
                           ->join('business_unit','business_unit.id','=','users.unit_id')
                           ->where('role_id','!=','1')
                           ->get();

        // echo "<pre>"; print_r($user_list); die;

        return view("backEnd.users.index",compact('user_list'));
    }

    public function add(Request $request){

        $units = BusinessUnit::get();

    	if($request->isMethod('post')){

    		$confirm_password = mt_rand(10, 99999);

            $security_code    = mt_rand(10,99999);
            
    		$new_user 					= new User;
    		$new_user->first_name 		= $request->first_name;
    		$new_user->last_name 		= $request->last_name;
            $new_user->personal_email   = $request->personal_email;
    		$new_user->email 			= $request->email;
    		$new_user->phone 			= $request->phone;
    		$new_user->gender 			= $request->gender;
            $new_user->security_code    = $security_code;	
    		$new_user->status 			= $request->status;	
    		$new_user->unit_id 			= $request->unit_id;
    		$new_user->confirm_password	= $confirm_password;
    		$new_user->password 		= bcrypt($confirm_password);

    		if($new_user->save()){

                $mail_sent = false;

                $email                     = $new_user->personal_email;
                $security_code_enc         = urlencode(base64_encode($security_code));
                $user_id_encode            = urlencode(base64_encode($new_user->id));
                $company_name              = "WeExpan Bussiness Management Consulting Private Limited";
                $subject                   = "Congrulations! WeExpan Bussiness Management Consulting Private Limited Admin has Created Your New Account"; 

                if(!filter_var($email,FILTER_VALIDATE_EMAIL) === false){

                    $mail_sent = true;

                    $personal_information = url('employee-personal-form/'.$user_id_encode.'/'.$security_code_enc);


                    Mail::send('emails.employee_form_link',[
                                                      'email' 			=> $email,
                                                      'company_name' 	=> $company_name,
                                                      'personal_information'  => $personal_information
                                                    ],function($message) use ($email, $company_name,$subject){

                        $message->to($email,$company_name)->subject($subject);

                    });
                }

                if($mail_sent == true){

    			    return redirect("admin/users-list")->with('success',"User Details Added SuccessFully");
                }else{

                    return redirect("admin/login")->with('warning',"User Details Added SuccessFully. Mail Failed To Sent Please Resend User Details");
                }
    		}else{

    			return redirect()->back()->with('error',COMMON_ERROR);
    		}

    	}

    	return view("backEnd.users.form",compact('units'));
    }

    public function edit(Request $request, $user_id){

        $user_edit = User::where('id',$user_id)->first();

        $units = BusinessUnit::get();

        if($request->isMethod('post')){

            $user_edit->first_name       = $request->first_name;
            $user_edit->last_name        = $request->last_name;
            $user_edit->email            = $request->email;
            $user_edit->phone            = $request->phone;
            $user_edit->gender           = $request->gender; 
            $user_edit->status           = $request->status; 
            $user_edit->unit_id          = $request->unit_id;

            if($user_edit->save()){

                return redirect("admin/users-list")->with('success',"User Details Updated SuccessFully");

            }else{

                return redirect()->back()->with('error',COMMON_ERROR);
            }

        }

        return view("backEnd.users.form",compact('user_edit','units'));
    }

    public function delete($user_id){

        $user_delete  = User::find($user_id);

        if($user_delete->delete()){

            echo "1";

        }else{

            echo "2";
        }

    }
}
