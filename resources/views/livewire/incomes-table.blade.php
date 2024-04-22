<div>
    <h1> Ingresos Registrados </h1>
    @if(session()->has('message'))
        <div>{{ session('message') }}</div>
    @endif
    <input type="text" wire:model.live="incomeSearch" placeholder="Buscar por descripción o fecha">
    <table>
        <thead>
            <tr>
                <th>Selección</th>
                <th wire:click="sortBy('id')">ID</th>
                <th wire:click="sortBy('description')">Descripción</th>
                <th wire:click="sortBy('amount')">Monto</th>
                <th wire:click="sortBy('date')">Fecha</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($incomes as $income)
                <tr>
                    <td> <input id="{{$income->id}}" type="checkbox" wire:model="selectedIncomes" value="{{ $income->id }}"> </td>
                    <td>{{ $income->id }}</td>
                    <td>{{ $income->description }}</td>
                    <td>{{ $income->amount }}</td>
                    <td>{{ $income->date }}</td>
                    <td>{{ $income->category->type }}</td>
                    <td>
                        <button wire:click="editIncome({{ $income->id }})">Editar</button>
                        <button wire:click="deleteIncome({{ $income->id }})">Eliminar</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-red-500" > No se encontraron resultados para la busqueda: "{{ $incomeSearch }}" </<td>
                </tr>
            @endforelse
        </tbody>
    </table> 
    {{ $incomes->links() }}
    @if($selectedIncomes && count($selectedIncomes) > 0)
        <button wire:click="deleteSelected">Eliminar Seleccionados</button>
    @endif
</div>
