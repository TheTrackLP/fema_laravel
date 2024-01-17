<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Validator;

class PlanController extends Controller
{
    public function AllPlans(){
        $plans = DB::table('loan_plans')->get();
        return view('backend.plan.plans', compact('plans'));
    }

    public function AddPlan(Request $request){
        $valid = Validator::make($request->all(), [
            'plan_loan' => 'required',
            'interest_percentage' => 'required',
            'penalty_rate' => 'required',
            'description' => 'required',
        ]);

        if($valid->fails()){
            $fails = array(
                'message' => 'Error, Try Again!',
                'alert-type' => 'error',
            );

            return redirect()->route('all.plans')->with($fails);

        } else {
            $date = date('Y/m/d h:i:s');
            DB::table('loan_plans')->insert([
                'plan_loan' => $request->plan_loan,
                'interest_percentage' => $request->interest_percentage,
                'penalty_rate' => $request->penalty_rate,
                'description' => $request->description,
            ]);

            $success = array(
                'message' => 'Success, Plan Added',
                'alert-type' => 'success',
            );

            return redirect()->route('all.plans')->with($success);
        }
    }
}