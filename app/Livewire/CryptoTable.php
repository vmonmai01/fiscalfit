<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class CryptoTable extends Component
{

    public $data;

    // public function mount()
    // {
    //     $apiKey = env('COINMARKETCAP_API_KEY');

    //     $response = Http::withHeaders([
    //         'X-CMC_PRO_API_KEY' => $apiKey
    //     ])->get('https://pro-api.coinmarketcap.com/v2/cryptocurrency/quotes/latest', [
    //         'symbol' => 'BTC,ETH,ADA,BNB,SOL',
    //         'convert' => 'EUR'
    //     ]);

    //     $this->data = $response->json()['data'];
    // }
    public function render()
    {
        $apiKey = env('COINMARKETCAP_API_KEY');

        $response = Http::withHeaders([
            'X-CMC_PRO_API_KEY' => $apiKey
        ])->get('https://pro-api.coinmarketcap.com/v2/cryptocurrency/quotes/latest', [
            'symbol' => 'BTC,ETH,ADA,BNB,SOL',
            'convert' => 'EUR'
        ]);

        $this->data = $response->json()['data'];

        return view('livewire.crypto-table', ['data' => $this->data]);
    }
}
