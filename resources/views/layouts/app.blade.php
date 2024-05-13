<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('FiscalFit', 'FiscalFit') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts" async></script>
    @vite(['resources/css/app.css', 'resources/css/news.css', 'resources/js/app.js', 'resources/js/chartExpesesDates.js', 'resources/js/chartIncomesDates.js', 'resources/js/chartBtwIncExp.js', 'resources/js/noticias.js'])

</head>

<body class="font-sans antialiased">
    <div class="flex bg-gray-100 dark:bg-gray-900">
        <!-- Sidebar -->
        <div class="basis-1/12">
            @include('prueba2')
        </div>
        

        <!-- Contenido principal -->
        <div class="w-full">
            <!-- Encabezado -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Contenido de la página -->
            <main class="">
                {{ $slot }}
            </main>
        </div>
    </div>

    <!-- Aquí se incluirán los scripts específicos de la página -->
    @yield('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
