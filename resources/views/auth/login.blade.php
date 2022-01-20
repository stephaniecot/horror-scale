<x-layout>
    <header>
        <h1 class='heading'>Login</h1>
    </header>
    <section>

        <div class='container'>


            <x-auth-card>
                <x-slot name="logo">
                    <a href="/">
                        <x-application-logo />
                    </a>
                </x-slot>


                <x-auth-session-status :status="session('status')" />


                <x-auth-validation-errors :errors="$errors" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <label for="email">Email</label>

                        <input id="email" type="email" name="email" value='{{old('email')}}' required autofocus />
                    </div>


                    <div>
                        <label for="password">Password</label>

                        <input id="password" type="password" name="password" required autocomplete="current-password" />
                    </div>


                    <div>
                        <label for="remember_me">
                            <input id="remember_me" type="checkbox" name="remember">
                            <span>{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div>
                        @if (Route::has('password.request'))
                        <a class='general-button' href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                        @endif

                        <button type='submit' class="submit-button">
                            {{ __('Login') }}
                        </button>
                    </div>
                </form>
            </x-auth-card>

        </div>
    </section>

</x-layout>
