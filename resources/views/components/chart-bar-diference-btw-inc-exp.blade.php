<div class="max-w-md w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
    <div class="flex justify-between border-gray-200 border-b dark:border-gray-700 pb-3">
        <dl>
            <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Profit</dt>
            <dd id="Diferencia" class="leading-none text-3xl font-bold text-gray-900 dark:text-white">$5,405</dd>
        </dl>
    </div>
    <div>
        <div class="grid grid-cols-2 py-3 ">
            <dl>
                <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1 ml-3">Income</dt>
                <dd id="totalIncome" class="leading-none text-xl font-bold text-green-500 dark:text-green-400"></dd>
            </dl>
            <dl>
                <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Expense</dt>
                <dd id="totalExpenses" class="leading-none text-xl font-bold text-red-600 dark:text-red-500"></dd>
            </dl>
        </div>

        <div id="barChartBtwIncExp" style="width: 400px; height: 300px;"></div>

        <button id="dropdownBtwIncExp" data-dropdown-toggle="lastDaysBtwIncExp" data-dropdown-placement="bottom"
                        class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                        type="button">
                        Time
                        <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
        </button>
        <div id="lastDaysBtwIncExp"
            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200 text-center" aria-labelledby="dropdownBtwIncExp">
                <li>
                    <button id="btn3" class="btn btn-primary">3 Meses</button>
                </li>
                <li>
                    <button id="btn6" class="btn btn-primary">6 Meses</button>
                </li>
                <li>
                    <button id="btn9" class="btn btn-primary">9 Meses</button>
                </li>
                <li>
                    <button id="btn12" class="btn btn-primary">12 Meses</button>
                </li>
            </ul>
        </div>

    </div>
</div>
