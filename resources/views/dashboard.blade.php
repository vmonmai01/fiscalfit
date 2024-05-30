<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-4xl text-white leading-tight">
            Inicio
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-8 lg:px-8">
            <div class="bg-oscuro rounded-lg">
                <div class="p-6 text-gray-900 ">
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600 ">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="flex flex-wrap space-x-8 items-center justify-center my-4">
                        @livewire('monthly-income-total')
                        @livewire('monthly-expense-total')
                        @livewire('monthly-balance-total')
                    </div>


                    <!-- Aquí renderizamos el componente ChartBarDiferenceBtwIncExp -->
                    <div class="flex justify-center my-4 mx-auto">
                        <x-chart-bar-diference-btw-inc-exp />
                    </div>
                   


                    {{-- @livewire('bar-charts.profit-diference') --}}


















                </div>
            </div>
        </div>
    </div>
</x-app-layout>
