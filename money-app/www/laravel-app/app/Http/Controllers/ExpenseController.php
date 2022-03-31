<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Expense;

class ExpenseController extends Controller
{
    /**
     * Display the Profile Income View
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('profile.expense');
    }

    /**
     * Handle an incoming Profile Income data request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'expense_type' => ['required', 'string', 'max:255'],
            'monthly_expense_amount' => ['required', 'numeric'],
        ]);

        $user = Expense::create([
            'user_id' => Auth::user()->id,
            'expense_type' => $request->expense_type,
            'monthly_expense_amount' => $request->monthly_expense_amount,
        ]);
    }
}
