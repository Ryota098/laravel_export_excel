<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    
    <livewire:styles />
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-gray-800 py-5">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/') }}" class="text-xl font-bold text-gray-100 no-underline">
                        Laravel Excel
                    </a>
                </div>
                <nav class="space-x-6 text-gray-100 text-sm sm:text-base font-bold">
                    @guest
                        <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <a href="{{ route('survey') }}" class="no-underline hover:underline text-sm">
                            アンケート回答一覧
                        </a>
                        {{-- <a href="{{ route('upload') }}" class="no-underline hover:underline text-sm">
                            インポート
                        </a> --}}
                        <a href="{{ route('logout') }}"
                            class="no-underline hover:underline text-sm"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">ログアウト</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>
            </div>
        </header>
    
        @yield('content')
    </div>
    
    <livewire:scripts />
</body>
</html>
