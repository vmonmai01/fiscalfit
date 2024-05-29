<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl  leading-tight">
            {{ __('Dashboard') }}
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
                    
                    @livewire('monthly-income-total')
                    @livewire('monthly-expense-total')
                    @livewire('monthly-balance-total')
                    
                    <!-- Aquí renderizamos el componente ChartBarDiferenceBtwIncExp -->
                         <x-chart-bar-diference-btw-inc-exp /> 
                
  
                    {{-- @livewire('bar-charts.profit-diference') --}}

      




        
                    
                    
         
                  

               

                    
                    


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
