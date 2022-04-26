<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\UserProfile;

class NewsApiController extends ApiController
{

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
}
