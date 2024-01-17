<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Validator;
use App\Models\Payment;
use App\Models\Loan_list;

class PaymentsController extends Controller
{
    
    public function ViewPayments(){
        $payments = DB::table('payments')
        ->select('payments.*', DB::raw("CONCAT(borrowers.lastname, ', ', borrowers.firstname, ' ', borrowers.middlename) as fullname, loan_lists.ref_no, loan_plans.plan_loan"))
        ->join('borrowers', 'borrowers.id', '=', 'payments.borrower_id')
        ->join('loan_plans', 'loan_plans.id', '=', 'payments.plan_id')
        ->join('loan_lists', 'loan_lists.id', '=', 'payments.loan_id')
        ->get();
        
        $applicants = DB::table('loan_lists')
        ->select('loan_lists.*', DB::raw("CONCAT(borrowers.lastname, ', ', borrowers.firstname, ' ', borrowers.middlename) as fullname, borrowers.employee_id, loan_plans.plan_loan"))
        ->join('borrowers', 'borrowers.id', '=', 'loan_lists.borrower_id')
        ->join('loan_plans', 'loan_plans.id', '=', 'loan_lists.plan_id')
        ->get();

        return view('backend.payment.payments', compact('payments', 'applicants'));
    }

    public function AddPayments(Request $request){
        $valid = Validator::make($request->all(), [
            'applicant_id' => 'required',
            'of_re' => 'required',
            'paid' => 'required',
            'capital' => 'required',
            'interest' => 'required',
            'pnalty_amount' => 'required',
        ]);

        if($valid->fails()){
            $fail = array(
                'message' => 'Error, Try Again!',
                'alert-type' => 'error',
            );

            return redirect()->route('all.payments')->with($fail);
            
        } else {
            DB::table('payments')->insert([

            ]);
        }
    }

    public function GetPayments($id)
    {
        $data = Loan_list::findorfail($id);
        return response()->json([
            'status' => 200,
            'data' => $data,
        ]);
    }

    public function StorePayments(Request $request){
        $date = date('Y-m-d H:i:s');
        $valid = Validator::make($request->all(), [
           'applicant_id' => 'required',
           'of_re' => 'required',
        ]);

        if($valid->fails()){
            $fails = array();
            return redirect()->route('all.payments')->with($fails);
        } else {
            
            DB::table('payments')->insert([
                'borrower_id' => $request->applicant_id,
                'plan_id' => $request->plan_id,
                'borrower_id' => $request->borrower_id,
                'loan_id' => $request->loan_id,
                'of_re' => $request->of_re,
                'paid' => $request->paid,
                'capital' => $request->capital,
                'interest' => $request->interest,
                'pnalty_amount' => $request->pnalty_amount,
                'created_at' => $date,
            ]);
            $curr_balance = DB::table('loan_lists')
            ->select('amount')
            ->where('id', $request->applicant_id)
            ->sum('amount');

            $curr_capital = DB::table('loan_lists')
            ->select('shared_cap')
            ->where('id', $request->applicant_id)
            ->sum('shared_cap');

            $add_capital = $curr_capital + $request->input('capital');

            $remaining = $curr_balance - $request->input('paid');

            if($remaining == 0){
                Loan_list::findorfail($request->applicant_id)->update([
                    'status' => 3,
                ]);
            }

            Loan_list::findorfail($request->applicant_id)->update([
                'amount'=> $remaining,
                'shared_cap' =>$add_capital,
            ]);
            
            $success = array(
                'message' => 'Payments Successfully Added',
                'alert-type' => 'success',
            );
            
            return redirect()->route('all.payments')->with($success);
        }
    }
}