<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-4xl text-white leading-tight">
            Simulador Criptomonedas
        </h2>
    </x-slot>
    <section name="tablaprecios" class="mb-6 px-6 pt-4">
        <h3 class="font-bold text-2xl text-white leading-tight text-center mt-4 mb-2 py-2">
            Precios criptomonedas
        </h3>    
        @livewire('crypto-table')
    </section>
    

    <section name="balance" class="mb-6 px-6">
        <h3 class="font-bold text-2xl text-white leading-tight text-center mt-4 mb-2 py-2">
            Balance criptomonedas
        </h3>
    
        @livewire('balance-crypto')
    </section>
    <section name="transacciones" class="mb-10 pb-8 px-6">
        <h3 class="font-bold text-2xl text-white leading-tight text-center mt-4 mb-2 p-2">
            Transacciones criptomonedas
        </h3>
          
        @livewire('transactions-crypto')         
    </section>

</x-app-layout>
