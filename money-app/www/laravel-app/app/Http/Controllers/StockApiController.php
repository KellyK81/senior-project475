<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class StockApiController extends Controller
{
    const API_KEY = 'c6hc2kaad3ifd92p49tg';
    const BASE_URL = 'https://finnhub.io/api/v1/';

    const TECH_STOCK_SYMBOLS = array('AAPL', 'AMZN', 'MSFT', 'GOOG', 'IBM', 'FB' , 'NVDA');
    const COMMON_STOCK_SYMBOLS = array('AAPL', 'AMZN', 'MSFT', 'TSLA', 'GOOG', 'IBM', 'FB', 'CCL', 'BAC', 'AAL');

    public static function invoke_api($url) {
        $curl = curl_init();
    
        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));
    
        $response = curl_exec($curl);
    
        curl_close($curl);
        return $response;
    }

    public function getStockQuotes($symbols = self::TECH_STOCK_SYMBOLS) {
        $quotes = array();
        for($i = 0; $i < count($symbols); $i++) {
            $url = self::BASE_URL.'quote?symbol='.$symbols[$i].'&token='. self::API_KEY;
            $quotes[$symbols[$i]] = json_decode(self::invoke_api($url));
        }
        return $quotes;
    }
}
