<x-layout>

    <header>
        <h1 class='heading'>Email verification</h1>
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
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                <div class='heading-secondary'>
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
                @endif

                <div>
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div>
                            <button type="submit" class='submit-button'>
                                {{ __('Resend Verification Email') }}
                            </button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class='submit-button'>
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </x-auth-card>

        </div>
    </section>
</x-layout>
