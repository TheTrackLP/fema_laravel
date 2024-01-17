<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Validator;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function AllDepartments(){
        $departments = Department::all();
        return view('backend.department.departments', compact('departments'));
    }

    public function AddDepartment(Request $request){
        $valid = Validator::make($request->all(), [
            'departments' => 'required',
        ]);

        if($valid->fails()){
            $fail = array(
                'message' => 'Error, Try Again!',
                'alert-type' => 'error',
            );

            return redirect()->route('all.departments')->with($fail);
        } else {
            DB::table('departments')->insert([
                'departments' => $request->departments,
            ]);
            $success = array(
                'message' => 'Success, Department Added',
                'alert-type' => 'success',
            );

            return redirect()->route('all.departments')->with($success);
        }
    }

    public function DeleteDepartment($id){
        Department::findorfail($id)->delete();

        $deleted = array(
            'message' => 'Deleted Department',
            'alert-type' => 'warning',
        );

        return redirect()->route('all.departments')->with($deleted);
    }
}