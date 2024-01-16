<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            @auth
            <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
                <svg class="h-32 w-auto bg-gray-100 dark:bg-gray-900" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="256" cy="256" r="256" fill="#FFF3E2" />
                    <circle cx="256.5" cy="256.5" r="209.5" stroke="#03989E" stroke-width="32" />
                    <path d="M205.256 298.032L155.848 266.032V252.976L205.256 220.976V238L171.336 259.248V259.76L205.256 281.008V298.032ZM227.222 322.48L269.334 211.12H285.078L242.966 322.48H227.222ZM307.044 298.032V281.008L340.964 259.76V259.248L307.044 238V220.976L356.452 252.976V266.032L307.044 298.032Z" fill="#03989E" />
                </svg>
            </div>

            <div class="mt-16">
                <div>
                    @if(auth()->user())
                    <h1 class="text-5xl text-center justify-center font-extrabold text-gray-900 dark:text-white">Welcome, {{ auth()->user()->name }}</h1>

                    <div>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-primary-button class="ml-3" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-primary-button>
                        </form>
                    </div>
                    @else
                    <h1 class="text-5xl text-center justify-center font-extrabold text-gray-900 dark:text-white">User SSO</h1>
                    @endif
                </div>
            </div>

            <div class="flex justify-between mt-16 px-0">
                <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                    <div class="flex items-center gap-4">
                        <a href="https://github.com/pujiantodev" class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="-mt-px mr-1 w-5 h-5 stroke-gray-400 dark:stroke-gray-600 group-hover:stroke-gray-600 dark:group-hover:stroke-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                            Support by @pujiantodev
                        </a>
                    </div>
                </div>

                <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </div>
            </div>
        </div>
    </div>
</body>

</html>
