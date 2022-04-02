<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserProfile;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    /**
     * Display the Profile view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // $user_profile = UserProfile::where('user_id', Auth::user()->id)->first();
        $user_profile = UserProfile::find(Auth::user()->id);

        return view('profile.index', ['user_profile' => $user_profile]);
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

        $userProfile = UserProfile::updateOrCreate(
            ['user_id' =>  Auth::user()->id],
            ['user_id' => Auth::user()->id,
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

        return redirect(RouteServiceProvider::INCOME)->with('status', 'User profile data has been saved!');;
    }
}
