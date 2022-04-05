<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class JobSearchController extends Controller
{
    const API_KEY = '';
    const BASE_URL = 'indeed-indeed.p.rapidapi.com';

    public static function invoke_api($location, $skills) {
        $curl = curl_init();
    
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://indeed-indeed.p.rapidapi.com/apisearch?publisher=undefined&v=2&format=json&callback=%3CREQUIRED%3E&q=java&l=austin%2C%20tx&sort=%3CREQUIRED%3E&radius=25&st=%3CREQUIRED%3E&jt=%3CREQUIRED%3E&start=%3CREQUIRED%3E&limit=%3CREQUIRED%3E&fromage=%3CREQUIRED%3E&highlight=%3CREQUIRED%3E&filter=%3CREQUIRED%3E&latlong=%3CREQUIRED%3E&co=%3CREQUIRED%3E&chnl=%3CREQUIRED%3E&userip=%3CREQUIRED%3E&useragent=%3CREQUIRED%3E",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: " . self::BASE_URL,
                "X-RapidAPI-Key: " . self::API_KEY
            ],
        ]);
    
        $response = curl_exec($curl);
    
        curl_close($curl);
        return $response;
    }

    public function getJobData() {
        return json_decode(self::invoke_api('austin,tx', 'java'));
    }
}
