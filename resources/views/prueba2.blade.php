<!-- Añade tus propios estilos personalizados aquí si es necesario -->
<style>
    /* Estilos personalizados */

    /* Estilos personalizados */
    .sidebar {
        height: 100vh;
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
        class="sidebar absolute flex flex-col items-center w-16 h-full overflow-hidden text-claro bg-oscuro rounded-br-2xl rounded-tr-2xl">
        <button id="toggleSidebarCollapsed" class="flex items-center justify-center mt-3" href="#">
            <svg class="w-8 h-8 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path
                    d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z" />
            </svg>
        </button>
        <div class="flex flex-col items-center mt-3 border-t border-gray-700">
            <a class="flex items-center justify-center w-12 h-12 mt-2 rounded hover:bg-medio hover:text-amarillo" onmouseover="expandSidebar()"
                href="#">
                <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
            </a>

            <a class="flex items-center justify-center w-12 h-12 mt-2  hover:bg-medio hover:text-amarillo rounded" onmouseover="expandSidebar()"
                href="#">
                <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </a>
            <a class="flex items-center justify-center w-12 h-12 mt-2 rounded hover:bg-medio hover:text-amarillo" onmouseover="expandSidebar()"
                href="#">
                <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                </svg>
            </a>
        </div>


        <div class="flex flex-col items-center mt-2 border-t border-gray-700">
            <a class="flex items-center justify-center w-12 h-12 mt-2 rounded hover:bg-medio hover:text-amarillo" onmouseover="expandSidebar()"
                href="#">
                <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </a>
            <a class="flex items-center justify-center w-12 h-12 mt-2 rounded hover:bg-medio hover:text-amarillo"
                href="#">
                <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                </svg>
            </a>
            <a class="relative flex items-center justify-center w-12 h-12 mt-2 rounded hover:bg-medio hover:text-amarillo" onmouseover="expandSidebar()"
                href="#">
                <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                </svg>
                {{-- Añadir @if existe notificaciones -> mostrar, sino no  --}}
                <span class="absolute top-0 left-0 w-2 h-2 mt-2 ml-2 bg-red-500 rounded-full"></span>
            </a>
        </div>

    </div>

    <!-- Component Expanded -->
    <div id="sidebarExpanded"
        class="sidebar absolute hidden flex flex-col items-center w-40 h-full overflow-hidden text-claro bg-oscuro rounded-br-2xl rounded-tr-2xl" onmouseleave="collapseSidebar()">
        <button id="toggleSidebarExpanded" class="flex items-center w-full px-3 mt-3" href="#">
            <svg class="w-8 h-8 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                fill="currentColor">
                <path
                    d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z" />
            </svg>
            <span class="ml-2 text-sm font-bold"> FISCAL FIT</span>
        </button>
        <div class="w-full px-2">
            <div class="flex flex-col items-center w-full mt-3 border-t border-gray-700">
                <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-medio hover:text-amarillo " 
                    href="#">
                    <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="ml-2 text-sm font-medium"> Inicio</span>
                </a>
                <a class="flex items-center w-full h-12 px-3 mt-2 hover:bg-medio hover:text-amarillo rounded" 
                    href="#">
                    <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span class="ml-2 text-sm font-medium"> Gráficos</span>
                </a>
                <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-medio hover:text-amarillo"
                    href="#">
                    <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                    </svg>
                    <span class="ml-2 text-sm font-medium"> Noticias</span>
                </a>
            </div>
            <div class="flex flex-col items-center w-full mt-2 border-t border-gray-700">
                <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-medio hover:text-amarillo"
                    href="#">
                    <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="ml-2 text-sm font-medium"> Simulador Crypto</span>
                </a>
                <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-medio hover:text-amarillo"
                    href="#">
                    <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                    <span class="ml-2 text-sm font-medium">Services</span>
                </a>
                <a class="relative flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-medio hover:text-amarillo"
                    href="#">
                    <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                    </svg>
                    <span class="ml-2 text-sm font-medium"> Notificaciones </span>
                    {{-- Añadir @if existe notificaciones -> mostrar, sino no  --}}
                    <span class="absolute top-0 right-0 w-2 h-2 mt-2 mr-2 bg-red-500 rounded-full"></span>
                </a>
            </div>

        </div>
    </div>

    <script>
        const toggleButtonCollapsed = document.getElementById('toggleSidebarCollapsed');
        const toggleButtonExpanded = document.getElementById('toggleSidebarExpanded');
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

        toggleButtonCollapsed.addEventListener('click', () => {
            // Si el sidebar colapsado tiene la clase 'hidden', significa que está oculto.
            if (collapsedSidebar.classList.contains('hidden')) {
                collapseSidebar()
            } else {
                // De lo contrario, si el sidebar colapsado no tiene la clase 'hidden', lo ocultamos y mostramos el sidebar expandido.
                expandSidebar() 
            }
        });

        toggleButtonExpanded.addEventListener('click', () => {
            // Si el sidebar expandido tiene la clase 'hidden', significa que está oculto.
            if (expandedSidebar.classList.contains('hidden')) {
                // Por lo tanto, lo mostramos y ocultamos el sidebar colapsado.
                expandedSidebar.classList.remove('hidden');
                collapsedSidebar.classList.add('hidden');
            } else {
                // De lo contrario, si el sidebar expandido no tiene la clase 'hidden', lo ocultamos y mostramos el sidebar colapsado.
                expandedSidebar.classList.add('hidden');
                collapsedSidebar.classList.remove('hidden');
            }
        });
    </script>
</body>

</html>
