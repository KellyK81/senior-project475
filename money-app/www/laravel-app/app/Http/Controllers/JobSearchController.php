<?php

namespace App\Http\Controllers;


class JobSearchController extends ApiController
{

    public function getJobData($search_key = 'Java', $page = 1) {
        $CURLOPT_HTTPHEADER =  array(
            'X-RapidAPI-Host: job-search4.p.rapidapi.com',
            'X-RapidAPI-Key: '. env('JOB_RAPID_API_KEY')
        );
        $search_key = rawurlencode($search_key);
        $url = env('JOB_RAPID_BASE_URL')."?query=$search_key&page=$page";
        return $this->invoke_api($url, $CURLOPT_HTTPHEADER);
    }
}
