<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Validator;

class BorrowerController extends Controller
{
    public function BorrowerList(){
        $borrowers = DB::table('borrowers')
        ->select('*')
        ->selectRaw("CONCAT(lastname, ', ', firstname, ' ', middlename) as name")
        ->get();
        return view('backend.borrower.borrowers', compact('borrowers'));
    }

    public function AddBorrower(Request $request){
        $valid = Validator::make($request->all(), [
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'contact_no' => 'required',
            'address' => 'required',
            'emp_id' => 'required',
            'date_birth' => 'required',
            'year_service' => 'required',
            'department' => 'required',
            'shared_capital' => 'required',
        ]);

        if($valid->fails()){
            $fail = array(
                'message' => 'Error, Try Again!',
                'alert-type' => 'error',
            );

            return redirect()->route('borrowers.list')->with($fail);
        }else{
            $date = date("Y-m-d H:i:s");;
            DB::table('borrowers')->insert([
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'contact_no' => $request->contact_no,
                'address' => $request->address,
                'emp_id' => $request->emp_id,
                'date_birth' => $request->date_birth,
                'year_service' => $request->year_service,
                'department' => $request->department,
                'status' => $request->status,
                'shared_capital' => $request->shared_capital,
                'created_at' => $date,
            ]);
            
            $notif = array(
                'message' => 'Borrower Added Successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('borrowers.list')->with($notif);
        }
    }
}