<?php

namespace App\Http\Controllers;

class ApiController extends Controller
{

    public function invoke_api($url, $CURLOPT_HTTPHEADER = []) {
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
            CURLOPT_HTTPHEADER => $CURLOPT_HTTPHEADER
        ]);
        // var_dump($url);
        $response = curl_exec($curl);
    
        curl_close($curl);
        return $response;
    }
}