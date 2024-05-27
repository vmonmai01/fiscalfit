<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-5 my-5">
        <h1 class="font-bold text-3xl">Precios de Criptomonedas</h1>
        <table class="bg-dark table-auto w-3/4 text-md text-center rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-2 py-3 tracking-wider">Cryptomoneda</th>
                    <th scope="col" class="px-2 py-3 tracking-wider"> Simbolo </th>
                    <th scope="col" class="px-2 py-3 tracking-wider">Precio (€)</th>
                    <th scope="col" class="px-2 py-3 tracking-wider">Cambio de precio en 24H (%)</th>
                    <th scope="col" class="px-2 py-3 tracking-wider"> Cambio de precio en 7 días (%)</th>
                    <th scope="col" class="px-2 py-3 tracking-wider"> Cap. Mercado </th>
                    <th scope="col" class="px-2 py-3 tracking-wider"> Volumen Op 24h</th>
                    
                    <th scope="col" class="px-2 py-3 tracking-wider"> Suministro en circulación </th>
                    <th scope="col" class="px-2 py-3 tracking-wider">Suministro total</th>
                    <th scope="col" class="px-2 py-3 tracking-wider">Clasificación</th>
                </tr>
            </thead>
            <tbody>
                @if ($data)
                    @foreach ($data as $symbol => $crypto)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-2 py-4">{{ $crypto[0]['name'] }}</td>
                            <td class="px-2 py-4">{{ $symbol }}</td>
                            <td id="price-{{ $symbol }}" class="px-2 py-4">{{ $crypto[0]['quote']['EUR']['price'] }}</td>
                            <td class="px-2 py-4">{{ number_format($crypto[0]['quote']['EUR']['percent_change_24h'],2) }} % </td>
                            <td class="px-2 py-4">{{ number_format($crypto[0]['quote']['EUR']['percent_change_7d'],2) }}%</td>
                            <td class="px-2 py-4">{{ $crypto[0]['quote']['EUR']['market_cap'] }}</td>
                            <td class="px-2 py-4">{{ $crypto[0]['quote']['EUR']['volume_24h'] }}</td>
                            
                            <td class="px-2 py-4">{{ $crypto[0]['circulating_supply'] }}</td>
                            <td class="px-2 py-4">{{ $crypto[0]['total_supply'] }}</td>
                            <td class="px-2 py-4 text-center">{{ $crypto[0]['cmc_rank'] }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="10" class="text-red-500 font-bold py-4">No se encontraron criptomonedas.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="w-[500px] items-center p-4 ">
        @livewire('buy-crypto') 
    </div>
   

</div>
