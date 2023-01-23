<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="あなたのハマるKpopが見つかる" >

        <title>{{ config('app.name', 'Pandora_Kpop') }}</title>


        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="icon" href="/favicon.ico" id="favicon" >
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png" >

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            input[type=radio]{
                display:none;
            }
            input:checked + label {
    background: orange;
    font-weight: 500;
    color: #fff;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @if(request()->is('admin*'))
                @include('layouts.admin-navigation')
            @else
                @include('layouts.user-navigation')
            @endif

            <!-- Page Heading -->
            @if (isset($header))
                <header class="">
                    <div class=" tracking-wider w-60 lg:w-45 mt-4 mx-auto text-center py-2 px-2 -mb-10 border-4 border-gray-400 ">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
