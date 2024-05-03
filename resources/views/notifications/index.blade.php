<x-app-layout>
    <h1> Hola hola </h1>
    {{auth()->user()->name}}
    Gastos:{{auth()->user()->expenses()->sum('amount')}}
    <br>
    Ingresos:{{auth()->user()->incomes()->sum('amount')}}
    {{auth()->user()->name}}

    @if ($notifications->isNotEmpty())
    <p>Entra en notificaciones</p>
    @foreach ($notifications as $notification)
        <h2>Mensaje: {{ $notification->message }}</h2>
    @endforeach
    @else
        <p>No tienes notificaciones.</p>
    @endif

</x-app-layout>