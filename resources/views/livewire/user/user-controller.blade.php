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
                    @if ($sortField == 'name' && $sortAsc)
                        <span><i class="fa-solid fa-arrow-up-long fa-bounce" style="color: green;"></i></span>
                    @elseif($sortField == 'name' && !$sortAsc)
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

</div>
