<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Balance;


class BalanceCrypto extends Component
{
    public function render()
    {
        $user = auth()->user();
        $balances = Balance::where('user_id', $user->id)->get();
        return view('livewire.balance-crypto', [
            'balances' => $balances,
            'user' => $user
        ]);
    }

    public function addSaldo() {
        $user = auth()->user();
        $user->simulator_balance += 1000;
        $user->save();
        return $this->render();
    }
}
