<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\UserProfile;

class JobSearchController extends ApiController
{

    private function getJobData($search_key, $page = 1) {
        $CURLOPT_HTTPHEADER =  array(
            'X-RapidAPI-Host: '. env('JOB_X_RAPID_HOST'),
            'X-RapidAPI-Key: ' . env('JOB_X_RAPID_API_KEY')
        );
        $search_key = rawurlencode($search_key);
        $url = env('JOB_X_RAPID_BASE_URL')."?query=$search_key&page=$page";
        return $this->invoke_api($url, $CURLOPT_HTTPHEADER);
    }

    public function getJobs($user_id) {
        
        $user_profile = UserProfile::find($user_id);
        if (empty($user_profile->job_title)) {
            return null;
        }

        return json_decode($this->getJobData($user_profile->job_title));

        // json_decode(app('App\Http\Controllers\JobSearchController')->getJobData($user_profile->job_skills));
    }

    public function getJobsBySearchTerms($search_terms) {
        if (empty($search_terms)) return null;
        
        return json_decode($this->getJobData($search_terms));
    }

    /**
     * Display the Dashboard
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        // $job_search_result = json_decode($this->getJobData($request->search_terms));

        return view('search', [
            'search_terms' => $request->search_terms
        ]);
    }

}
