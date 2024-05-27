<div>
        <!-- Tabla de transacciones -->
        <table class="table-auto w-full text-md text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 tracking-wider">MONEDA</th>                    
                    <th scope="col" class="px-6 py-3 tracking-wider">TIPO</th>
                    <th scope="col" class="px-6 py-3 tracking-wider" >Monto</th>
                    <th scope="col" class="px-6 py-3 tracking-wider" >PRECIO</th>
                    <th scope="col" class="px-6 py-3 tracking-wider">FECHA</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse($transactions as $transaction)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">{{ $transaction->currency }} </td>                        
                        <td class="px-6 py-4">{{ $transaction->type }}</td>
                        <td class="px-6 py-4">{{ $transaction->amount }}</td>
                        <td class="px-6 py-4">{{ $transaction->price }}</td>
                        <td class="px-6 py-4">{{ date('d-m-Y', strtotime( $transaction->date)) }}</td>
                    </tr>
                @empty
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td colspan="6" class="text-red-500 text-center font-bold py-4"> Aún no has realizado ninguna transacción</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $transactions->onEachSide(0)->links() }}
</div>
