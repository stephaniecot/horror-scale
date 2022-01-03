<!doctype html>

<title>Horror Scale</title>
<link rel="stylesheet" href="app.css">
{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">



<body>
        <div class='wrapper'>
        <nav class="navbar">
                <a href="/">
                    <img src="/images/logo-white.png" alt="Horror Scale Logo"class='logo-white'>
                </a>
                <a href="/scores">Show by scores</a>
                <a href="/posts">Show all</a>



            @if (Route::has('login'))

                @auth
                    <a href="/create">Add a post</a>
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                @else
                    <a href="{{ route('login') }}" >Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
                <form method="GET" action="/">
                <input type="text"
                       name="search"
                       placeholder="Search"
                       class="searchbar"
                       value="{{ request('search') }}">
            </form>
        @endif
    </nav>
</div>



    {{ $slot }}

</body>

<footer>
    
</footer>
