<div class="bg-claro p-5 rounded-lg m-2">
    {{-- Care about people's approval and you will be their prisoner. --}}
    <table class="table-auto w-full text-md text-left rtl:text-right  text-gray-400 mb-2">
        <thead class="text-sm uppercase bg-gray-700 text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 tracking-wider">MONEDA</th>                    
                <th scope="col" class="px-6 py-3 tracking-wider">SALDO</th>
                <th scope="col" class="px-6 py-3 tracking-wider" >PRECIO HOY</th>
                <th scope="col" class="px-6 py-3 tracking-wider" >SALDO (€)</th>                         
            </tr>
        </thead>
        <tbody>
            @forelse($balances as $balance)
                <tr class="border-b bg-gray-800 border-gray-700 hover:bg-gray-600">
                    <td class="px-6 py-4">{{ $balance->currency }} </td>                        
                    <td id="monto-{{ $balance->currency }}" class="px-6 py-4">{{ $balance->amount }}</td>
                    <td id="precio-{{ $balance->currency }}"class="px-6 py-4"> </td>
                    <td id="saldo-{{ $balance->currency }}"class="px-6 py-4"> </td>
                </tr>
            @empty
                <tr class="border-b bg-gray-800 border-gray-700 hover:bg-gray-600">
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
    <script>
   function updateBalanceTable() {
    // Actualizar el saldo en euros para cada criptomoneda
    // Reemplaza 'ADA', 'BNB', 'BTC', 'ETH' y 'SOL' con los símbolos de tus criptomonedas
    ['ADA', 'BNB', 'BTC', 'ETH', 'SOL'].forEach(currency => {
        var priceElement = document.getElementById('price-' + currency);
        var amountElement = document.getElementById('monto-' + currency);
        var saldoElement = document.getElementById('saldo-' + currency);

        // Verificar si los elementos existen antes de acceder a sus propiedades
        if (priceElement && amountElement && saldoElement) {
            var price = parseFloat(priceElement.innerText);
            var amount = parseFloat(amountElement.innerText);
            var saldoEuros = price * amount;
            if (document.getElementById('precio-' + currency)) {
                document.getElementById('precio-' + currency).innerText = price;
                document.getElementById('saldo-' + currency).innerText = saldoEuros.toFixed(2);
            }
        }
    });
}
        // Llamar a la función de actualización al cargar la página
        document.addEventListener('DOMContentLoaded', updateBalanceTable);
    
    </script>
</div>
