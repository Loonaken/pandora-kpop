<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
            {{-- main --}}
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">

                            {{-- content --}}
                            <section class="text-gray-600 body-font">
                                <div class="container px-5 py-12 mx-auto">
                                    <div class="w-full mb-12">
                                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-8 text-gray-900 text-center ml-6 ">Pandora K-popへようこそ！</h1>
                                        <x-application-logo class="block h-24 mx-auto rounded-md w-auto fill-current text-gray-800" />
                                    </div>
                                    @if (Route::has('user.login'))
                                    @auth('users')
                                        <div class="mx-auto text-center">
                                            <h2 class=" sm:text-2xl text-lg font-medium title-font mb-8 text-gray-900">おかえりなさい！</h2>
                                            <a href="{{ url('/dashboard') }}" class="mr-3 fix w-32 md:w-40 border-2 border-gray-300 p-4  hover:bg-lime-200 transition-colors duration-300 ease-in-out">ダッシュボードへ</a>
                                        </div>
                                    @else
                                        <div class="flex flex-row-reverse">
                                            <div class="fix w-32 md:w-40 border-2 border-gray-300 p-4 mx-auto text-center hover:bg-yellow-200 transition-colors duration-300 ease-in-out">
                                                <a href="{{ route('user.login') }}" >ログイン</a>
                                            </div>
                                    @if (Route::has('user.register'))
                                            <div class="fix w-32 md:w-40 border-2 border-gray-300 p-4 mx-auto text-center hover:bg-yellow-200 transition-colors duration-300 ease-in-out">
                                                <a href="{{ route('user.register') }}" >新規登録</a>
                                            </div>
                                        </div>
                                    @endif
                                    @endauth
                                    @endif
                                </div>
                            </section>
                            {{-- fin content --}}

                        </div>
                    </div>
                </div>
            {{-- fin main --}}
        </div>
    </body>
</html>
