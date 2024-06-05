<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Balance;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;

class BuyCrypto extends Component
{
    protected $listeners = ['borrarMensajeExito', 'borrarMensajeError'];

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


            // Mostrar mensaje de éxito y retiurar a los 3 segundos

            $this->mensajeExito = 'Compra realizada con éxito.';
            $this->dispatch('mensajeExito');
        } else {

            // Mostrar mensaje de error
            $this->mensajeError = 'No dispones del saldo suficiente para realizar la compra.';
            $this->dispatch('mensajeError');
        }
        // Reiniciar el formulario
        $this->resetForm();
    }

    #[On('mensajeExito')] 
    public function borrarMensajeExito()
    {
        $this->mensajeExito = null;
        return redirect()->to('/cryptos');
    }

    #[On('mensajeError')]
    public function borrarMensajeError()
    {
        $this->mensajeError = null;
        return redirect()->to('/cryptos');
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
        $this->total_cost = null;
    }
}
