<?php

namespace App\Http\Controllers\BackEnd\BusinessManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BusinessUnit;

class BusinessManagementController extends Controller
{
    public function index(Request $request){

        $unit_list = BusinessUnit::get();

        return view("backEnd.business_unit.index", compact('unit_list'));
    }



    public function add(Request $request){

        if($request->isMethod('post')){

            $new_business_unit                      = new BusinessUnit;
            $new_business_unit->name                = $request->name;
            $new_business_unit->business_unit_url   = str_replace(" ", "-", strtolower($request->business_unit_url));
            $new_business_unit->status              = $request->status;

            if($new_business_unit->save()){

                return redirect("admin/business-management-list")->with('success',"Business Unit Added Successfully");
            }
        }
        return view("backEnd.business_unit.form");
    }

    public function edit(Request $request, $b_m){

        $business_unit_edit = BusinessUnit::where('id',$b_m)->first();

        // echo "<pre>"; print_r($business_unit_edit); die;

        if($request->isMethod('post')){

            $business_unit_edit->name                = $request->name;
            $business_unit_edit->business_unit_url   = str_replace(" ", "-", strtolower($request->business_unit_url));
            $business_unit_edit->status              = $request->status;

            if($business_unit_edit->save()){

                return redirect("admin/business-management-list")->with('success',"Business Unit Updated Successfully");
            }
        }
        return view("backEnd.business_unit.form",compact('business_unit_edit'));
    }

    public function delete(Request $request, $b_m){

        $business_unit_delete = BusinessUnit::find($b_m);

        if($business_unit_delete->delete()){

            echo "1";

        }else{

            echo "2";
        }
    }
}
