<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\Balance;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SellCrypto extends Component
{

    protected $listeners = ['borrarMensajeExito', 'borrarMensajeError'];

    public $currency;
    public $amount;
    public $price;
    public $total_earnings;

    public $mensajeExito;
    public $mensajeError;

    public function sell()
    {
        $this->validate([
            'amount' => 'required|numeric',
            'currency' => 'required',
            'price' => 'required',
        ]);

        $user = auth()->user();
        $this->total_earnings = $this->amount * $this->price;

        $balance = Balance::where('user_id', $user->id)->where('currency', $this->currency)->first();

        if (!$balance) {
            // Mostrar mensaje de error si el balance no existe
            $this->mensajeError = 'Tu balance de criptomonedas no tiene datos.';
            $this->dispatch('mensajeError');
        } elseif ($balance->amount >= $this->amount) {
            Transaction::create([
                'user_id' => $user->id,
                'type' => "venta",
                'currency' => $this->currency,
                'amount' => $this->amount,
                'price' => $this->price,
                'date' => now(),
            ]);

            // Actualizar el balance en criptomoneda del usuario
            $balance->amount -= $this->amount;
            $balance->save();

            // Actualizar el balance en € del usuario
            $user->simulator_balance += $this->total_earnings;
            $user->save();

            // Mostrar mensaje de éxito y retirar a los 3 segundos
            $this->mensajeExito = 'Venta realizada con éxito.';
            $this->dispatch('mensajeExito');
        } else {
            // Mostrar mensaje de error si no hay suficientes criptomonedas
            $this->mensajeError = 'No tienes suficientes criptomonedas para realizar la venta.';
            $this->dispatch('mensajeError');
        }
        
        // Reiniciar el formulario
        $this->resetForm();
    }
    
    public function render()
    {
        return view('livewire.sell-crypto');
    }
}
