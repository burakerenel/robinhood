<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BinanceController;
use Web64\Colors\Facades\Colors;
use App\Models\RobinLog;


class RobinHoodController extends Controller
{
    public function start(){

        while(true){
            $lastOperation = RobinLog::orderBy('created_at','desc')->first();

            $binance = new BinanceController;
            $tradingView = new TradingViewController;
            $rsi = floatval($tradingView->getRSI());
            $price = $binance->getPrice('BTCUSDT');


            if($rsi >= 50){
                if($lastOperation->operation=='buy'){
                    Colors::yellow("SELLING POSITION -> BTCUSDT: ".$price." RSI:".$rsi);
                }
                else
                    Colors::magenta("WAITING FOR BUY BUYING -> BTCUSDT: ".$price." RSI:".$rsi);
            }
            elseif($rsi <= 25){
                if($lastOperation->operation=='sell'){
                    Colors::green("BUYING POSITION -> BTCUSDT: ".$price." RSI:".$rsi);
                }
                else
                    Colors::magenta("WAITING FOR BUY SELLING -> BTCUSDT: ".$price." RSI:".$rsi);
            }
            else{
                Colors::light_blue("HOLDING POSITION -> BTCUSDT: ".$price." RSI:".$rsi);
            }

            sleep(1);
        }
    }
}
