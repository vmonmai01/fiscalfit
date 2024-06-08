<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaction;
class TransactionsCrypto extends Component
{
    public function render()
    {
        $transactions = Transaction::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(10);

        // Realizar la multiplicación en cada transacción para tener el total gastado en compra
        foreach ($transactions as $transaction) {
            $transaction->multiplication_result = $transaction->amount * $transaction->price;
        }
       return view('livewire.transactions-crypto', ['transactions' => $transactions]);
    }
}
