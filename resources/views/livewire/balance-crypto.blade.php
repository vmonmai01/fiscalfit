<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <table class="table-auto w-full text-md text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 tracking-wider">MONEDA</th>                    
                <th scope="col" class="px-6 py-3 tracking-wider">SALDO</th>
                <th scope="col" class="px-6 py-3 tracking-wider" >PRECIO HOY</th>
                <th scope="col" class="px-6 py-3 tracking-wider" >SALDO (€)</th>                         
            </tr>
        </thead>
        <tbody>
            @forelse($balances as $balance)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">{{ $balance->currency }} </td>                        
                    <td class="px-6 py-4">{{ $balance->amount }}</td>
                    <td id="precio-{{ $balance->currency }}"class="px-6 py-4"> </td>
                    <td id="saldo-{{ $balance->currency }}"class="px-6 py-4"> </td>
                </tr>
            @empty
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td colspan="3" class="text-red-500 text-center font-bold py-4"> Tu balance de cryptomonedas no tiene datos.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div>
        <p class="text-white text-3xl" id="saldo_simulador">Saldo simulador: {{$user->simulator_balance}}</p>
        <button type="button" class="btn btn-primary"  wire:click="addSaldo">
            Añadir saldo
        </button>
    </div>
</div>
