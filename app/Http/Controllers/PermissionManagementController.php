<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermissionModel;

class PermissionManagementController extends Controller
{
    public function index(){

        $permissions=PermissionModel::select("*")
        ->get();

        return view('admin/permission_management',['permissions'=>$permissions]);
    }
    public function delete_permission($id){
        $permission=PermissionModel::find($id);

        PermissionModel::where('id', $id)-> delete();

        return back()->with('message','Permission is deleted successfully!'); 
    }

    public function create_permission(Request $request){
        $name=$request->name;
        $label=$request->label;

        $permission=PermissionModel::create([
            "name" => $name,
            "label" => $label,
        ]);
        
        return redirect()->back()->with('message','Permission is created successfully!'); 

    }
}
