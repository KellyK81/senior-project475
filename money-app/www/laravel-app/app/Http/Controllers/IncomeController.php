<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;

class IncomeController extends Controller
{
    /**
     * Display the Profile Income View
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('profile.income');
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
            'income_source' => ['required', 'string', 'max:255'],
            'monthly_income' => ['required', 'numeric'],
        ]);

        $user = Income::create([
            'income_source' => $request->income_source,
            'monthly_income' => $request->monthly_income,
        ]);
    }
}
