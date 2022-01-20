<x-layout>

    <header>
        <h1 class='heading'>Confirm password</h1>
    </header>

    <section>
        <div class='container'>


            <x-auth-card>
                <x-slot name="logo">
                    <a href="/">
                        <x-application-logo />
                    </a>
                </x-slot>

                <div class='heading-secondary'>
                    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                </div>


                <x-auth-validation-errors :errors="$errors" />

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <div>
                        <label for="password">Password</label>

                        <input id="password" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <div>
                        <button type='submit' class="submit-button">
                            {{ __('Confirm') }}
                        </button>
                    </div>
                </form>
            </x-auth-card>
        </div>
    </section>
</x-layout>
