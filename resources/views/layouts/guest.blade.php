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
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-white antialiased ">
    <div class="containerBackground min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0  ">
        <div class="flex flex-col items-center justify-center">
            <a href="/">
                <img class="w-auto h-24" src="{{ asset('storage/fiscalfit/fiscal.png') }}">    
            </a>
            <a href="/">
                <img class="w-auto h-24 self-start" src="{{ asset('storage/fiscalfit/logo.png') }}">            
            </a>
        </div>
        
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-oscuro shadow-md overflow-hidden sm:rounded-lg ">

            <div>
                {{ $slot }}
            </div>

        </div>
    </div>
</body>

</html>
