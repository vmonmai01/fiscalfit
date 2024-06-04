<div class="m-2 p-5">
    <div class="bg-claro p-5 rounded-lg m-2 p-5">

        <div class="relative rounded-lg mx-5 my-5">
            <table class="table-auto w-full text-md text-left rtl:text-right text-gray-400 mb-2">
                <thead class="text-sm uppercase bg-medio text-gray-400">
                    <tr>
                        <th scope="col" class="px-2 py-3 tracking-wider">Cryptomoneda</th>
                        <th scope="col" class="px-2 py-3 tracking-wider"> Simbolo </th>
                        <th scope="col" class="px-2 py-3 tracking-wider">Precio (€)</th>
                        <th scope="col" class="px-2 py-3 tracking-wider">Cambio de precio en 24H (%)</th>
                        <th scope="col" class="px-2 py-3 tracking-wider"> Cambio de precio en 7 días (%)</th>
                        <th scope="col" class="px-2 py-3 tracking-wider"> Cap. Mercado </th>
                        <th scope="col" class="px-2 py-3 tracking-wider"> Suministro en circulación </th>
                        <th scope="col" class="px-2 py-3 tracking-wider">Suministro total</th>
                        <th scope="col" class="px-2 py-3 tracking-wider">Clasificación</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($data)
                        @foreach ($data as $symbol => $crypto)
                            <tr class="border-b bg-oscuro border-gray-700 hover:bg-gray-600">
                                <td class="px-2 py-4 text-center">{{ $crypto[0]['name'] }}</td>
                                <td class="px-2 py-4 text-center">{{ $symbol }}</td>
                                <td id="price-{{ $symbol }}" class="px-2 py-4">
                                    {{ $crypto[0]['quote']['EUR']['price'] }}</td>
                                <td class="px-2 py-4">
                                    {{ number_format($crypto[0]['quote']['EUR']['percent_change_24h'], 2) }} % </td>
                                <td class="px-2 py-4">
                                    {{ number_format($crypto[0]['quote']['EUR']['percent_change_7d'], 2) }}%</td>
                                <td class="px-2 py-4">{{ $crypto[0]['quote']['EUR']['market_cap'] }}</td>
                                <td class="px-2 py-4">{{ $crypto[0]['circulating_supply'] }}</td>
                                <td class="px-2 py-4">{{ $crypto[0]['total_supply'] }}</td>
                                <td class="px-2 py-4 text-center">{{ $crypto[0]['cmc_rank'] }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="border-b bg-oscuro border-gray-700 hover:bg-gray-600">
                            <td colspan="9" class="text-red-500 font-bold py-4">No se encontraron criptomonedas.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="w-[500px] items-center p-4 ">
        @livewire('buy-crypto')
    </div>
    <div class="w-[500px] items-center p-4 ">
        @livewire('sell-crypto')
    </div>


</div>
