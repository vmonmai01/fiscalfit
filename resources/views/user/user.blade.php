<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-4xl text-white leading-tight">
            Administración de Usuarios
        </h2>
    </x-slot>
    @livewire('user.user-controller')
</x-app-layout>