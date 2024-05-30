<!-- Añade tus propios estilos personalizados aquí si es necesario -->
<style>
    /* Estilos personalizados */

    /* Estilos personalizados */
    .sidebar {

        /* Establece la altura del contenedor de la barra lateral al 100% de la ventana gráfica */
        position: fixed;
    }

    .last-item {
        position: fixed;
        /* Fija el elemento */
        bottom: 0;
        /* Lo coloca en la parte inferior de la página */
        left: 0;
        /* Alinea a la izquierda */
        width: 16;
        border-bottom-right-radius: 16px;
    }
</style>
</head>
</head>

<body class="font-sans antialiased">
    {{--  Botón para mostrar el sidebar completo o esconderlo --}}


    {{-- Div colapsed --}}
    <div id="sidebarCollapsed"
        class="sidebar absolute flex flex-col items-center w-16 h-auto  text-claro bg-oscuro rounded-br-2xl rounded-tr-2xl pb-2">
        <a href="{{ route('dashboard') }}" class="p-4">
            {{-- <x-application-logo class="block h-9 w-auto fill-current text-amarillo" /> --}}
            <img src="{{ asset('storage/fiscalfit/logo.png') }}" alt="logo" class="block h-7 w-auto fill-current ">
        </a>
        <div class="flex flex-col items-center mt-3 border-t border-gray-700">
            <a class="flex items-center justify-center w-12 h-12 mt-2 rounded hover:bg-medio hover:text-amarillo"
                onmouseover="expandSidebar()" href="#">
                <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
            </a>
            <a class="flex items-center justify-center w-12 h-12 mt-2 rounded hover:bg-medio hover:text-amarillo"
                onmouseover="expandSidebar()" href="#">
                <i class="fa-solid fa-arrow-right" style="color: #63E6BE;"></i>
            </a>
            <a class="flex items-center justify-center w-12 h-12 mt-2 rounded hover:bg-medio hover:text-amarillo"onmouseover="expandSidebar()"
                href="#">
                <i class="fa-solid fa-arrow-right fa-flip-horizontal" style="color: #f90606;"></i>
            </a>
            <a class="relative flex items-center justify-center w-12 h-12 mt-2 rounded hover:bg-medio hover:text-amarillo"
                onmouseover="expandSidebar()" href="#">
                <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                </svg>
                {{-- Añadir @if existe notificaciones -> mostrar, sino no  --}}
                {{-- <span class="absolute top-0 left-0 w-2 h-2 mt-2 ml-2 bg-red-500 rounded-full"></span> --}}
            </a>
        </div>

        <div class="flex flex-col items-center mt-2 border-t border-gray-700">
            <a class="flex items-center justify-center w-12 h-12 mt-2 rounded hover:bg-medio hover:text-amarillo"
                onmouseover="expandSidebar()" href="#">
                <i class="fa-brands fa-bitcoin fa-lg" style="color: #FFD43B;"></i>
            </a>
            <a class="flex items-center justify-center w-12 h-12 mt-2 rounded hover:bg-medio hover:text-amarillo"
                onmouseover="expandSidebar()" href="#">
                <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                </svg>
            </a>
        </div>

    </div>

    <!-- Component Expanded -->
    <div id="sidebarExpanded"
        class="sidebar absolute hidden flex flex-col items-center w-40 h-auto  text-claro bg-oscuro rounded-br-2xl rounded-tr-2xl pb-2"
        onmouseleave="collapseSidebar()">
        <a href="{{ route('dashboard') }}" class="p-4">
            {{-- <x-application-logo class="block h-9 w-auto fill-current text-amarillo" /> --}}
            <img src="{{ asset('storage/fiscalfit/logo.png') }}" alt="logo" class="block h-9 w-auto fill-current ">
        </a>
        <div class="w-full px-2">
            <div class="flex flex-col items-center w-full mt-3 border-t border-gray-700">
                <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-medio hover:text-amarillo "
                    href="dashboard">
                    <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="ml-2 text-sm font-medium"> Inicio</span>
                </a>
                <a class="flex items-center w-full h-12 px-3 mt-2 hover:bg-medio hover:text-amarillo rounded"
                    href="{{ route('incomes') }}">
                    <i class="fa-solid fa-arrow-right" style="color: #63E6BE;"></i>
                    <span class="ml-2 text-sm font-medium"> Ingresos</span>
                </a>
                <a class="flex items-center w-full h-12 px-3 mt-2 hover:bg-medio hover:text-amarillo rounded"
                    href="{{ route('expenses') }}">
                    <i class="fa-solid fa-arrow-right fa-flip-horizontal" style="color: #f90606;"></i>
                    <span class="ml-2 text-sm font-medium"> Gastos</span>
                </a>
                <a class="relative flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-medio hover:text-amarillo"
                    href="notifications">
                    <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                    </svg>
                    <span class="ml-2 text-sm font-medium"> Notificaciones </span>
                    {{-- Añadir @if existe notificaciones -> mostrar, sino no  --}}
                    {{-- <span class="absolute top-0 right-0 w-2 h-2 mt-2 mr-2 bg-red-500 rounded-full"></span> --}}
                </a>

            </div>
            <div class="flex flex-col items-center w-full mt-2 border-t border-gray-700">
                <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-medio hover:text-amarillo"
                    href="cryptos">
                    <i class="fa-brands fa-bitcoin fa-lg" style="color: #FFD43B;"></i>
                    <span class="ml-2 text-sm font-medium"> Simulador Crypto</span>
                </a>

                <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-medio hover:text-amarillo"
                    href="news">
                    <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                    </svg>
                    <span class="ml-2 text-sm font-medium"> Noticias</span>
                </a>
            </div>

        </div>
    </div>

    <script>
        const collapsedSidebar = document.getElementById('sidebarCollapsed');
        const expandedSidebar = document.getElementById('sidebarExpanded');

        function expandSidebar() {
            collapsedSidebar.classList.add('hidden');
            expandedSidebar.classList.remove('hidden');
        }

        function collapseSidebar() {
            expandedSidebar.classList.add('hidden');
            collapsedSidebar.classList.remove('hidden');
        }
    </script>
</body>

</html>
