<x-layout>

    <header>
        <h1 class='heading'>Reset my password</h1>
    </header>

<section>
    <div class='auth-container'>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo/>
            </a>
        </x-slot>


        <x-auth-validation-errors :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf


            <input type="hidden" name="token" value="{{ $request->route('token') }}">


            <div>
                <label for="email"> Email </label>

                <input id="email" type="email" name="email" value="{{old('email', $request->email)}}" required autofocus />
            </div>


            <div>
                <label for="password">Password</label>

                <input id="password"
                                type="password"
                                name="password"
                                 />
            </div>

            <div>
                <label for="password_confirmation">Confirm Password </label>

                <input id="password_confirmation"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div>
                <button type='submit' class='submit-button'>
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </x-auth-card>

    </div>
    </section>
</x-layout>
