<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-4xl text-white leading-tight">
            NOTIFICACIONES
        </h2>
    </x-slot>
    @if (session()->has('success'))
        <div id="infoSucces" class="fixed inset-0 flex items-center justify-center z-50 hidden text-green-500">
            <div class="flex bg-green-200 max-w-sm mb-4">
                <div class="w-16 bg-green-400">
                    <div class="p-4">
                        <svg class="h-8 w-8 text-white fill-current" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <path
                                d="M468.907 214.604c-11.423 0-20.682 9.26-20.682 20.682v20.831c-.031 54.338-21.221 105.412-59.666 143.812-38.417 38.372-89.467 59.5-143.761 59.5h-.12C132.506 459.365 41.3 368.056 41.364 255.883c.031-54.337 21.221-105.411 59.667-143.813 38.417-38.372 89.468-59.5 143.761-59.5h.12c28.672.016 56.49 5.942 82.68 17.611 10.436 4.65 22.659-.041 27.309-10.474 4.648-10.433-.04-22.659-10.474-27.309-31.516-14.043-64.989-21.173-99.492-21.192h-.144c-65.329 0-126.767 25.428-172.993 71.6C25.536 129.014.038 190.473 0 255.861c-.037 65.386 25.389 126.874 71.599 173.136 46.21 46.262 107.668 71.76 173.055 71.798h.144c65.329 0 126.767-25.427 172.993-71.6 46.262-46.209 71.76-107.668 71.798-173.066v-20.842c0-11.423-9.259-20.683-20.682-20.683z" />
                            <path
                                d="M505.942 39.803c-8.077-8.076-21.172-8.076-29.249 0L244.794 271.701l-52.609-52.609c-8.076-8.077-21.172-8.077-29.248 0-8.077 8.077-8.077 21.172 0 29.249l67.234 67.234a20.616 20.616 0 0 0 14.625 6.058 20.618 20.618 0 0 0 14.625-6.058L505.942 69.052c8.077-8.077 8.077-21.172 0-29.249z" />
                        </svg>
                    </div>
                </div>
                <div class="w-auto text-grey-darker items-center p-4">
                    <span class="text-lg font-bold pb-4">
                        Información
                    </span>
                    <p class="leading-tight">
                        {{ session('success') }}
                    </p>
                </div>
            </div>

        </div>
    @endif

    @if (session()->has('error'))
        <div id="infoError" class="fixed inset-0 flex items-center justify-center z-50 hidden">
            <div class="w-16 bg-red-600">
                <div class="p-4">
                    <svg class="h-8 w-8 text-white fill-current" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512">
                        <path
                            d="M437.019 74.981C388.667 26.629 324.38 0 256 0S123.333 26.63 74.981 74.981 0 187.62 0 256s26.629 132.667 74.981 181.019C123.332 485.371 187.62 512 256 512s132.667-26.629 181.019-74.981C485.371 388.667 512 324.38 512 256s-26.629-132.668-74.981-181.019zM256 470.636C137.65 470.636 41.364 374.35 41.364 256S137.65 41.364 256 41.364 470.636 137.65 470.636 256 374.35 470.636 256 470.636z"
                            fill="#FFF" />
                        <path
                            d="M341.22 170.781c-8.077-8.077-21.172-8.077-29.249 0L170.78 311.971c-8.077 8.077-8.077 21.172 0 29.249 4.038 4.039 9.332 6.058 14.625 6.058s10.587-2.019 14.625-6.058l141.19-141.191c8.076-8.076 8.076-21.171 0-29.248z"
                            fill="#FFF" />
                        <path
                            d="M341.22 311.971l-141.191-141.19c-8.076-8.077-21.172-8.077-29.248 0-8.077 8.076-8.077 21.171 0 29.248l141.19 141.191a20.616 20.616 0 0 0 14.625 6.058 20.618 20.618 0 0 0 14.625-6.058c8.075-8.077 8.075-21.172-.001-29.249z"
                            fill="#FFF" />
                    </svg>
                </div>
            </div>
            <div class="w-auto text-black opacity-75 items-center p-4">
                <span class="text-lg font-bold pb-4">
                    Error
                </span>
                <p class="leading-tight">
                    Ha ocurrido un error, recargue la página e intentelo de nuevo.
                </p>
            </div>
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-8 lg:px-8">
            <div class="bg-claro rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-5 my-5">
                        <table class="table-auto w-full text-md text-left rtl:text-right  text-gray-400 mb-2">
                            <thead class="text-sm uppercase bg-medio text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 tracking-wider">Descripción del gasto</th>
                                    <th scope="col" class="px-6 py-3 tracking-wider">Importe gasto</th>
                                    <th scope="col" class="px-6 py-3 tracking-wider">Fecha del gasto</th>
                                    <th scope="col" class="px-6 py-3 tracking-wider">Fecha notificación</th>
                                    <th scope="col" class="px-6 py-3 tracking-wider">Leída </th>
                                    <th scope="col" class="px-6 py-3 tracking-wider">Marcar como leida </th>
                                    <th scope="col" class="px-6 py-3 tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($notifications->isNotEmpty())
                                    @foreach ($notifications as $notification)
                                        <tr class="border-b bg-oscuro border-gray-700 hover:bg-gray-600">
                                            {{-- Verificar si el gasto asociado existe --}}
                                            @if ($notification->expense)
                                                <td class="px-6 py-4">{{ $notification->expense->description }}</td>
                                                <td class="px-6 py-4">{{ $notification->expense->amount }}</td>
                                                <td class="px-6 py-4">
                                                    {{ \Carbon\Carbon::parse($notification->expense->date)->format('d-m-Y') }}
                                                </td>
                                            @else
                                                {{-- Si el gasto asociado no existe, mostrar un mensaje --}}
                                                <td colspan="3" class="text-center px-6 py-4 text-red-500 font-bold">
                                                    El gasto asociado ha sido
                                                    eliminado</td>
                                            @endif

                                            <td class="px-6 py-4">
                                                {{ \Carbon\Carbon::parse($notification->send_at)->format('d-m-Y') }}
                                            </td>

                                            <td class="px-6 py-4">
                                                @if ($notification->read)
                                                    <svg class="w-3 h-3 text-green-500" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 16 12">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M1 5.917 5.724 10.5 15 1.5" />
                                                    </svg>
                                                @else
                                                    <svg class="w-3 h-3 text-red-500" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                @if (!$notification->read)
                                                    <form
                                                        action="{{ route('notifications.markAsRead', $notification->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit" class="focus:outline-none">
                                                            <i class="fa-solid fa-file-circle-check "
                                                                style="color: #e0b51a;"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <x-boton-delete
                                                    onclick="confirmDeleteNotification({{ $notification->id }})" />
                                            </td>
                                        <tr>
                                    @endforeach
                                @else
                                    <tr class="border-b bg-oscuro border-gray-700 hover:bg-gray-600">
                                        <td colspan="7" class="text-red-500 font-bold py-4">No tienes notificaciones.
                                        </td>
                                    <tr>
                                @endif

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (document.getElementById('infoSucces')) {
                showTemporaryMessage('infoSucces');
            }
            if (document.getElementById('infoError')) {
                showTemporaryMessage('infoError');
            }
        });

        function showTemporaryMessage(elementId) {
            var element = document.getElementById(elementId);
            element.classList.remove('hidden'); // Mostrar el elemento

            setTimeout(function() {
                element.classList.add('hidden'); // Ocultar el elemento después de 5 segundos
            }, 5000);
        }

        function confirmDeleteNotification(notificationId) {
            Swal.fire({
                title: "¿Estás seguro que deseas eliminar la notificación?",
                text: "¡No podrás revertir este proceso!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, borrar!",
                background: '#181A20',
                customClass: {
                    popup: 'swal2-custom'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteNotification(notificationId);
                }
            });
        }

        function deleteNotification(notificationId) {
            fetch(`/notifications/${notificationId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        Swal.fire(
                            'Eliminada!',
                            'La notificación ha sido eliminada.',
                            'success'
                        ).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire(
                            'Error!',
                            'No se pudo eliminar la notificación.',
                            'error'
                        );
                    }
                })
                .catch(error => {
                    Swal.fire(
                        'Error!',
                        'Hubo un problema con la solicitud: ' + error.message,
                        'error'
                    );
                });
        }
    </script>

</x-app-layout>
