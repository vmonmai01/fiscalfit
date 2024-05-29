<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl  leading-tight">
            GASTOS
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
                </div>
                <section name="tabla-gastos">
                    @livewire('expenses-table')
                </section>
                <div class="flex flex-wrap">
                    <section name="formulario-gastos" class="w-full md:w-1/2 p-6 flex justify-center items-center  " >
                        @livewire('add-expense')
                    </section>
                    <section name="grafica-gastos" class="w-full md:w-1/2 p-6 flex justify-center items-center ">
                        @livewire('chart-expense-date')
                    </section>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>