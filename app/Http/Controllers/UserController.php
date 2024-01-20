<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\User;

class UserController extends Controller
{
    public function UserDashboard(){
        $profile = Auth::user()->borrower_id;

        $data = DB::table('users')
        ->select('users.*', DB::raw("CONCAT(borrowers.lastname, ', ', borrowers.firstname, ' ', borrowers.middlename) as name, borrowers.shared_capital, borrowers.status"))
        ->join('borrowers', 'borrowers.employee_id', '=', 'users.emp_id')
        ->where('borrower_id', $profile)
        ->first();

        $my_loans = DB::table('loan_lists')
        ->select('loan_lists.*', DB::raw('loan_plans.plan_loan'))
        ->join('loan_plans', 'loan_plans.id' ,'=', 'loan_lists.plan_id')
        ->where('borrower_id', $profile)
        ->get();

        return view('user.user_dashboard', compact('data', 'my_loans'));
    }
    
    public function UserLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}