@extends('layouts.main')

@section('title', "Robert Watkin's Portfolio")

@section('content')
<div class="px-4">
    <section class="max-w-6xl mx-auto">
        <div class="my-24">
            <div class="flex flex-col space-y-4">
                <h1 class="text-4xl my-auto font-bold text-text text-center">{{ __('Contact Me') }}</h1>

                <form method="POST" action="{{ route('contact.send') }}" class="w-full mx-auto">
                    @csrf

                    <div class="flex flex-col mb-4">
                        <label for="name" class="text-text">{{ __('Name') }}</label>
                        <input id="name" type="text"
                            class="w-full px-3 py-2 border @error('name') border-red-500 @enderror" name="name" required
                            autofocus>
                        @error('name')
                        <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="flex flex-col mb-4">
                        <label for="email" class="text-text">{{ __('Email') }}</label>
                        <input id="email" type="email"
                            class="w-full px-3 py-2 border @error('email') border-red-500 @enderror" name="email"
                            required autofocus>
                        @error('email')
                        <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="flex flex-col mb-4">
                        <label for="message" class="text-text">{{ __('Message') }}</label>
                        <textarea id="message"
                            class="w-full px-3 py-2 border @error('message') border-red-500 @enderror" name="message"
                            required></textarea>
                        @error('message')
                        <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="flex justify-between items-center">
                        <button type="submit"
                            class="bg-primary-button text-text px-4 py-2 rounded-md text-sm font-medium">
                            {{ __('Submit') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
        {{-- A section saying alternatively you can contact me via linkediin --}}
        <div class="flex flex-col space-y-4">
            <h1 class="text-4xl my-auto font-bold text-text text-center">{{ __('Alternatively') }}</h1>
            <div class="flex flex-col space-y-4">
                <p class="text-text text-center">You can contact me via LinkedIn</p>
                <div class="flex justify-center">
                    <a href="https://www.linkedin.com/in/robert-watkin-8bb61515a/" target="_blank"
                        rel="noopener noreferrer">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            class="h-6 w-6 fill-current text-text hover:text-accent transition-colors duration-200">
                            <path
                                d="M22.225 0H1.77C.79 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.77 24h20.452C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0zM7.356 20.271H3.67V9h3.686v11.271zM5.514 7.858a2.12 2.12 0 01-2.122-2.125 2.12 2.12 0 012.122-2.122 2.12 2.12 0 012.118 2.122 2.12 2.12 0 01-2.118 2.125zm15.758 12.413h-3.69v-5.569c0-1.324-.026-3.025-1.852-3.025-1.852 0-2.134 1.441-2.134 2.932v5.662H9.905V9h3.56v1.539h.05c.495-.936 1.7-1.924 3.512-1.924 3.756 0 4.45 2.47 4.45 5.682v6.974z" />
                        </svg>
                    </a>
                </div>
            </div>

    </section>
</div>

@stop