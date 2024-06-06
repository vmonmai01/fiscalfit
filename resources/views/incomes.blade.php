<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl  leading-tight">
            INGRESOS
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-8 lg:px-8">
            <div class="bg-oscuro rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <section name="tabla-ingresos">
                    @livewire('incomes-table')
                </section>
                <div class="flex flex-wrap">
                    <section name="formulario-ingresos" class="w-full md:w-1/2 p-6 flex justify-center items-center">
                        @livewire('add-income')
                    </section>
                    <section name="grafica-ingresos" class="w-full md:w-1/2 p-6 flex justify-center items-center">
                        @livewire('chart-incomes-date')
                    </section>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    @vite('resources/js/chartIncomesDates.js')
    @endpush
</x-app-layout>
