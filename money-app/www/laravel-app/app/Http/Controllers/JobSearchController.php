<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\UserProfile;

class JobSearchController extends Controller
{

    public function invoke_api($url) {
        $curl = curl_init();
    
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ]);
    
        $response = curl_exec($curl);
    
        curl_close($curl);
        return $response;
    }

    public function getNewsByKeyword($search_key = 'Java', $from_date = '', $to_date = '', $page = 1, $pageSize = 10) {
        if (!empty($country)) {
            $from_date = '&from='.$from_date;
        }
        if (!empty($to_date)) {
            $to_date = '&to='.$to_date;
        }

        $url = env('NEWS_BASE_URL').'everything?apiKey='.env('NEWS_API_KEY')."&q=$search_key$from_date$to_date&page=$page&pageSize=$pageSize";
        return $this->invoke_api($url);
    }

    public function getJobData() {
        $auth_user_id = Auth::user()->id;

        $user_profile = UserProfile::find($auth_user_id);
        $keywords = 'Jobs';
        if (!empty($user_profile->job_skills)) {
            $keywords = $user_profile->job_skills;
        }
        return json_decode($this->getNewsByKeyword($keywords));
    }
}
