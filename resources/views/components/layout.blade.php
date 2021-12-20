<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>


<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="flex md:justify-between md:items-center">
            <div class="fixed top-0 left-0 px-6 sm:block">
                <a href="/">
                    <img src="/images/logo-black.png" alt="Horror Scale Logo" width="165" height="16">
                </a>
                <div class="hidden fixed left-40 top-2 px-6 py-4 sm:flex">
                <a href="scores">Show by scores</a>
                <a href="/">Show all</a>
                </div>
            </div>

            @if (Route::has('login'))
            <div class="hidden fixed top-2 right-0 px-6 py-4 sm:flex">
                @auth
                    <a href="/create">Add a post</a>
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
                <form method="GET" action="/">
                <input type="text"
                       name="search"
                       placeholder="Search"
                       class="bg-blue-400 placeholder-black font-semibold text-sm"
                       value="{{ request('search') }}">
            </form>
            </div>
        @endif
    </nav>
</section>


    {{ $slot }}

</body>
