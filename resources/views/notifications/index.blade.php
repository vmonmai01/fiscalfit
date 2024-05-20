<x-app-layout>

    @if ($notifications->isNotEmpty())
        
        @foreach ($notifications as $notification)
            <hr>

            <h3>Descripción del gasto: {{ $notification->expense->description }}</h3>

            <h3>Importe gasto: {{ $notification->expense->amount }}</h3>

            <h3>Fecha del gasto: {{ $notification->expense->date }}</h3>

            <h3>Fecha notificación: {{ $notification->send_at }}</h3>
            
            <hr>
            
        @endforeach
    @else
        <p>No tienes notificaciones.</p>
    @endif

</x-app-layout>
