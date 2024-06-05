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

    protected $listeners = ['borrarMensajeExitoSell', 'borrarMensajeErrorSell'];

    public $currencySell;
    public $amountSell;
    public $priceSell;
    public $total_earnings;

    public $mensajeExitoSell;
    public $mensajeErrorSell;

    public function sell()
    {
        $this->validate([
            'amountSell' => 'required|numeric',
            'currencySell' => 'required',
            'priceSell' => 'required',
        ]);

        $user = auth()->user();
        $this->total_earnings = $this->amountSell * $this->priceSell;

        $balance = Balance::where('user_id', $user->id)->where('currency', $this->currencySell)->first();

        if (!$balance) {
            // Mostrar mensaje de error si el balance no existe
            $this->mensajeErrorSell = 'Tu balance de criptomonedas no tiene datos.';
            $this->dispatch('mensajeErrorSell');
        } elseif ($balance->amount >= $this->amountSell) { 
            Transaction::create([
                'user_id' => $user->id,
                'type' => "venta",
                'currency' => $this->currencySell,
                'amount' => $this->amountSell,
                'price' => $this->priceSell,
                'date' => now(),
            ]);

            // Actualizar el balance en criptomoneda del usuario
            $balance->amount -= $this->amountSell;
            $balance->save();

            // Actualizar el balance en € del usuario
            $user->simulator_balance += $this->total_earnings;
            $user->save();

            // Mostrar mensaje de éxito y retirar a los 3 segundos
            $this->mensajeExitoSell = 'Venta realizada con éxito.';
            $this->dispatch('mensajeExitoSell');
        } else {
            // Mostrar mensaje de error si no hay suficientes criptomonedas
            $this->mensajeErrorSell = 'No tienes suficientes criptomonedas para realizar la venta.';
            $this->dispatch('mensajeErrorSell');
        }
        
        // Reiniciar el formulario
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->amountSell = null;
        $this->currencySell = null;
        $this->priceSell = null;
        $this->total_earnings = null;
    }

    #[On('mensajeExitoSell')] 
    public function borrarMensajeExitoSell()
    {
        $this->mensajeExitoSell = null;
        return view('cryptos');
    }

    #[On('mensajeErrorSell')]
    public function borrarMensajeErrorSell()
    {
        $this->mensajeErrorSell = null;
        return view('cryptos');
    }
    public function render()
    {
        return view('livewire.sell-crypto');
    }
}
