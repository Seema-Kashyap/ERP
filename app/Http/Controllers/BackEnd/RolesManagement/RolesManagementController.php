<?php

namespace App\Http\Controllers\BackEnd\RolesManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User, App\Role, App\BusinessUnit;

class RolesManagementController extends Controller
{
    public function assign_roles_index(Request $request){

    	$assign_role_users = User::select("users.*","roles.name")
				    		->join("roles","roles.id","users.role_id")
				    		->where("role_id","!=","1")
                            ->where("role_id",'!=',"3")
				    		->get();

		// echo "<pre>"; print_r($assign_role_users); die;

		$units         	  = BusinessUnit::get();

		return view("backEnd.assign_roles.index",compact('assign_role_users','units'));
    }

    public function add_role_to_user(Request $request){

    	$roles = Role::where("id",'!=','1')
                     ->get();

    	$units = BusinessUnit::get();

    	if($request->isMethod('post')){

	    	$user_id = $request->user_id;

	    	$add_user_role =  User::where('id',$user_id)->first();

	    	$add_user_role->role_id = $request->role_id;


	    	if($add_user_role->save()){

	            return redirect("admin/manage-assign-roles")->with('success',"User Role Added Successfully");
	        }else{

				return redirect()->back()->with('error',COMMON_ERROR);
			}

    	}

    	return view("backEnd.assign_roles.form",compact('units','roles'));
    }

    public function edit_role_to_user(Request $request, $user_id){

    	$user_role_edit =  User::where('id',$user_id)->first();

    	$roles = Role::where("id",'!=','1')->get();

    	$units = BusinessUnit::get();

    	if($request->isMethod('post')){

	    	$user_role_edit->role_id = $request->role_id;


	    	if($user_role_edit->save()){

	            return redirect("admin/manage-assign-roles")->with('success',"User Role Updated Successfully");
	        }else{

				return redirect()->back()->with('error',COMMON_ERROR);
			}

    	}
    	
    	return view("backEnd.assign_roles.form",compact('units','roles','user_role_edit'));
    }

    public function user_details_for_assign_role(Request $request, $unit_id){

    	$user_details = User::where('unit_id',$unit_id)
                            ->where('role_id','!=','1')
                            ->where('status','Active')
                            ->get();

        // echo "<pre>"; print_r($user_details); die;

        $user_details_role_exists = array();

        $role_ids =  Role::where("id",'!=','1')
                         ->where('id','!=','3')
                         ->get()->toArray();

        // echo "<pre>"; print_r($role_ids); die;

        foreach ($role_ids as $key => $value) {
            $user_details_role_exists[] = $value['id'];
        }

        if(!empty($user_details[0])){

            echo "<option value=''>Select Employee</option>";

            foreach ($user_details as $key => $value) {
                
                if(in_array($value->role_id, $user_details_role_exists)){

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
