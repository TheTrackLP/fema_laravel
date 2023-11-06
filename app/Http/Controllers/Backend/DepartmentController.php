<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use DB;

class DepartmentController extends Controller
{
    public function DepartmentList(){
        $departments = Department::all();
        return view('backend.department.departments', compact('departments'));
    }

    public function AddDept(Request $request){
        DB::table('departments')->insert([
            'department' => $request->department,
        ]);
        
        $notif = array(
            'message' => 'Department Adde Succussfully',
            'alert-type' => 'success',
        );

        return redirect()->route('department.list')->with($notif);
    }
}