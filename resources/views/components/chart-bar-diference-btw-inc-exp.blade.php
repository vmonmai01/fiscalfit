<div class="max-w-md w-full rounded-lg shadow bg-oscuro p-4 md:p-6">
    <div class="flex justify-between border-amarillo border-b pb-3">
        <dl>
            <dt class="text-base font-normal text-white pb-1"> Diferencia </dt>
            <dd id="Diferencia" class="leading-none text-3xl font-bold text-white"></dd>
        </dl>
    </div>
    <div>
        <div class="grid grid-cols-2 py-3 ">
            <dl>
                <dt class="text-base font-normal text-white pb-1 ml-3">Ingresos</dt>
                <dd id="totalIncome" class="leading-none text-xl font-bold text-green-500 dark:text-green-400"></dd>
            </dl>
            <dl>
                <dt class="text-base font-normal text-white pb-1"> Gastos</dt>
                <dd id="totalExpenses" class="leading-none text-xl font-bold text-red-600 dark:text-red-500"></dd>
            </dl>
        </div>

        <div id="barChartBtwIncExp" style="width: 400px; height: 300px;"></div>

        <button id="dropdownBtwIncExp" data-dropdown-toggle="lastDaysBtwIncExp" data-dropdown-placement="bottom"
                        class="text-sm font-medium text-gray-400 hover:text-white text-center inline-flex items-center"
                        type="button">
                        Período
                        <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
        </button>
        <div id="lastDaysBtwIncExp"
            class="z-10 hidden divide-y divide-gray-100 rounded-lg shadow w-44 bg-oscuro">
            <ul class="py-2 text-sm text-white text-center" aria-labelledby="dropdownBtwIncExp">
                <li>
                    <button id="btn3" class="btn btn-primary py-2">3 Meses</button>
                </li>
                <li>
                    <button id="btn6" class="btn btn-primary py-2">6 Meses</button>
                </li>
                <li>
                    <button id="btn9" class="btn btn-primary py-2">9 Meses</button>
                </li>
                <li>
                    <button id="btn12" class="btn btn-primary py-2">12 Meses</button>
                </li>
            </ul>
        </div>
    </div>
</div>
