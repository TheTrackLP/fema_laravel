<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Payment;
use Carbon;

class ReportsController extends Controller
{
    public function ViewReports(){

        $payments = DB::table('payments')
        ->select('payments.*', DB::raw("CONCAT(borrowers.lastname, ', ', borrowers.firstname, ' ', borrowers.middlename) as fullname, loan_lists.ref_no, loan_plans.plan_loan"))
        ->join('borrowers', 'borrowers.id', '=', 'payments.borrower_id')
        ->join('loan_plans', 'loan_plans.id', '=', 'payments.plan_id')
        ->join('loan_lists', 'loan_lists.id', '=', 'payments.loan_id')
        ->get();

        return view('backend.report.esreports', compact('payments'));
    }

    public function FilterDate(Request $request){        

        $start = $request->start_date;
        $end = $request->end_date;

        $payments = DB::table('payments')
        ->select('payments.*', DB::raw("CONCAT(borrowers.lastname, ', ', borrowers.firstname, ' ', borrowers.middlename) as fullname, loan_lists.ref_no, loan_plans.plan_loan"))
        ->join('borrowers', 'borrowers.id', '=', 'payments.borrower_id')
        ->join('loan_plans', 'loan_plans.id', '=', 'payments.plan_id')
        ->join('loan_lists', 'loan_lists.id', '=', 'payments.loan_id')
        ->whereDate('payments.created_at', '>=', $start)
        ->whereDate('payments.created_at', '<=', $end)
        ->get();

    return view('backend.report.esreports', compact('payments'));
    }
}