<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Balance;

class BuyCrypto extends Component
{

    public $currency;
    public $amount;
    public $price;
    public $total_cost;

    public $mensajeExito;
    public $mensajeError;

    public function buy()
    {

        $this->validate([
            'amount' => 'required|numeric',
            'currency' => 'required',
            'price' => 'required',
        ]);

        $user = auth()->user();

        $this->total_cost = $this->amount * $this->price;

        if ($user->simulator_balance >= $this->total_cost) {
            Transaction::create([
                'user_id' => $user->id,
                'type' => "compra",
                'currency' => $this->currency,
                'amount' => $this->amount,
                'price' => $this->price,
                'date' => now(),
            ]);

            // Actualizar el balance en € del usuario
            $user->simulator_balance -= $this->total_cost;
            $user->save();

            // Actualizar el balance en cryptomoneda del usuario

            $balance = Balance::firstOrNew(['user_id' => $user->id, 'currency' => $this->currency]);
            $balance->amount += $this->amount;
            $balance->save();

            
            // Mostrar mensaje de éxito
            $this->mensajeExito = 'Compra realizada con éxito.';
           
        } else {
            
            // Mostrar mensaje de error
            $this->mensajeError = 'No dispones del saldo suficiente para realizar la compra.';
           
        }
        // Reiniciar el formulario
        $this->resetForm();
    }

    public function render()
    {
        return view('livewire.buy-crypto');
    }

    public function resetForm()
    {
        $this->amount = null;
        $this->currency = null;
        $this->price = null;
    }
}
