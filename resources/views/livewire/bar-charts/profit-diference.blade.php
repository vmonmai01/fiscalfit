<div>

    <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
        <div class="flex justify-between border-gray-200 border-b dark:border-gray-700 pb-3">
            <dl>
                <dt id="profit_label"class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Profit</dt>
                <dd id="total_profit"class="leading-none text-3xl font-bold text-gray-900 dark:text-white">$5,405</dd>
            </dl>
            <div>
                <span
                    id="profit_rate"class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-green-900 dark:text-green-300">
                    <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 13V1m0 0L1 5m4-4 4 4" />
                    </svg>
                    Profit rate 23.5%
                </span>
            </div>
        </div>

        <div class="grid grid-cols-2 py-3 px-3">
            <dl>
                <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Income</dt>
                <dd class="leading-none text-xl font-bold text-green-500 dark:text-green-400">$23,635</dd>
            </dl>
            <dl>
                <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Expense</dt>
                <dd class="leading-none text-xl font-bold text-red-600 dark:text-red-500">-$18,230</dd>
            </dl>
        </div>

        <div id="bar-chart1"></div>
        <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
            <div class="flex justify-between items-center pt-5">
                <!-- Button -->
                <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown2"
                    data-dropdown-placement="bottom"
                    class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                    type="button">
                    Timelapse
                    <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="lastDaysdropdown2"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a onclick="renderChart(1)"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                Mes actual</a>
                        </li>
                        <li>
                            <a onclick="renderChart(3)"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                Últimos 3 meses</a>
                        </li>
                        <li>
                            <a onclick="renderChart(6)"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                Últimos 6 meses</a>
                        </li>
                        <li>
                            <a onclick="renderChart(9)"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                Últimos 9 meses</a>
                        </li>
                        <li>
                            <a onclick="renderChart(12)"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                Último año</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

</div>
