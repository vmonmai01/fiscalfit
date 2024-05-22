<div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-5 my-5 py-5 px-5" >
    <!-- Búsqueda -->
    <form class="max-w-lg mx-auto py-5 px-5">
        <div class="flex">                    
            <div class="relative w-full">
                <input type="text" id="search" wire:model.live="search"
                    class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                    placeholder="Buscar por nombre, apellido, email, etc..."  />
                <button disabled
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

    <!-- Tabla de usuarios -->
    <table class="w-full text-md text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded-md">
        <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 tracking-wider">
                    <button>Avatar</button>
                </th>
                <th scope="col" class="px-6 py-3 tracking-wider">
                    <button wire:click="sortBy('name')">NOMBRE</button>
                    @if ($sortField == 'name' && $sortAsc)
                        <span><i class="fa-solid fa-arrow-up-long fa-bounce" style="color: green;"></i></span>
                    @elseif($sortField == 'name' && !$sortAsc)
                        <span><i class="fa-solid fa-arrow-down-long fa-bounce" style="color: red"></i></span>
                    @endif
                </th>
                <th scope="col" class="px-6 py-3 tracking-wider">
                    <button wire:click="sortBy('lastname')">APELLIDO</button>
                    @if ($sortField == 'lastname' && $sortAsc)
                        <span><i class="fa-solid fa-arrow-up-long fa-bounce" style="color: green;"></i></span>
                    @elseif($sortField == 'lastname' && !$sortAsc)
                        <span><i class="fa-solid fa-arrow-down-long fa-bounce" style="color: red"></i></span>
                    @endif
                </th>
                <th scope="col" class="px-6 py-3 tracking-wider">
                    <button wire:click="sortBy('birthdate')">FECHA DE NACIMIENTO</button>
                    @if ($sortField == 'birthdate' && $sortAsc)
                        <span><i class="fa-solid fa-arrow-up-long fa-bounce" style="color: green;"></i></span>
                    @elseif($sortField == 'birthdate' && !$sortAsc)
                        <span><i class="fa-solid fa-arrow-down-long fa-bounce" style="color: red"></i></span>
                    @endif
                </th>
                <th scope="col" class="px-6 py-3 tracking-wider">
                    <button wire:click="sortBy('simulator_balance')">SALDO SIMULADOR</button>
                </th>
                <th scope="col" class="px-6 py-3 tracking-wider">
                    <button wire:click="sortBy('email')">CORRE ELECTRÓNICO</button>
                    @if ($sortField == 'email' && $sortAsc)
                        <span><i class="fa-solid fa-arrow-up-long fa-bounce" style="color: green;"></i></span>
                    @elseif($sortField == 'email' && !$sortAsc)
                        <span><i class="fa-solid fa-arrow-down-long fa-bounce" style="color: red"></i></span>
                    @endif
                </th>
                <th scope="col" class="px-6 py-3 tracking-wider">
                    <button wire:click="sortBy('rol')">ROL</button>
                    @if ($sortField == 'rol' && $sortAsc)
                        <span><i class="fa-solid fa-arrow-up-long fa-bounce" style="color: green;"></i></span>
                    @elseif($sortField == 'rol' && !$sortAsc)
                        <span><i class="fa-solid fa-arrow-down-long fa-bounce" style="color: red"></i></span>
                    @endif
                </th>
                <th scope="col" class="px-6 py-3 tracking-wider">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @if(count($users) != 0)
            @foreach ($users as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4"><img src="{{ asset('storage/user_avatar/' . $user->avatar) }}"
                            alt="Avatar de {{ $user->name }}" class="w-12 h-12 rounded-full mx-2"></td>
                    <td class="px-6 py-4">{{ $user->name }}</td>
                    <td class="px-6 py-4">{{ $user->lastname }}</td>
                    <td class="px-6 py-4">{{ date('d-m-Y', strtotime($user->birthdate)) }}</td>
                    <td class="px-6 py-4">{{ number_format($user->simulator_balance, 2) }} €</td>
                    <td class="px-6 py-4">{{ $user->email }}</td>
                    <td class="px-6 py-4" >{{ $user->rol }}</td>
                    <td class="px-6 py-4">
                        <button wire:click="showUserDetail({{ $user->id }})">Ver Detalles</button>
                        <button wire:click="showUserDelete({{ $user->id }})">Eliminar</button>
                    </td>
                
            @endforeach
            @else
                <td colspan="8" class="text-red-500 font-bold py-4">No se encontraron usuarios de la aplicación.</td>
            @endif
            </tr>
        </tbody>
    </table>

    <!-- Paginación -->
    {{ $users->links() }}

    <!-- Modal para mostrar detalles del usuario -->
    <!-- Modal -->
    @if ($showModalDetails)

        <div class="modal" id="medium-modal" tabindex="-1"
            class="shadow-xl fixed inset-0 z-50 overflow-y-auto bg-gray-900 bg-opacity-60 flex justify-center items-center">
            <div class="fixed inset-0 z-50 overflow-y-auto bg-gray-900 bg-opacity-60 flex justify-center items-center ">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 min-w-[300px] min-h-[300px]">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                            Detalles del Usuario: {{ $userDetails->name }}
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            wire:click="closeUserDetail">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <div class="flex flex-wrap">
                            <div class="w-1/3 p-4">
                                <!-- Contenido de la primera columna -->
                                <img src="{{ asset('storage/user_avatar/' . $user->avatar) }}"
                                alt="Avatar de {{ $user->name }}" class="w-auto h-auto rounded-full mx-auto">
                            </div>
                            <div class="w-2/3 p-4 pt-5">
                                <!-- Contenido de la segunda columna -->
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    Nombre: {{ $userDetails->name }}
                                   
                                </p>
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    Apellido/s: {{ $userDetails->lastname }}
                                </p>
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    E-mail: {{ $userDetails->email }}
                                </p>
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    Fecha de Naciemiento: {{ date('d-m-Y', strtotime($user->birthdate)) }}
                                </p>
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    Saldo simulador: {{ number_format($user->simulator_balance, 2) }} €
                                </p>
                            </div>
                        </div>                  
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-2 md:p-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        
                        <button wire:click="closeUserDetail" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cerrar</button>
                    </div>
                </div>
            </div>
            
    @endif

    <!-- Modal para confirmar eliminación del usuario -->
    @if ($showModalDelete)

        <div class="modal" id="medium-modal" tabindex="-1"
            class="shadow-xl fixed inset-0 z-50 overflow-y-auto bg-gray-900 bg-opacity-60 flex justify-center items-center">
            <div class="fixed inset-0 z-50 overflow-y-auto bg-gray-900 bg-opacity-60 flex justify-center items-center ">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 min-w-[300px]">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                            ¿Realmente deseas eliminar el usuario {{ $userDelete->name }} ? 
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            wire:click="closeUserDetail">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    {{-- <div class="p-4 md:p-5 space-y-4">
                        <div class="flex flex-wrap">

                                
                        </div>                  
                    </div> --}}
                    <!-- Modal footer -->
                    <div class="flex items-center px-2 md:p-2 border-t border-gray-200 rounded-b dark:border-gray-600">                        
                        <button wire:click="closeUserDelete" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Cerrar
                        </button>
                        <button wire:click="deleteUser({{ $userDelete->id }})" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-red-400 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-red-500 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-red-500 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Eliminar
                        </button>
                    </div>
                </div>
            </div>            
    @endif
</div>
