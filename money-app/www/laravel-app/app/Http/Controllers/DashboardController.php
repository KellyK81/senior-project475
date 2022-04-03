<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Income;
use App\Models\Expense;
use App\Models\UserProfile;

class DashboardController extends Controller
{
    /**
     * Display the Profile Income View
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $auth_user_id = Auth::user()->id;

        $user_profile = UserProfile::find($auth_user_id);
        $user_monthly_income = Income::where('user_id', $auth_user_id)->sum('monthly_income');
        $user_monthly_expense = Expense::where('user_id', $auth_user_id)->sum('monthly_expense_amount');

        return view('dashboard', [
            'user_profile' => $user_profile,
            'user_monthly_income' => $user_monthly_income,
            'user_monthly_expense' => $user_monthly_expense
        ]);
    }
}
