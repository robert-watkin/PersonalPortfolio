@extends('layouts.main')

@section('content')
<div class="px-4">
    <section class="max-w-6xl mx-auto">
        <div class="my-24">
            <div class="flex flex-col space-y-4">
                <h1 class="text-4xl my-auto font-bold text-text text-center">{{ __('Reset Password') }}</h1>

                <form method="POST" action="{{ route('password.email') }}" class="w-full max-w-sm mx-auto">
                    @csrf

                    <div class="flex flex-col mb-4">
                        <label for="email" class="text-text">{{ __('Email Address') }}</label>

                        <input id="email" type="email"
                            class="w-full px-3 py-2 border @error('email') border-red-500 @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        @if (session('status'))
                        <div class="alert alert-success ">
                            <p class="text-text">
                                {{ session('status') }}
                            </p>
                        </div>
                        @endif
                    </div>

                    <div class="flex justify-between items-center">
                        <button type="submit"
                            class="bg-primary-button text-text px-4 py-2 rounded-md text-sm font-medium">
                            {{ __('Send Password Reset Link') }}
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