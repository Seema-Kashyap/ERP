<?php

namespace App\Http\Controllers\BackEnd\AssetManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AssetDetail,  App\User, App\BusinessUnit;

class AssetManagementController extends Controller
{

	public function index(Request $request){

    	$asset_list = AssetDetail::select("it_assets.*","users.first_name", "users.last_name", "users.email")
                                 ->join("users","users.id","=","it_assets.user_id")
                                 ->get();

    	// echo "<pre>"; print_r($asset_list); die;

        return view("backEnd.it_assets.index", compact('asset_list'));
	}

    public function add(Request $request){

        $units         = BusinessUnit::get();

        if($request->isMethod('post')){

            $new_asset                      = new AssetDetail;
            $new_asset->user_id             = $request->user_id;
            $new_asset->asset_issued        = $request->asset_name;
            $new_asset->asset_issued        = $request->asset_issued;
            $new_asset->asset_serial_no     = $request->asset_serial_no;
            $new_asset->asset_date_issued   = $request->asset_date_issued;
            $new_asset->asset_remarks     	= $request->asset_remarks;

            if($new_asset->save()){

                return redirect("admin/asset-management-list")->with('success',"Asset Details Added Successfully");
            }
        }
        return view("backEnd.it_assets.form", compact('units'));
    }

    public function edit(Request $request, $asset_id){

        $asset_edit =  AssetDetail::where('id',$asset_id)->first();


        $units  = BusinessUnit::get();

        $user_unit = User::where('id',$asset_edit->user_id)->first();

        // echo "<pre>"; print_r($user_unit); die;

        if($request->isMethod('post')){

            $asset_edit->user_id             = $request->user_id;
            $asset_edit->asset_issued        = $request->asset_name;
            $asset_edit->asset_issued        = $request->asset_issued;
            $asset_edit->asset_serial_no     = $request->asset_serial_no;
            $asset_edit->asset_date_issued   = $request->asset_date_issued;
            $asset_edit->asset_remarks       = $request->asset_remarks;

            if($asset_edit->save()){

                return redirect("admin/asset-management-list")->with('success',"Asset Details Updated Successfully");
            }
        }
        return view("backEnd.it_assets.form", compact('units','user_unit', 'asset_edit'));
    }

    public function delete(Request $request, $asset_id){

        $asset_delete = AssetDetail::where('id', $asset_id)->first();

        if($asset_delete->delete()){

            echo "1";
        }else{

            echo "2";
        }
    }

    public function user_details_assets(Request $request, $unit_id){

        $user_details = User::where('unit_id',$unit_id)->get();

        // echo "<pre>"; print_r($user_details); die;

        if(!empty($user_details[0])){

            echo "<option value=''>Select Employee</option>";

            foreach ($user_details as $key => $value) {

                echo "<option  value='".$value->id."'>".ucfirst($value->first_name).' '.ucfirst($value->last_name)." ". "("." ".$value->email." ".")"."</option>";
                
            }

        }else{

            echo "<option value=''>No Record Found</option>";
        }

    }


}
