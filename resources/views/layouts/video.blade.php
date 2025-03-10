<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'WP to Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://player.vimeo.com/api/player.js"></script>

</head>
<body>
    <div id="app" class="max-w-5xl mx-auto px-2">
        <nav class="bg-sky-700 text-sm text-white flex justify-between py-3 px-4 border-b border-b-white">
            <!-- Branding Image -->
            <a class="uppercase" href="{{ url('/') }}">
                {{ config('app.name', 'WP to Laravel') }}
            </a>

            <ul class="flex gap-6">
                <!-- Authentication Links -->
                @guest
                    <li><a class="uppercase" href="{{ route('login') }}">Login</a></li>
                    <li><a class="uppercase" href="{{ route('register') }}">Register</a></li>
                @else
                    <li>
                        <a class="uppercase" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endguest
            </ul>
        </nav>

        <main>
            @yield('content')
        </main>

        <footer class="bg-sky-700 text-sm text-white text-center py-3 px-4 border-b border-b-white">
            Made by and &copy; <a class="underline" href="https://rosswintle.uk/">Ross Wintle</a>, 2018 | <a class="underline" href="{{ '/privacy' }}">Privacy</a>
        </footer>
    </div>

    @include('partials.global-footer-scripts')
</body>
</html>
