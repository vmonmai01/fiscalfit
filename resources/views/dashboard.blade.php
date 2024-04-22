<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ session('status') }}
                        </div>
                    @endif
                    <hr>
                    <div>
                        @livewire('expenses-table')
                    </div>
                    <hr>
                    <div>
                        @livewire('incomes-table')
                    </div>
                    <div>
                        <!-- Aquí renderizamos el componente ChartBarDiferenceBtwIncExp -->
                        <x-chart-bar-diference-btw-inc-exp />
                    </div>

                    <div>
                        @livewire('chart-incomes-date')
                    </div>
                    {{-- @livewire('bar-charts.profit-diference') --}}

                    <hr>

                    @livewire('chart-expense-date')



                    <hr>

                    
                        
                    {{-- <h1> Grafico de ingresos</h1>
                    @livewire('income-chart') --}}
                    <hr>
                    {{-- 
                    <h1> Grafico de gastos</h1>
                    @livewire('expense-chart')
                    
                    
                    <hr>
                    @livewire('monthly-income-total')
                    @livewire('monthly-expense-total')
                    @livewire('monthly-balance-total')

                    <hr>

                    @livewire('add-income')    
                    
                    <hr>

                    @livewire('add-expense') 
                    --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
