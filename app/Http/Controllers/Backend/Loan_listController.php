<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Validator;
use App\Models\Loan_list;
use App\Models\Loan_schedules;
use App\Models\Borrower;

class Loan_listController extends Controller
{
    public function AllActives(){
        $borrowers = DB::table('borrowers')
        ->select('*')
        ->selectRaw("CONCAT(lastname, ', ', firstname, ' ', middlename) as name")
        ->get();
        
        $plans = DB::table('loan_plans')->get();
        
        $applicants = DB::table('loan_lists')
        ->select('loan_lists.*', DB::raw("CONCAT(borrowers.lastname, ', ', borrowers.firstname, ' ', borrowers.middlename) as name, borrowers.employee_id, loan_plans.plan_loan"))
        ->join('borrowers', 'borrowers.id', '=', 'loan_lists.borrower_id')
        ->join('loan_plans', 'loan_plans.id', '=', 'loan_lists.plan_id')
        ->get();
    
        return view('backend.active.actives', compact('borrowers', 'plans', 'applicants'));
    }

    public function AddActives(Request $request){
        $valid = Validator::make($request->all(), [
            'ref_no' => 'required',
            'borrower_id' => 'required',
            'purpose' => 'required',
            'amount' => 'required',
            'shared_cap' => 'required',
            'plan_id' => 'required',
        ]);

        $date = date('Y-m-d');

        if($valid->fails()){
            $fail = array(
                'message' => 'Error, Try Again!',
                'alert-type' => 'error',
            );

            return redirect()->route('all.actives')->with($fail);
        } else {
            DB::table('loan_lists')->insert([
                'ref_no' => $request->ref_no, 
                'borrower_id' => $request->borrower_id, 
                'purpose' => $request->purpose, 
                'amount' => $request->amount, 
                'amount_borrowed' => $request->amount, 
                'plan_id' => $request->plan_id,
                'shared_cap' => $request->shared_cap,
                'yservice' => $request->yservice, 
                'status' => 0, 
                'created_at' => $date,
            ]);
            $success = array(
                'message' => 'New Application Added Successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('all.actives')->with($success);
        }
    }

    public function EditActives($id){
        $actives = Loan_list::findorfail($id);

        return response()->JSON([
            'status'=>200,
            'actives'=>$actives,
        ]);
    }
    public function GetValueBorrower($id){
        $borrowers = Borrower::findorfail($id);

        return response()->JSON([
            'status'=>200,
            'borrower'=>$borrowers,
        ]);
    }

    public function UpdateActives(Request $request){

        $applicant_id = $request->id;
        $date = date('Y-m-d');

        $valid = Validator::make($request->all(), [
            'borrower_id' => 'required',
            'purpose' => 'required',
            'amount' => 'required',
            'shared_cap' => 'required',
            'plan_id' => 'required',
        ]);

        if($valid->fails()){
            $fail = array(
                'message' => 'Error, Try Again!',
                'alert-type' => 'error',
            );

            return redirect()->route('all.actives')->with($fail);
        } else {
            Loan_list::findorfail($applicant_id)->update([
                'ref_no' => $request->ref_no, 
                'borrower_id' => $request->borrower_id, 
                'purpose' => $request->purpose, 
                'amount' => $request->amount, 
                'amount_borrowed' => $request->amount, 
                'plan_id' => $request->plan_id,
                'shared_cap' => $request->shared_cap,
                'yservice' => $request->yservice, 
                'status' => $request->status, 
                'updated_at' => $date,

            ]);
                $min = 500;
                $days = 15;

                if($request->status == 2){
                    $roundoff = $request->input('amount') / $min;
                    for($i=1; $i <= $roundoff; $i++){
                        $adddate = date('Y-m-d', strtotime(date('Y-m-d'). " +".$i*$days. " days"));
                        $check = DB::table('loan_schedules')
                        ->select('*')
                        ->where('loan_id', '=', $request->id)
                        ->where('date_due', '=', $adddate)
                        ->count();

                        if($check > 0){
                            Loan_schedules::findorfail($applicant_id)->update([
                                'loan_id' => $request->id,
                                'date_due' => $adddate,
                            ]);
                        }else {
                            Loan_schedules::insert([
                                'loan_id' => $request->id,
                                'date_due' => $adddate,
                            ]);
                        }
                    }
                }

            $success = array(
                'message' => 'Success, Applicant Updated',
                'alert-type' => 'success',
            );

            return redirect()->route('all.actives')->with($success);
        }
    }
}