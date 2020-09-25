<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\User, App\City;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function email_exists_check(Request $request){

        $email = $request->email;

        $user_email_check = User::where('email',$email)->count();

        if(!empty($user_email_check)){

            echo "false";
        }else{

            echo "true";
        }
    }

    public function email_exists_check_edit(Request $request, $user_id){

        $email = $request->email;

        $user_email_check = User::where('email',$email)
        						->where('id','!=',$user_id)
        						->count();

        if(!empty($user_email_check)){

            echo "false";
        }else{

            echo "true";
        }
    }

    public function personal_email_exists_check(Request $request){

        $personal_email = $request->personal_email;

        $user_personal_email_check = User::where('personal_email',$personal_email)->count();

        if(!empty($user_personal_email_check)){

            echo "false";
        }else{

            echo "true";
        }
    }

    public function personal_email_exists_check_edit(Request $request, $user_id){

        $personal_email = $request->personal_email;

        $user_personal_email_check = User::where('personal_email',$personal_email)
                                ->where('id','!=',$user_id)
                                ->count();

        if(!empty($user_personal_email_check)){

            echo "false";
        }else{

            echo "true";
        }
    }

    public function phone_exists_check(Request $request){

        $phone = $request->phone;

        $user_phone_check = User::where('phone',$phone)->count();

        if(!empty($user_phone_check)){

            echo "false";
        }else{

            echo "true";
        }
    }

    public function phone_exists_check_edit(Request $request, $user_id){

        $phone = $request->phone;

        $user_phone_check = User::where('phone',$phone)
        						->where('id','!=',$user_id)
        						->count();

        if(!empty($user_phone_check)){

            echo "false";
        }else{

            echo "true";
        }
    }

    public function cities(Request $request, $state_id){


        $india_cities = City::where('state_id',$state_id)
                             ->get();

        if(!empty($india_cities[0])){

            echo "<option value=''>Choose India City</option>";
            foreach ( $india_cities as $key => $value) {
                
                echo  "<option value='".$value->id."'>".$value->name."</option>";
            }

        }else{

            echo "<option value='No City Found'>No Record Found</option>";

        }
    }


}
