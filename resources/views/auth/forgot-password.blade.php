<x-layout>

    <header>
        <h1 class='heading'>I forgot my password !</h1>
    </header>

    <section>
        <div class='container'>
            <x-auth-card>
                <x-slot name="logo">
                    <a href="/">
                        <x-application-logo />
                    </a>
                </x-slot>

                <div class="heading-secondary">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>


                <x-auth-session-status :status="session('status')" />


                <x-auth-validation-errors :errors="$errors" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf


                    <div>
                        <label for="email">Email</label>

                        <input id="email" type="email" name="email" value="{{old('email')}}" required autofocus />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type='submit' class="submit-button">
                            {{ __('Reset password') }}
                        </button>
                    </div>
                </form>
            </x-auth-card>
        </div>
    </section>
</x-layout>
