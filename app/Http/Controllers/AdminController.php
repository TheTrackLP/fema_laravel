<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class AdminController extends Controller
{
    public function AdminDashboard(){
        $pending_count = DB::table('borrowers')
        ->where('status', '=', 0)
        ->count();
        $existing_count = DB::table('borrowers')
        ->where('status', '=', 1)
        ->count();
        $active_count = DB::table('loan_lists')
        ->count();
        return view('admin.admin_dashboard', compact('pending_count', 'existing_count', 'active_count'));
    }

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function AdminLogin(){
        return view('admin.admin_login');
    }
}