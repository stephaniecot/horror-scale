<!doctype html>

<title>Horror Scale</title>
<link rel="stylesheet" href="/app.css">

{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}
<link rel="preconnect" href="https://fonts.gstatic.com">
<script src="//unpkg.com/alpinejs" defer></script>

<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">



<body>
    <div class='wrapper'>
        <nav>
            <div id='nav' class="navbar">
                <a href="/">
                    <img src="/images/logo-white.png" alt="Horror Scale Logo" class='logo-white'>
                </a>
                <button id='menu-icon' hidden>
                    <ion-icon name="menu-outline"></ion-icon>
                </button>
                <a href="/scores">Show by scores</a>
                <a href="/posts">Show all</a>



                @if (Route::has('login'))

                @auth
                <a href="/create">Add a post</a>
                <a href="{{ url('/favorites') }}">My Favorites</a>
                @can('admin')
                <a href="{{ url('/admin/posts') }}">manage posts</a>
                @endcan
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="route('logout')" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                        {{ __('Logout') }}
                    </a>
                </form>


                @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
                @endif
                @endauth
                <button id='search-icon'>
                    <ion-icon name="search-outline"></ion-icon>
                </button>
                <div id='search-box' hidden>
                    <form method="GET" action="/posts">
                        <input type="text" name="search" placeholder="Search" class="searchbar"
                            value="{{ request('search') }}">
                    </form>
                </div>
                @endif

            </div>
        </nav>
    </div>



    {{ $slot }}
    <footer>
        <div class="socials">
            <a href="#">
                <ion-icon name="logo-facebook"></ion-icon>
            </a>
            <a href="#">
                <ion-icon name="logo-instagram"></ion-icon>
            </a>
            <a href="#">
                <ion-icon name="logo-twitter"></ion-icon>
            </a>

        </div>
        <div class="footer-links">
            <a href="#">About</a>
            <a href="#">Contact</a>
        </div>
        <p>&copy 2022 Horror Scale </p>

    </footer>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
</body>
