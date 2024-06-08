<div>
    <script>
        const userId = {{ $userId ?? 'null' }};
        console.log('ID del usuario:', userId);
    </script>
    <!-- Gráfico de porcentage de gastos por fecha -->
    <div class="div" id="graficoGastos">
        <div class="max-w-md w-full rounded-lg shadow shadow-amarillo bg-oscuro p-4 md:p-6">

            <div class="flex justify-between border-amarillo border-b pb-3">
                <div class="flex-col items-center">
                    <div class="flex items-center mb-1">
                        <h5 class="text-xl font-bold leading-none text-white pb-1"> Gastos por fecha</h5>
    
                    </div>
                </div>
            </div>            
            <!-- Mensaje de No hay datos disponibles -->
            <div class="grid grid-cols-1 items-center border-amarillo border-t  justify-between">
                <div id="noDataMessage" class="hidden text-lg text-center text-amarillo p-4 ">
                    No hay datos disponibles para mostrar el gráfico.
                </div>
            </div>
            <!-- Main Chart -->
            <div class="py-6" id="expenseDate-chart2"></div>
            <!-- Dropdown -->
            <div class="grid grid-cols-1 items-center border-amarillo border-t  justify-between">
                <div class="flex justify-between items-center pt-5">
                    <!-- Button -->
                    <button id="dropdownExpenses" data-dropdown-toggle="lastDaysExpenses"
                        data-dropdown-placement="bottom"
                        class="text-sm font-medium text-gray-400 hover:text-white text-center inline-flex items-center"
                        type="button">
                        Período
                        <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <div id="lastDaysExpenses"
                        class="z-10 hidden bg-oscuro divide-y divide-amarillo rounded-lg shadow w-44 ">
                        <ul class="py-2 text-sm text-white text-center" aria-labelledby="dropdownExpenses">
                            <li>
                                <button id="btn1" class="btn btn-primary py-2" type="button" value="1"> 1 Mes</button>
                            </li>
                            <li>
                                <button id="btn3" class="btn btn-primary py-2" type="button" value="3"> 3 Meses</button>
                            </li>
                            <li>
                                <button id="btn6"  class="btn btn-primary py-2" type="button" value="6"> 6 Meses</button>
                            </li>
                            <li>
                                <button id="btn12"  class="btn btn-primary py-2" type="button" value="12"> 1 Año</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
