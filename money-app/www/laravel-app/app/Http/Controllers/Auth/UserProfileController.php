<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserProfile;
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
            'job_title' => ['required', 'string', 'max:255'],
            'job_skills' => ['required', 'string', 'max:255'],
            'job_location_preference' => ['required', 'string', 'max:255'],
            'years_of_experience' => ['required'],
            'expected_retirement_age' => ['required'],
            'expected_retirement_income' => ['required'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'zipcode' => ['required', 'string', 'max:255'],
        ]);

        $userProfile = UserProfile::create([
            'user_id' => Auth::user()->id,
            'job_title' => $request->job_title,
            'job_skills' => $request->job_skills,
            'job_location_preference' => $request->job_location_preference,
            'years_of_experience' => $request->years_of_experience,
            'expected_retirement_age' => $request->expected_retirement_age,
            'expected_retirement_income' => $request->expected_retirement_income,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'zipcode' => $request->zipcode,
        ]);

        return redirect(RouteServiceProvider::INCOME);
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
