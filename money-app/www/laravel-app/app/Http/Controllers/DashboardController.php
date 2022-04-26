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

        $today = date('Y-m-d');
        $diff = date_diff(date_create(Auth::user()->dob), date_create($today));
        $user_age = $diff->format('%y');

        
        $user_jobs_by_title = json_decode(app('App\Http\Controllers\JobSearchController')->getJobData($user_profile->job_title));
        // var_dump($user_jobs_by_title); die;
        $user_jobs_by_skills = json_decode(app('App\Http\Controllers\JobSearchController')->getJobData($user_profile->job_skills));

        $user_job_news = json_decode(app('App\Http\Controllers\NewsApiController')->getNewsByKeyword($user_profile->job_skills));

        return view('dashboard', [
            'user_age' => $user_age,
            'user_profile' => $user_profile,
            'user_monthly_income' => $user_monthly_income,
            'user_monthly_expense' => $user_monthly_expense,
            'user_jobs_by_title' => $user_jobs_by_title,
            'user_jobs_by_skills' => $user_jobs_by_skills,
            'user_job_news' => $user_job_news
        ]);
    }
}
