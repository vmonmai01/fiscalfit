<div class="bg-claro p-5 rounded-lg m-2">
    <h1 class="font-bold text-3xl text-oscuro text-center"> Ingresos Registrados </h1>
    @if (session()->has('message'))
        <div class="p-4 mb-4 mt-4 text-sm bg-medio rounded-lg max-w-lg mx-auto text-center">
            <p class="text-green-400">{{ session('message') }}</p>
        </div>
    @endif
    <div class="relative rounded-lg mx-5 my-5">
        {{-- Busqueda  --}}
        <form class="max-w-lg mx-auto py-5 px-5">
            <div class="flex">

                <div class="relative w-full">
                    <input type="text" id="search" wire:model.live="incomeSearch"
                        class="block p-2.5 w-full z-20 text-sm  rounded-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-amarillo focus:border-amarillo bg-oscuro placeholder-gray-400 text-white"
                        placeholder="Buscar por descripción o fecha" />
                    <button
                        class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-black bg-amarillo rounded-e-lg hover:bg-amarillo focus:ring-4 focus:outline-none focus:ring-amarillo ">
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

        <table class="table-auto w-full text-md text-left rtl:text-right text-gray-400 mb-2">
            <thead class="text-sm uppercase bg-medio text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 tracking-wider">Marcar</th>
                    <th scope="col" class="px-6 py-3 tracking-wider"> Imagen </th>
                    <th scope="col" class="px-6 py-3 tracking-wider" wire:click="sortBy('description')">Descripción
                    </th>
                    <th scope="col" class="px-6 py-3 tracking-wider" wire:click="sortBy('amount')">Monto</th>
                    <th scope="col" class="px-6 py-3 tracking-wider" wire:click="sortBy('date')">Fecha</th>
                    <th scope="col" class="px-6 py-3 tracking-wider">Categoría</th>
                    <th scope="col" class="px-6 py-3 tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($incomes as $income)
                    <tr class="border-b bg-oscuro border-gray-700 hover:bg-gray-600">
                        <td class="px-6 py-4"> <input id="{{ $income->id }}" type="checkbox"
                                wire:model="selectedIncomes" value="{{ $income->id }}"
                                class="w-4 h-4 text-amarillo bg-gray-100 border-gray-300 rounded focus:ring-amarillo focus:ring-2">
                        </td>
                        <td class="px-6 py-4 flex justify-center ">
                            @if ($income->photo != null)
                                <a href="{{ asset('storage/incomes_photos/' . $income->photo) }}" target="_blank">
                                    <img src="{{ asset('storage/incomes_photos/' . $income->photo) }}"
                                        alt="Imagen del Ingreso {{ $income->id }}" width="50" height="50">
                                </a>
                            @else
                                <svg class="w-4 h-4 text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            @endif
                        </td>
                        <td class="px-6 py-4">{{ $income->description }}</td>
                        <td class="px-6 py-4">{{ $income->amount }}</td>
                        <td class="px-6 py-4">{{ $income->date }}</td>
                        <td class="px-6 py-4">{{ $income->category->type }}</td>
                        <td class="px-6 py-4">
                            <x-boton-delete wire:click="deleteIncome({{ $income->id }})" />
                        </td>
                    </tr>
                @empty
                    <tr class="border-b bg-oscuro border-gray-700 hover:bg-gray-600">
                        <td colspan="7" class="text-red-500 text-center font-bold py-4"> No se encontraron resultados
                            para la busqueda:
                            "{{ $incomeSearch }}" </<td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $incomes->links() }}

        <button class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 rounded" wire:click="deleteSelected">
            Eliminar Seleccionados
        </button>

    </div>
</div>
