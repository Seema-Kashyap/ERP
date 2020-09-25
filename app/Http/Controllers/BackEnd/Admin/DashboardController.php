<?php

namespace App\Http\Controllers\BackEnd\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use File;
use Hash;

class DashboardController extends Controller
{
    public function dashboard(){

    	return view('backEnd.admin.dashboard');
    }

    public function my_profile(Request $request){

        $user_details = User::where('id', Auth::user()->id)->first();

        // echo "<pre>"; print_r($user_details); die;

        if($request->isMethod('post')){

    		$user_details->first_name 	= $request->first_name;
    		$user_details->last_name 	= $request->last_name;
    		$user_details->email 		= $request->email;
    		$user_details->phone 		= $request->phone;
    		$user_details->gender 		= $request->gender;	

    		if(!empty($_FILES['image']['name'])){

    			$profile_image 	= pathinfo($_FILES['image']['name']);
    			$ext 			= $profile_image['extension'];
    			$new_name 		= time().'.'.$ext;

    			if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg'){

    				$file_path = base_path().'/'.profileImageBasePath;

    				if(move_uploaded_file($_FILES['image']['tmp_name'], $file_path.'/'.$new_name)){

    					if(File::exists($file_path.'/'.$new_name)){

    						File::delete($file_path.'/'.$user_details->image);
    					}
    				}

    				$user_details->image = $new_name; 
    			}
    		}

    		if($user_details->save()){

                return redirect()->back()->with('success',"Your Profile Updated SuccessFully");

    		}else{

    			return redirect()->back()->with('error',COMMON_ERROR);
    		}

    	}
    	$page = "my_profile";
        return view('backEnd.admin.my_profile',compact('user_details','page'));

    }

    public function change_password(Request $request){

        if($request->isMethod('post')){

            $dbpassword         = User::where('id',Auth::user()->id)->value('password');
            $current_password   = $request->old_password;
            $new_password       = Hash::make($request->new_password);
            if(Hash::check($current_password, $dbpassword)){

                User::where('id',Auth::user()->id)->update(['password'=> $new_password]);
                return redirect()->back()->with('success','Password Changed Successfully');

            }else{

                return redirect()->back()->with('error','Your Current Password is Incorrect');
                
            }
        }

        $page = "change_password";
        return view('backEnd.admin.change_password',compact('page'));
    }
}
