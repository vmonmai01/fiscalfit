<x-app-layout>
    <h1>Precios de Criptomonedas</h1>
    <table>
        <thead>
            <tr>
                <th>Cryptomoneda</th>
                <th>Precio(€)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $crypto)
            <tr>
                <td>{{ $crypto['name'] }}</td>
                <td>{{ $crypto['quote']['EUR']['price'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</x-app-layout>