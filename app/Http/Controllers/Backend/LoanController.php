<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Validator;

class LoanController extends Controller
{
    public function LoanList(){
        $borrowers = DB::table('borrowers')
        ->select('*')
        ->selectRaw("CONCAT(lastname, ', ', firstname, ' ', middlename) as name")
        ->get();
        
        $plans = DB::table('loan_plans')->get();

        $applicants = DB::table('loan_lists')
        ->select('loan_lists.*', DB::raw("CONCAT(borrowers.lastname, ', ', borrowers.firstname, ' ', borrowers.middlename) as name, "))
        ->join('borrowers', 'borrowers.emp_id', '=', 'loan_lists.emp_id')
        ->join('loan_plans', 'loan_plans.id', '=', 'loan_lists.plan_id')
        ->get();
        
        return view('backend.loan.loan_list', compact('borrowers', 'plans', 'applicants'));
    }

    public function AddApplication(Request $request){
        $valid = Validator::make($request->all(), [
            'ref_no' => 'required',
            'emp_id' => 'required',
            'plan_id' => 'required',
            'amount' => 'required',
            'purpose' => 'required',
            'status' => 'required',
        ]);

        if($valid->fails()){
            $fail = array(
                'message' => 'Error, Try Again',
                'alert-type' => 'error',
            );

            return redirect()->route('loan.list')->with($fail);

        } else {
            $date = date("Y-m-d H:i:s");;
            DB::table('loan_lists')->insert([
                'ref_no' => $request->ref_no,
                'emp_id' => $request->emp_id,
                'plan_id' => $request->plan_id,
                'amount' => $request->amount,
                'amount_borrowed' => $request->amount_borrowed,
                'purpose' => $request->purpose,
                'status' => $request->status,
                'created_at' => $date,
            ]);

            $success = array(
                'message' => 'New Application Added Successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('loan.list')->with($success);
        }
    }
}