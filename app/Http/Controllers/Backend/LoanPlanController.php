<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Validator;

class LoanPlanController extends Controller
{
    public function LoanPLans(){
        $plans = DB::table('loan_plans')->get();

        return view('backend.plans.loan_plans', compact('plans'));
    }

    public function AddPlans(Request $request){
        $valid = Validator::make($request->all(), [
            'plan_loan' => 'required',
            'interest_percentage' => 'required',
            'penalty_rate' => 'required',
            'description' => 'required',
        ]);

        if($valid->fails()){
            $fail = array(
                'message' => 'Error, Try Again!',
                'alert-type' => 'error',
            );

            return redirect()->route('loan.plan')->with($fail);
        } else {
            DB::table('loan_plans')->insert([
                'plan_loan' => $request->plan_loan,
                'interest_percentage' => $request->interest_percentage,
                'penalty_rate' => $request->penalty_rate,
                'description' => $request->description,
            ]);

            $notif = array(
                'message' => 'Plan Added Successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('loan.plan')->with($notif);
        }
    }
}