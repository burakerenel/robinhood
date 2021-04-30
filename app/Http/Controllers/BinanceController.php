<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Binance;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\TradingViewController;




class BinanceController extends Controller
{
    private $api_key,$api_secret,$api;
    public function __construct(){
        $this->api_key = env('BINANCE_API_KEY');
        $this->api_secret = env('BINANCE_API_SECRET');
        $this->api = new Binance\API($this->api_key,$this->api_secret);
    }
    public function getPrice($symbol=null){
        $price = new Binance\RateLimiter($this->api);
        if($symbol)
            return $price->prices()[$symbol];
        return $price->prices();
    }
    public function getBalance($symbol=null){
        $ticker = $this->api->prices();
        $balances = $this->api->balances($ticker);
        if($symbol)
            return $balances[$symbol];
        return $balances;
    }
    public function Demo(){
        $tradingViewData = new TradingViewController();
        return $tradingViewData->getTradingViewData();
    }


}
