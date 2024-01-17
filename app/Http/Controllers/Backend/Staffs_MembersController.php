<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Hash;

class Staffs_MembersController extends Controller
{
    public function StaffsMembers(){
        $borrowers = DB::table('borrowers')
        ->select('borrowers.*', DB::raw("CONCAT(borrowers.lastname, ', ', borrowers.firstname, ' ', borrowers.middlename) as name"),
                                DB::raw("CONCAT(departments.departments) as dept"))
        ->join('departments', 'departments.id', '=', 'borrowers.department')
        ->get();

        $users = DB::table('users')
        ->select('users.*', DB::raw("CONCAT(borrowers.lastname, ', ', borrowers.firstname, ' ', borrowers.middlename) as name"),
                            DB::raw("borrowers.employee_id, borrowers.shared_capital, borrowers.status"))
        ->join('borrowers', 'borrowers.employee_id', '=', 'users.borrower_id')
        ->where('usertype', '=' , 'admin')
        ->get();

        return view('backend.staffs_borrower.staffs_borrowers', compact('borrowers', 'users'));
    }

    public function EditStaffMember($id){
        $staff_member = User::findorfail($id);

        return response()->JSON([
            'status' => 200,
            'staff_member' => $staff_member,
        ]);
    }

    public function UpdateStaffMember(Request $request){

        $staff_id = $request->id;

        $valid = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required',
            'new_password' => 'required',
            'current_paswword' => 'required',
        ]);
        $auth = Auth::user();

        if($valid->fails()){
            $fail = array(
                'message' => 'Error, Try Again!',
                'alert-type' => 'error',
            );

            return redirect()->route('staffs.members')->with($fail);
        } else {
                if(!Hash::check($request->get('current_password'), $auth->password))
                {
                    $failpass = array(
                        'message' => 'Current Password is Invalid',
                        'alert-type' => 'error',
                    );

                    return redirect()->route('staffs.members')->wiht($failpass);
                }

                if(strcmp($request->get('current_password'), $request->password) == 0){
                    $pass_same = array(
                        'message' => 'New Password cannot be same as your current password',
                        'alert-type' => 'error',
                    );

                    return redirect()->route('staffs.members')->wiht($pass_same);   
                }

                User::findorfail($staff_id)->update([
                    'username' => $request->username,
                    'email' => $request->email,
                    'new_password' => Hash::make($request->new_password),
                ]);

                $success = array(
                    'message' => 'Account Updated Successfully',
                    'alert-type' => 'success',
                );

                return redirect()->route('staffs.members')->with($success);
        }
    }
}