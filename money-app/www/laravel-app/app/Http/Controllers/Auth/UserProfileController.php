<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserProfileController extends Controller
{
    /**
     * Display the Profile view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('profile.index');
    }

    /**
     * Handle an incoming Profile data request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'dob' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'dob' => $request->dob,
        ]);

        return redirect(RouteServiceProvider::HOME);
    }


    /**
     * Display the Profile Income View
     *
     * @return \Illuminate\View\View
     */
    public function createIncome()
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
    public function storeIncome(Request $request)
    {
        $request->validate([
            'income_source' => ['required', 'string', 'max:255'],
            'monthly_income' => ['required', 'numeric'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'dob' => $request->dob,
        ]);

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Display the Profile Expense View
     *
     * @return \Illuminate\View\View
     */
    public function createExpense()
    {
        return view('profile.expense');
    }


    /**
     * Handle an incoming Profile data request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeExpense(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'dob' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'dob' => $request->dob,
        ]);

        return redirect(RouteServiceProvider::HOME);
    }
}
