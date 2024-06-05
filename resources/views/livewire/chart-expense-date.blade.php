<div>
     <script>
        const userId = {{ $userId ?? 'null' }};
        console.log('ID del usuario:', userId);
    </script> 

    <!-- Gráfico de porcentage de gastos por fecha -->
    <div class="div">
        <div class="max-w-md w-full rounded-lg shadow bg-oscuro p-4 md:p-6">

            <div class="flex justify-between border-amarillo border-b pb-3">
                <div class="flex-col items-center">
                    <div class="flex items-center mb-1">
                        <h5 class="text-xl font-bold leading-none text-white pb-1"> Gastos por fecha</h5>
    
                    </div>
                </div>
            </div>
            <!-- Pie Chart -->
            <div class="py-6" id="expenseDate-chart2">
    
            </div>
            <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
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
                        class="z-10 hidden bg-oscuro divide-y divide-gray-100 rounded-lg shadow w-44 ">
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
    
    {{-- Gráfico de flowbite --}}
    {{-- 
    <div class="div">
        <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">

            <div class="flex justify-between items-start w-full">
                <div class="flex-col items-center">
                    <div class="flex items-center mb-1">
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white me-1">Website traffic</h5>
    
                    </div>
                </div>
            </div>
            <!-- Pie Chart -->
            <div class="py-6" id="pie-chart">
    
            </div>
            <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                <div class="flex justify-between items-center pt-5">
                    <!-- Button -->
                    <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown"
                        data-dropdown-placement="bottom"
                        class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                        type="button">
                        Last 7 days
                        <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <div id="lastDaysdropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                    7 days</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                    30 days</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                    90 days</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    --}}
    
</div>
