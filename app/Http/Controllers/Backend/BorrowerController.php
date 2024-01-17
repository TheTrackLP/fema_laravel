<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Borrower;
use Validator;
use Hash;
use App\Models\Department;


class BorrowerController extends Controller
{
    public function AllBorrowers(){
        $borrowers = DB::table('borrowers')
        ->select('borrowers.*', DB::raw("CONCAT(borrowers.lastname, ', ', borrowers.firstname, ' ', borrowers.middlename) as name"),
                                DB::raw("CONCAT(departments.departments) as dept"))
        ->join('departments', 'departments.id', '=', 'borrowers.department')
        ->get();

        $departments = Department::all();
        
        return view('backend.borrower.borrowers', compact('borrowers', 'departments'));
    }

    public function AddBorrower(Request $request){
        $valid = Validator::make($request->all(), [
            'employee_id' => 'required',
            'department' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'contact_no' => 'required',
            'year_service' => 'required',
            'date_birth' => 'required',
            'address' => 'required',
            'shared_capital' => 'required',
            'status' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if($valid->fails()){
            $fail = array(
                'message' => 'Error, Try Again!',
                'alert-type' => 'error',
            );

            return redirect()->route('all.borrowers')->with($fail);

        } else {
            $date = date('Y-m-d H:i:s');
            DB::table('borrowers')->insert([
                'employee_id' => $request->employee_id,
                'department' => $request->department,
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'contact_no' => $request->contact_no,
                'year_service' => $request->year_service,
                'date_birth' => $request->date_birth,
                'address' => $request->address,
                'status' => $request->status,
                'shared_capital' => $request->shared_capital,
                'created_at' => $date,
            ]);
            DB::table('users')->insert([
                'borrower_id' => $request->employee_id,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'usertype' => 'user',
                'created_at' => $date,
                'username' => $request->firstname,
            ]);

            $success = array(
                'message' => 'Success, Borrower Added!',
                'alert-type' => 'success',
            );

            return redirect()->route('all.borrowers')->with($success);
        }
    }

    public function EditBorrower($id){
        $borrower = Borrower::findorfail($id);
        return response()->json([
            'status' => 200,
            'borrower' => $borrower,
        ]);
    }

    public function UpdateBorrower(Request $request){

        $borrower_id = $request->id;

        $valid = Validator::make($request->all(), [
            'employee_id' => 'required',
            'department' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'contact_no' => 'required',
            'year_service' => 'required',
            'date_birth' => 'required',
            'address' => 'required',
            'shared_capital' => 'required',
            'status' => 'required',
        ]);

        if($valid->fails()){
            $fail = array(
                'message' => 'Error, Try Again!',
                'alert-type' => 'error',
            );

            return redirect()->route('all.borrowers')->with($faild);
        } else {
            Borrower::findorfail($borrower_id)->update([
                'employee_id' => $request->employee_id,
                'department' => $request->department,
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'contact_no' => $request->contact_no,
                'year_service' => $request->year_service,
                'date_birth' => $request->date_birth,
                'address' => $request->address,
                'shared_capital' => $request->shared_capital,
                'status' => $request->status,
            ]);

            $success = array(
                'message' => 'Borrower Updated Successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('all.borrowers')->with($success);
        }
    }

    public function DeleteBorrower($id){
        Borrower::findorfail($id)->delete();

        $delete = array(
            'message' => 'Borrower Deleted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.borrowers')->with($delete);
    }
}