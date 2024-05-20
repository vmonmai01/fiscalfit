<x-app-layout>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($notifications->isNotEmpty())

        <table>
            <thead>
                <tr>
                    <th>Descripción del gasto</th>
                    <th>Importe gasto</th>
                    <th>Fecha del gasto</th>
                    <th>Fecha notificación</th>
                    <th> Leída </th>
                    <th> Marcar como leida </th>
                </tr>
            </thead>
            <tbody>

                @foreach ($notifications as $notification)
                    <tr>
                        <td>{{ $notification->expense->description }}</td>

                        <td>{{ $notification->expense->amount }}</td>

                        <td>{{ \Carbon\Carbon::parse($notification->expense->date)->format('d-m-Y') }}</td>

                        <td>{{ \Carbon\Carbon::parse($notification->send_at)->format('d-m-Y') }}</td>

                        <td>
                            @if ($notification->read)
                                ✔
                            @else
                                ✘
                            @endif
                        </td>
                        <td>                           
                            @if (!$notification->read)
                                <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST">
                                    @csrf
                                    <button type="submit">Marcar como leída</button>
                                </form>
                            @endif
                        </td>
                        
                    <tr>
                @endforeach
            @else
                <p>No tienes notificaciones.</p>
    @endif

</x-app-layout>
