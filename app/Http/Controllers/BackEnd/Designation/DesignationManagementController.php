<?php

namespace App\Http\Controllers\BackEnd\Designation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Designation, App\BusinessUnit;

class DesignationManagementController extends Controller
{
    public function index(Request $request){

    	$designation_list = Designation::select("designation.*",'business_unit.name')
                                        ->join('business_unit','business_unit.id','=','designation.business_unit_id')
                                        ->get();

    	// echo "<pre>"; print_r($designation_list); die;

        return view("backEnd.designation.index", compact('designation_list'));
	}

    public function add(Request $request){

    	$units = BusinessUnit::get();

    	// echo "<pre>"; print_r($units); die;

        if($request->isMethod('post')){

            $new_designation          			= new Designation;
            $new_designation->business_unit_id 	= $request->business_unit_id;
            $new_designation->designation_name  = $request->designation_name;
            $new_designation->level    			= $request->level;
            $new_designation->status  			= $request->status;

            if($new_designation->save()){

                return redirect("admin/designation-management-list")->with('success',"Designation Added Successfully");
            }
        }
        return view("backEnd.designation.form",compact('units'));
    }

    public function edit(Request $request, $b_m){

        $designation_edit = Designation::where('id',$b_m)->first();

        $units = BusinessUnit::get();

        // echo "<pre>"; print_r($business_unit_edit); die;

        if($request->isMethod('post')){

        	$designation_edit->business_unit_id    = $request->business_unit_id;
            $designation_edit->designation_name    = $request->designation_name;
            $designation_edit->level    		   = $request->level;
            $designation_edit->status  		       = $request->status;

            if($designation_edit->save()){

                return redirect("admin/designation-management-list")->with('success',"Designation Unit Updated Successfully");
            }
        }
        return view("backEnd.designation.form",compact('designation_edit','units'));
    }

    public function delete(Request $request, $b_m){

        $designation_delete = Designation::find($b_m);

        if($designation_delete->delete()){

            echo "1";
        }else{

            echo "2";
        }
    }
}
