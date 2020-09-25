<?php

namespace App\Http\Controllers\BackEnd\PermissionManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Route;
use App\Permission, App\User, App\BusinessUnit, App\PermissionRole;
use Auth;

class PermissionManagementController extends Controller
{

	public function manage_permission_users_index(Request $request){

		if(Auth::user()->role_id == '2'){

			$users_list_with_permissions	= User::has('permissions')
												  ->where('role_id','!=','1')
												  ->where('role_id','!=','2')
												  ->where('unit_id',Auth::user()->unit_id)
												  ->get();


		}else if(Auth::user()->role_id == '1'){

			$users_list_with_permissions	= User::has('permissions')
												  ->where('role_id','!=','1')
												  ->where('role_id','!=','3')
												  ->get();
		}

		$units 							    = BusinessUnit::get();

		return view("backEnd.permissions.index",compact('units','users_list_with_permissions'));
	} 


	public function add_permissions_to_user(Request $request){

		$permissions_checked_array = array();

		$units  		 	= BusinessUnit::get();


		if(Auth::user()->role_id == '2'){

		$user_details 		=  User::where('id',Auth::user()->id)->first();


		$permissions  		= $user_details->permissions()
										   ->where('user_id', $user_details->id)
										   ->get()
										   ->toArray();

		// echo "<pre>"; print_r($permissions); die;

		}else if(Auth::user()->role_id == '1'){

			$permissions     = Permission::get();

		}

		if($request->isMethod('post')){

			$user_id 	  	  = $request->user_id;

			$permission_ids   = $request->permissions;

			$user_details 	  = User::where('id',$user_id)->first();

			$user_details->permissions()->attach($permission_ids);

			if($user_details->permissions()->where('user_id', $user_id)->exists() >= 1 ){

				return redirect("admin/manage-users-permissions")->with('success',"Permissions Added Successfully  To ".ucwords($user_details->first_name.' '.$user_details->last_name));

            }else{

    			return redirect()->back()->with('error',"No Permissions Given To ".ucwords($user_details->first_name.' '.$user_details->last_name));
    		}

		}


		return view("backEnd.permissions.form",compact('units','permissions','permissions_checked_array'));
	}

	public function edit_permissions_to_user(Request $request, $user_id){

		$units  		 	= BusinessUnit::get();

		if(Auth::user()->role_id == '2'){

		$user_details 		=  User::where('id',Auth::user()->id)->first();


		$permissions  		= $user_details->permissions()
										   ->where('user_id', $user_details->id)
										   ->get()
										   ->toArray();

		}else if(Auth::user()->role_id == '1'){

			$permissions     = Permission::get();

		}

		$user_details 		=  User::where('id',$user_id)->first();

		$permissions_exist 	=  $user_details->permissions()->where('user_id', $user_id)
											->get()
											->toArray();

		if(empty($permissions_exist[0])){

			return redirect("admin/manage-users-permissions")->with('error',"You Don't Have Permission To Access This Page");
		}

		$permissions_checked_array = array();
		foreach ($permissions_exist as $key => $value) {
			
			$permissions_checked_array[] = $value['pivot']['permission_id'];
		}

		if($request->isMethod('post')){

			$user_id 	  	  = $request->user_id;

			$permission_ids   = $request->permissions;

			$user_details 	  = User::where('id',$user_id)->first();

			if(Auth::user()->role_id == '2'){

				$user_details->permissions()->attach($permission_ids);

			}else if(Auth::user()->role_id == '1'){

				$user_details->permissions()->detach();

				$user_details->permissions()->attach($permission_ids);
			}


			if($user_details->permissions()->where('user_id', $user_id)->exists() >= 1 ){

				return redirect("admin/manage-users-permissions")->with('success',"Permissions Successfully Updated in ".ucwords($user_details->first_name.' '.$user_details->last_name));

            }else{

    			return redirect("admin/manage-users-permissions")->with('error',"Permissions Removed From ".ucwords($user_details->first_name.' '.$user_details->last_name));
    		}

		}

		return view("backEnd.permissions.form",compact('units','permissions_checked_array','user_details','units','permissions'));
	}

    public function permissions_list(Request $request){

		$permissions_data = Permission::get();

    	$units = BusinessUnit::get();

		// find admin role.
		// $admin_role = User::where('id','18')->first();// atache all permissions to admin role
		// $admin_role->permissions()->attach($permission_ids);

		return view("backEnd.permissions.permission_list",compact('permissions_data','units'));

	}

	public function permission_refresh(Request $request){

		$status = "";

		foreach (Route::getRoutes() as $key => $route)
		{
		 	// get route name
			$route_name = $route->getName();

			// Route Uri Get
			$uri 		= $route->uri(); 
			// check if this permission is already exists
			$permission_check = Permission::where('uri',$uri)->first();
			if(!$permission_check){
				$permission 			= new Permission;
				$permission->route_name = $route_name;
				$permission->uri 		= $uri;
				$permission->save();

				$status = true;

			}else{

				$status = false;

			}
		}

		if($status == true){

			return redirect()->back()->with('success',"Permission Refresh Successfully");

		}else if($status == false){

			return redirect()->back()->with('error',"Permission Already Refreshed");
		}
	}

	public function permission_update(Request $request){

    	$route_id  		    = "";
    	$unit_name 		    = "";
    	$unit_id   		    = "";
    	$route_ids_update   = "";

    	// Route Unit Name and Unit id Update

    	$sidebar_name     = $request->sidebar_name;

    	$unit_name 		  = $request->unit_name;

    	$unit_id   		  = $request->unit_id;

    	$route_ids 		  = $request->route_ids;

    	$route_ids_update = $request->route_ids_update;

    	if(!empty($route_ids[0]) && !empty($unit_name) && !empty($unit_id)){

	    	Permission::whereIn('id',$route_ids)->update(['unit_name' => $unit_name , 'unit_id' => $unit_id, 'status' => '1']);


	    	return redirect()->back()->with('success',"Permission Updated Successfully");


		}else if(!empty($route_ids[0]) && !empty($sidebar_name)){

			Permission::whereIn('id',$route_ids)->update(['sidebar_name' => $sidebar_name, 'status' => '1']);

			return redirect()->back()->with('success',"Permission Updated Successfully");

		}else if(!empty($route_ids_update[0]) && !empty($unit_name) && !empty($unit_id)){

	    	Permission::whereIn('id',$route_ids_update)->update(['unit_name' => $unit_name , 'unit_id' => $unit_id, 'status' => '1']);

			return redirect()->back()->with('success',"Permission Reupdated Successfully");

	    }else if(!empty($route_ids_update[0]) && !empty($sidebar_name)){


	    	Permission::whereIn('id',$route_ids_update)->update(['sidebar_name' => $sidebar_name, 'status' => '1']);

			return redirect()->back()->with('success',"Permission Reupdated Successfully");

	    }else{

	    	return redirect()->back()->with('error',"Permission Failed To Updated");
	    }
	}




	public function user_details_for_permissions(Request $request, $unit_id){

		if(Auth::user()->role_id == '1'){

	        $user_details = User::where('unit_id',$unit_id)
	        					->where('role_id','!=','1')
	        					->where('role_id','!=','3')
	        					->where('status','Active')
	        					->get();

		}else if(Auth::user()->role_id == '2'){

			$user_details = User::where('unit_id',$unit_id)
	        					->where('role_id','!=','1')
	        					->where('role_id','!=','2')
	        					->where('status','Active')
	        					->get();

		}

        $permissions_role_already_exists = array();

        $permissions_role =  PermissionRole::get()->toArray();

        foreach ($permissions_role as $key => $value) {
            $permissions_role_already_exists[] = $value['user_id'];
        }

        if(!empty($user_details[0])){

            echo "<option value=''>Select Employee</option>";

            foreach ($user_details as $key => $value) {
                
                if(in_array($value->id, $permissions_role_already_exists)){

                    echo "<option disabled='disabled' value='".$value->id."'>".ucfirst($value->first_name).' '.ucfirst($value->last_name)." ". "("." ".$value->email." ".")"."</option>";
                }else{

                    echo "<option role_id='".$value->role_id."'  value='".$value->id."'>".ucfirst($value->first_name).' '.ucfirst($value->last_name)." ". "("." ".$value->email." ".")"."</option>";
                }
            }

        }else{

            echo "<option value=''>No Record Found</option>";
        }

    }
}
