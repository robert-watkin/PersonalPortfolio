@extends('layouts.main')

@section('content')
<div class="px-4">
    <section class="max-w-6xl mx-auto">
        <div class="my-24">
            <div class="flex flex-col space-y-4">
                <h1 class="text-4xl my-auto font-bold text-text text-center">{{ __('Reset Password') }}</h1>

                <form method="POST" action="{{ route('password.update') }}" class="w-full max-w-sm mx-auto">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="flex flex-col mb-4">
                        <label for="email" class="text-text">{{ __('Email Address') }}</label>

                        <input id="email" type="email"
                               class="w-full px-3 py-2 border @error('email') border-red-500 @enderror" name="email"
                               value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="flex flex-col mb-4">
                        <label for="password" class="text-text">{{ __('Password') }}</label>

                        <input id="password" type="password"
                               class="w-full px-3 py-2 border @error('password') border-red-500 @enderror" name="password"
                               required autocomplete="new-password">

                        @error('password')
                        <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="flex flex-col mb-4">
                        <label for="password-confirm" class="text-text">{{ __('Confirm Password') }}</label>

                        <input id="password-confirm" type="password"
                               class="w-full px-3 py-2 border" name="password_confirmation"
                               required autocomplete="new-password">
                    </div>

                    <div class="flex justify-between items-center">
                        <button type="submit"
                                class="bg-primary-button text-text px-4 py-2 rounded-md text-sm font-medium  cursor-pointer hover:scale-110">
                            {{ __('Reset Password') }}
                        </button>

                        @if (Route::has('login'))
                        <a class="text-accent text-sm font-medium" href="{{ route('login') }}">
                            {{ __('Back to Login') }}
                        </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
