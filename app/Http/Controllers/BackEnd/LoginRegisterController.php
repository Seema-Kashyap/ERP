<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Mail;
use Auth;
use Session;

class LoginRegisterController extends Controller
{
    public function login(Request $request){

        if(Auth::check()){

            return redirect("admin/dashboard")->with('success',"You Are Already Logged in");
        }

        if($request->isMethod('post')){

            $email = $request->email;
            $password = $request->password;

            $user_email = User::where('email',$email)->value('email');

            $user_status_check = User::where('email',$email)->first();

            if($user_email == NULL){

                return redirect()->back()->with('error',"No Account Registered With Us");

            }else if($user_status_check['status'] == 'Inactive' ){

                return redirect()->back()->with('warning',"Your Account is not Activated Please Check Your Email To Activate Your Account");

            }else if($user_status_check['status'] == 'Disabled' ){

                return redirect()->back()->with('warning',"Your Account is Disabled For More Information Please Contact Your Adminstrator");

            }else if (Auth::attempt(array('email' => $email, 'password' => $password))){

                $user_detail = User::where('id',Auth::user()->id)->first();

                return redirect("admin/dashboard")->with('success',"Welcome ".ucfirst($user_detail->first_name).' '.ucfirst($user_detail->last_name));
            }else{

                return redirect()->back()->with('error',"Your Password is Incorrect Please Try Again");
            }
        }
    	return view('backEnd.login');
    }

    public function register(Request $request){

        if(Auth::check()){

            return redirect("admin/dashboard");
        }

    	if($request->isMethod('post')){

    		$new_user 						= new User;
    		$new_user->first_name			= $request->first_name;
    		$new_user->last_name			= $request->last_name;
    		$new_user->email				= $request->email;
    		$new_user->phone				= $request->phone;
    		$new_user->password				= bcrypt($request->password);
    		$new_user->confirm_password		= $request->password;


    		if($new_user->save()){

                $mail_sent = false;

                $email          = $new_user->email;
                $user_id        = $new_user->id;
                $user_id_encode = urlencode(base64_encode($user_id));
                $company_name   = "WeExpan Bussiness Consulting Private Limited";
                $subject        = "Thank you For Registered In WeExpan Bussiness Consulting Private Limited"; 
                if(!filter_var($email,FILTER_VALIDATE_EMAIL) === false){

                    $mail_sent = true;

                    $activation_url = url('activate-your-account/'.$user_id_encode);

                    Mail::send('emails.activate_account',[
                                                      'email' => $email,
                                                      'company_name' => $company_name,
                                                      'activation_url' => $activation_url,
                                                    ],function($message) use ($email, $company_name,$subject){

                        $message->to($email,$company_name)->subject($subject);

                    });
                }

                if($mail_sent == true){

    			    return redirect("/")->with('success',"Thankyou For Registered. Please Check Your Email To Activate Your Account");
                }else{

                    return redirect("admin/login")->with('warning',"Thankyou For Registered. Mail Failed To Sent Please Contact Your Adminstrator To Activate Your Account");
                }
    		}else{

    			return redirect()->back()->with('error',COMMON_ERROR);
    		}
    	}

    	return view('backEnd.register');
    }

    public function activate_your_account($encoded_user_id){

        $decoded_user_id = base64_decode(urldecode($encoded_user_id));

        $user_details = User::where('id',$decoded_user_id)
                            ->where('status','Inactive')
                            ->first();

        if($user_details != NULL){

            User::where('id',$decoded_user_id)->update(['status' => 'Active']);

            return redirect("/")->with('success',"Your Account Has been Activated Successfully");

        }else if($user_details == NULL){

            return redirect("/")->with('error',"Either Your Account Has Been Already Activated Or Your Link Has Been Expired");
        }
    }

    public function logout(){

        Auth::logout();
        Session::flush();

        return redirect("/")->with('success',"Logout Successfully");
    }


}
