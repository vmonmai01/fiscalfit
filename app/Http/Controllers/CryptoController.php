<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CryptoController extends Controller
{
    // Variable que usaremos para la clave API de CoinMarketCap
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('COINMARKETCAP_API_KEY');
    }

    public function getPrices()
    {
        $client = new Client();
        $response = $client->get('https://pro-api.coinmarketcap.com/v2/cryptocurrency/quotes/latest', [
            'headers' => [
                'X-CMC_PRO_API_KEY' => $this->apiKey   // 02098cd6-4aa0-4950-a4b4-1a058cd96523
            ],
            'query' => [
                'symbol' => 'BTC,ETH,ADA,BNB,SOL',
                'convert' => 'EUR'
            ]
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        return view('crypto', ['data' => $data]);
    }
}
