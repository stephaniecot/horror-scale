<!doctype html>

<title>Horror Scale</title>
<link rel="stylesheet" href="/app.css">

<meta content="width=device-width, initial-scale=1" name="viewport" />

{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}
<link rel="preconnect" href="https://fonts.gstatic.com">
<script src="//unpkg.com/alpinejs" defer></script>

<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">



<body>
    <div class='wrapper' id='wrapper'>
        <nav>
            <div id='nav' class="mobile-nav">
                <div class='logo-box'>
                    <a id='logo' href="/">
                        <img src="/images/logo-white.png" alt="Horror Scale Logo" class='logo-white'>
                    </a>
                </div>
                <div class='menu-box'>
                    <div>
                    <button id='menu-icon'>
                        <ion-icon name="menu-outline"></ion-icon>
                    </button>
                    </div>

                    <div id='nav-link'>
                        <ul>
                        <li><button id='close-icon' hidden>
                            <ion-icon name="close-circle-outline"></ion-icon>
                        </button></li>
                        <li id='hidden-logo'>
                            <a href="/"><img src="/images/logo-white.png" alt="Horror Scale Logo" class='logo-white'></a></li>
                    <li><a href="/posts">All Media</a></li>
                        <li><a href="/scores">Media by scores</a></li>

                        @if (Route::has('login'))

                        @auth
                        <li><a href="/create">Add a post</a></li>
                        <li><a href="{{ url('/favorites') }}">My Favorites</a></li>
                        @can('admin')
                        <li><a href="{{ url('/admin/posts') }}">Manage posts</a></li>
                        @endcan
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                           <li><a href="route('logout')" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Logout') }}
                            </a></li>
                        </form>


                        @else
                        <li><a href="{{ route('login') }}">Login</a></li>

                        @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">Register</a></li>
                        @endif
                        @endauth

                        @endif

                    </ul>
                    </div>
                </div>
                <div class='searchbar-box'>
                    <button id='search-icon'>
                        <ion-icon name="search-outline"></ion-icon>
                    </button>
                    <div id='search-box' hidden>
                        <form method="GET" action="/posts">
                            <input type="text" name="search" placeholder="Search" class="searchbar"
                                value="{{ request('search') }}">
                        </form>
                    </div>
                </div>
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
            <a href="/about">About</a>
            <a href="/contact">Contact</a>
        </div>
        <p>&copy 2022 Horror Scale </p>

    </footer>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
</body>
