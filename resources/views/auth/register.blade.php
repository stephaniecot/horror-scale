<x-layout>

    <header>
        <h1 class='heading'>Register</h1>
    </header>

<section>
    <div class='auth-container'>


    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo />
            </a>
        </x-slot>


        <x-auth-validation-errors :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf


            <div>
                <label for="username">Username</label>

                <input id="username"  type="text" name="username" value="{{old('username')}}" required autofocus />
            </div>


            <div>
                <label for="email">Email</label>

                <input id="email" type="email" name="email" value='{{old('email')}}' required autofocus />
            </div>


            <div>
                <label for="password">Password</label>

                <input id="password"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>


            <div>
                <label for="password_confirmation">Confirm Password </label>

                <input id="password_confirmation"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div>
                <a class="general-button" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <button type='submit' class="submit-button">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </x-auth-card>
</div>
</section>
</x-layout>
