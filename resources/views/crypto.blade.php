<x-app-layout>
    <h1>Precios de Criptomonedas</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Cryptomoneda</th>
                <th> Simbolo </th>
                <th>Precio (€)</th>
                <th>Cambios de precio en 24H (%)</th>
                <th> Cap. Mercado </th>
                <th> Volumen Op 24h</th>
                <th> Cambios de precio en 7 días (%)</th>
                <th> Suministro en circulación </th>
                <th>Suministro total</th>
                <th>Clasificación</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['data'] as $symbol => $crypto)
                <tr>
                    <td>{{ $crypto[0]['name'] }}</td>
                    <td>{{ $symbol }}</td>
                    <td>{{ $crypto[0]['quote']['EUR']['price'] }}</td>
                    <td>{{ $crypto[0]['quote']['EUR']['percent_change_24h'] }}%</td>
                    <td>{{ $crypto[0]['quote']['EUR']['market_cap'] }}</td>
                    <td>{{ $crypto[0]['quote']['EUR']['volume_24h'] }}</td>
                    <td>{{ $crypto[0]['quote']['EUR']['percent_change_7d'] }}%</td>
                    <td>{{ $crypto[0]['circulating_supply'] }}</td>
                    <td>{{ $crypto[0]['total_supply'] }}</td>
                    <td>{{ $crypto[0]['cmc_rank'] }}</td>
                </tr>
            @endforeach


        </tbody>
    </table>

</x-app-layout>
