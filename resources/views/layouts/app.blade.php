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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9537eb5475.js" crossorigin="anonymous"></script>
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts" async></script>
    @vite(['resources/css/app.css', 'resources/css/news.css', 'resources/js/app.js'])
    {{-- 'resources/js/chartExpesesDates.js', 'resources/js/chartIncomesDates.js', 'resources/js/chartBtwIncExp.js', 'resources/js/noticias.js' --}}

    @include('layouts.navigation')

<body class="bg-medio text-gray-900 flex flex-col min-h-screen">
    <div class="flex flex-grow bg-medio">
        <!-- Sidebar -->
        <div class="basis-1/12">
            @include('prueba2')
        </div>


        <!-- Contenido principal -->
        <div class="basis-11/12 px-[80px]">
            <!-- Encabezado -->
            @if (isset($header))
                <header class="bg-oscuro text-white shadow rounded-md mt-3 mx-4 py-4 px-4">
                    <div class="text-center">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Contenido de la página -->
            <main class="bg-oscuro m-3 rounded-lg flex-grow p-4">
                {{ $slot }}
            </main>
        </div>
    </div>
    @include('layouts.footer')

    <!-- Aquí se incluirán los scripts específicos de la página -->
    @stack('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
