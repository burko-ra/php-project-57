<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-param" content="_token" />

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div id="app">
        <header class="fixed w-full">
            <nav class="bg-white border-gray-200 py-2.5 dark:bg-gray-900 shadow-md">
                <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Менеджер
                            задач</span>
                    </a>

                    <div class="flex items-center lg:order-2">
                        @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                class="block bg-blue-500 hover:bg-blue-700 hover:cursor-pointer text-white font-bold py-2 px-4 rounded ml-2">
                                {{ __('Выход') }}
                            </a>
                        </form>
                        @else
                        <a href="{{ route('login') }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">
                            Вход
                        </a>

                        <a href=" {{ route('register') }} "
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">
                            Регистрация
                        </a>
                        @endauth
                    </div>

                    <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1">
                        <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                            <li>
                                <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 hover:text-blue-700 lg:p-0">
                                    Задачи </a>
                            </li>
                            <li>
                                <a href="{{ route('task_statuses.index') }}" class="block py-2 pl-3 pr-4 text-gray-700 hover:text-blue-700 lg:p-0">
                                    Статусы </a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 hover:text-blue-700 lg:p-0">
                                    Метки </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        @yield('content')
    </div>


</body>

</html>
