<div>
    <h1> Ingresos Registrados </h1>
    @if (session()->has('message'))
        <div>{{ session('message') }}</div>
    @endif
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-5 my-5">
        {{-- Busqueda  --}}
        <form class="max-w-lg mx-auto">
            <div class="flex">

                <div class="relative w-full">
                    <input type="text" id="search" wire:model.live="incomeSearch"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                        placeholder="Buscar por descripción o fecha" />
                    <button
                        class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
            </div>
        </form>

        {{-- Tabla --}}

        <table class="table-auto w-full text-md text-left rtl:text-right text-gray-500 dark:text-gray-400 mx-5 my-5">
            <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 tracking-wider">Marcar</th>
                    <th scope="col" class="px-6 py-3 tracking-wider" wire:click="sortBy('description')">Descripción </th>
                    <th scope="col" class="px-6 py-3 tracking-wider" wire:click="sortBy('amount')">Monto</th>
                    <th scope="col" class="px-6 py-3 tracking-wider" wire:click="sortBy('date')">Fecha</th>
                    <th scope="col" class="px-6 py-3 tracking-wider">Categoría</th>
                    <th scope="col" class="px-6 py-3 tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($incomes as $income)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4"> <input id="{{ $income->id }}" type="checkbox" wire:model="selectedIncomes" value="{{ $income->id }}"> </td>
                        <td class="px-6 py-4">{{ $income->description }}</td>
                        <td class="px-6 py-4">{{ $income->amount }}</td>
                        <td class="px-6 py-4">{{ $income->date }}</td>
                        <td class="px-6 py-4">{{ $income->category->type }}</td>
                        <td class="px-6 py-4">
                            <x-boton-delete wire:click="deleteIncome({{ $income->id }})"/>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-red-500 text-center font-bold py-4"> No se encontraron resultados
                            para la busqueda:
                            "{{ $incomeSearch }}" </<td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $incomes->links() }}

        <button class="bg-red-500 hover:bg-red-600 text-white font-bold m-3 py-2 px-4 rounded" wire:click="deleteSelected" >Eliminar
            Seleccionados
        </button>

    </div>
</div>
