<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <script>
        const userId = {{ $userId ?? 'null' }};
        console.log('ID del usuario:', userId);
    </script>

    <div class="div">
        <div class="max-w-md w-full rounded-lg shadow bg-oscuro p-4 md:p-6">

            <div class="flex justify-between border-amarillo border-b pb-3">
                <div class="flex-col items-center">
                    <div class="flex items-center mb-1">
                        <h5 class="text-xl font-bold leading-none text-white pb-1"> Ingresos por fecha
                        </h5>

                    </div>
                </div>
            </div>
            <!-- Pie Chart -->
            <div class="py-6" id="incomesDate-chart">

            </div>
            <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                <div class="flex justify-between items-center pt-5">
                    <!-- Button -->
                    <button id="dropdownIncomes" data-dropdown-toggle="lastDaysIncomes" data-dropdown-placement="bottom"
                        class="text-sm font-medium text-gray-400 hover:text-white text-center inline-flex items-center"
                        type="button">
                        Período
                        <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <div id="lastDaysIncomes"
                        class="z-10 hidden bg-oscuro divide-y divide-gray-100 rounded-lg shadow w-44 ">
                        <ul class="py-2 text-sm text-white text-center" aria-labelledby="dropdownIncomes">
                            <li>
                                <button class="btn btn-primary py-2" type="button" value="1"> 1 Mes</button>
                            </li>
                            <li>
                                <button class="btn btn-primary py-2" type="button" value="3"> 3 Meses</button>
                            </li>
                            <li>
                                <button class="btn btn-primary py-2" type="button" value="6"> 6 Meses</button>
                            </li>
                            <li>
                                <button class="btn btn-primary py-2" type="button" value="12"> 1 Año</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
