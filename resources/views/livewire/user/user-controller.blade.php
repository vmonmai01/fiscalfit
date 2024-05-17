<div>
    <!-- Búsqueda -->
    <input type="text" wire:model.live="search" placeholder="Buscar por nombre, apellido, email, etc.">

    <!-- Tabla de usuarios -->
    <table>
        <thead>
            <tr>
                <th>
                    <button>Avatar</button>
                </th>
                <th>
                    <button wire:click="sortBy('name')">Nombre</button>
                    @if ($sortField == 'name' && $sortAsc)
                        <span><i class="fa-solid fa-arrow-up-long fa-bounce" style="color: green;"></i></span>
                    @elseif($sortField == 'name' && !$sortAsc)
                        <span><i class="fa-solid fa-arrow-down-long fa-bounce" style="color: red"></i></span>
                    @endif
                </th>
                <th>
                    <button wire:click="sortBy('lastname')">Apellido</button>
                    @if ($sortField == 'lastname' && $sortAsc)
                        <span><i class="fa-solid fa-arrow-up-long fa-bounce" style="color: green;"></i></span>
                    @elseif($sortField == 'lastname' && !$sortAsc)
                        <span><i class="fa-solid fa-arrow-down-long fa-bounce" style="color: red"></i></span>
                    @endif
                </th>
                <th>
                    <button wire:click="sortBy('birthdate')">Fecha de Nacimiento</button>
                    @if ($sortField == 'birthdate' && $sortAsc)
                        <span><i class="fa-solid fa-arrow-up-long fa-bounce" style="color: green;"></i></span>
                    @elseif($sortField == 'birthdate' && !$sortAsc)
                        <span><i class="fa-solid fa-arrow-down-long fa-bounce" style="color: red"></i></span>
                    @endif
                </th>
                <th>
                    <button wire:click="sortBy('simulator_balance')">Saldo simulador</button>
                </th>
                <th>
                    <button wire:click="sortBy('email')">Correo Electrónico</button>
                    @if ($sortField == 'email' && $sortAsc)
                        <span><i class="fa-solid fa-arrow-up-long fa-bounce" style="color: green;"></i></span>
                    @elseif($sortField == 'email' && !$sortAsc)
                        <span><i class="fa-solid fa-arrow-down-long fa-bounce" style="color: red"></i></span>
                    @endif
                </th>
                <th>
                    <button wire:click="sortBy('rol')">Rol</button>
                    @if ($sortField == 'rol' && $sortAsc)
                        <span><i class="fa-solid fa-arrow-up-long fa-bounce" style="color: green;"></i></span>
                    @elseif($sortField == 'rol' && !$sortAsc)
                        <span><i class="fa-solid fa-arrow-down-long fa-bounce" style="color: red"></i></span>
                    @endif
                </th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td><img src="{{ asset('storage/user_avatar/' . $user->avatar) }}"
                            alt="Avatar de {{ $user->name }}" class="w-12 h-12 rounded-full mx-2"></td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->lastname }}</td>
                    <td>{{ date('d-m-Y', strtotime($user->birthdate)) }}</td>
                    <td>{{ number_format($user->simulator_balance, 2) }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->rol }}</td>
                    <td>
                        <button wire:click="showUserDetail({{ $user->id }})">Ver Detalles</button>
                        <button wire:click="confirmUserDeletion({{ $user->id }})">Eliminar</button>
                    </td>
                </tr>
            @endforeach
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
                                    Fecha de Naciemiento: {{ $userDetails->birthdate }}
                                </p>
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    Saldo simulador: {{ $userDetails->simulator_balance }}
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
    @if ($showModalDetails)

        <div class="modal" id="medium-modal" tabindex="-1"
            class="shadow-xl fixed inset-0 z-50 overflow-y-auto bg-gray-900 bg-opacity-60 flex justify-center items-center">
            <div class="fixed inset-0 z-50 overflow-y-auto bg-gray-900 bg-opacity-60 flex justify-center items-center ">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 min-w-[300px] min-h-[300px]">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                            ¿Realmente deseas eliminar el usuario {{ $userDetails->name }} ? 
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

                                
                        </div>                  
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-2 md:p-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        
                        <button wire:click="closeUserDelete" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cerrar</button>
                    </div>
                </div>
            </div>
            
    @endif






</div>
