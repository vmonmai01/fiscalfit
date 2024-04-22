<div>

    <h1> Gastos Registrados </h1>
    @if(session()->has('message'))
        <div>{{ session('message') }}</div>
    @endif
    <input type="text" wire:model.live="expenseSearch" placeholder="Buscar por descripción o fecha">
    <table>
        <thead>
            <tr>
                <th>Selección</th>
                <th wire:click="sortBy('id')">ID</th>
                <th wire:click="sortBy('description')">Descripción</th>
                <th wire:click="sortBy('amount')">Monto</th>
                <th wire:click="sortBy('date')">Fecha</th>
                <th wire:click="sortBy('expense_category_id')">Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($expenses as $expense)
                <tr>
                    <td> <input id="{{$expense->id}}" type="checkbox" wire:model="selectedExpenses" value="{{ $expense->id }}"> </td>
                    <td>{{ $expense->id }}</td>
                    <td>{{ $expense->description }}</td>
                    <td>{{ $expense->amount }}</td>
                    <td>{{ $expense->date }}</td>
                    <td>{{ $expense->category->type }}</td>
                    <td>
                        <button wire:click="editExpense({{ $expense->id }})">Editar</button>
                        <button wire:click="deleteExpense({{ $expense->id }})">Eliminar</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-red-500"> No se encontraron resultados para la búsqueda: "{{ $expenseSearch }}" </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $expenses->onEachSide(0)->links() }}
    @if($selectedExpenses && count($selectedExpenses) > 0)
        <button wire:click="deleteSelected">Eliminar Seleccionados</button>
    @endif

</div>
