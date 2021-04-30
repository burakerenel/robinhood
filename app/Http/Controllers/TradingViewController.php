<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class TradingViewController extends Controller
{
    public function getTradingViewData(){
        $request_json = array (
            'symbols' =>
                array (
                    'tickers' =>
                        array (
                            0 => 'BINANCE:BTCUSDT',
                        ),
                    'query' =>
                        array (
                            'types' =>
                                array (
                                ),
                        ),
                ),
            'columns' =>
                array (
                    0 => 'Recommend.Other|15',
                    1 => 'Recommend.All|15',
                    2 => 'Recommend.MA|15',
                    3 => 'RSI|15',
                    4 => 'RSI[1]|15',
                    5 => 'Stoch.K|15',
                    6 => 'Stoch.D|15',
                    7 => 'Stoch.K[1]|15',
                    8 => 'Stoch.D[1]|15',
                    9 => 'CCI20|15',
                    10 => 'CCI20[1]|15',
                    11 => 'ADX|15',
                    12 => 'ADX+DI|15',
                    13 => 'ADX-DI|15',
                    14 => 'ADX+DI[1]|15',
                    15 => 'ADX-DI[1]|15',
                    16 => 'AO|15',
                    17 => 'AO[1]|15',
                    18 => 'AO[2]|15',
                    19 => 'Mom|15',
                    20 => 'Mom[1]|15',
                    21 => 'MACD.macd|15',
                    22 => 'MACD.signal|15',
                    23 => 'Rec.Stoch.RSI|15',
                    24 => 'Stoch.RSI.K|15',
                    25 => 'Rec.WR|15',
                    26 => 'W.R|15',
                    27 => 'Rec.BBPower|15',
                    28 => 'BBPower|15',
                    29 => 'Rec.UO|15',
                    30 => 'UO|15',
                    31 => 'EMA10|15',
                    32 => 'close|15',
                    33 => 'SMA10|15',
                    34 => 'EMA20|15',
                    35 => 'SMA20|15',
                    36 => 'EMA30|15',
                    37 => 'SMA30|15',
                    38 => 'EMA50|15',
                    39 => 'SMA50|15',
                    40 => 'EMA100|15',
                    41 => 'SMA100|15',
                    42 => 'EMA200|15',
                    43 => 'SMA200|15',
                    44 => 'Rec.Ichimoku|15',
                    45 => 'Ichimoku.BLine|15',
                    46 => 'Rec.VWMA|15',
                    47 => 'VWMA|15',
                    48 => 'Rec.HullMA9|15',
                    49 => 'HullMA9|15',
                    50 => 'Pivot.M.Classic.S3|15',
                    51 => 'Pivot.M.Classic.S2|15',
                    52 => 'Pivot.M.Classic.S1|15',
                    53 => 'Pivot.M.Classic.Middle|15',
                    54 => 'Pivot.M.Classic.R1|15',
                    55 => 'Pivot.M.Classic.R2|15',
                    56 => 'Pivot.M.Classic.R3|15',
                    57 => 'Pivot.M.Fibonacci.S3|15',
                    58 => 'Pivot.M.Fibonacci.S2|15',
                    59 => 'Pivot.M.Fibonacci.S1|15',
                    60 => 'Pivot.M.Fibonacci.Middle|15',
                    61 => 'Pivot.M.Fibonacci.R1|15',
                    62 => 'Pivot.M.Fibonacci.R2|15',
                    63 => 'Pivot.M.Fibonacci.R3|15',
                    64 => 'Pivot.M.Camarilla.S3|15',
                    65 => 'Pivot.M.Camarilla.S2|15',
                    66 => 'Pivot.M.Camarilla.S1|15',
                    67 => 'Pivot.M.Camarilla.Middle|15',
                    68 => 'Pivot.M.Camarilla.R1|15',
                    69 => 'Pivot.M.Camarilla.R2|15',
                    70 => 'Pivot.M.Camarilla.R3|15',
                    71 => 'Pivot.M.Woodie.S3|15',
                    72 => 'Pivot.M.Woodie.S2|15',
                    73 => 'Pivot.M.Woodie.S1|15',
                    74 => 'Pivot.M.Woodie.Middle|15',
                    75 => 'Pivot.M.Woodie.R1|15',
                    76 => 'Pivot.M.Woodie.R2|15',
                    77 => 'Pivot.M.Woodie.R3|15',
                    78 => 'Pivot.M.Demark.S1|15',
                    79 => 'Pivot.M.Demark.Middle|15',
                    80 => 'Pivot.M.Demark.R1|15',
                ),
        );
        return json_decode(Http::withBody(json_encode($request_json,true),'application/json')->withOptions(['verify' => false])->get('https://scanner.tradingview.com/crypto/scan'),1);
    }
    public function getRSI(){
        return $this->getTradingViewData()['data'][0]['d'][3];
    }
}
