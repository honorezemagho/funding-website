<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="referrer" content="always">

        <meta name="description" content="Together we can do more">

        <title>TOGETHER</title>

         <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/custom.js')}}"></script>
    </head>
    <body>
        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200 font-roboto">
            <x-dashboard.sidebar/>

            <div class="flex-1 flex flex-col overflow-hidden">
                <x-dashboard.header/>

                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    <div class="container mx-auto px-6 py-8">
                        @yield('body')
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>
