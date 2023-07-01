@extends('layouts.main')

@section('title', $project->title)

@section('content')
<div class="px-4">
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        {{-- if auth --}}
        @if(Auth::check())
        {{-- button to edit the project --}}
        <div class="flex justify-end">
            <a href="{{ route('projects.edit', $project->id) }}"
                class="bg-primary-button text-text px-4 py-2 mt-2  rounded-md text-sm font-medium">Edit</a>
        </div>
        {{-- button to delete the project --}}
        <div class="flex justify-end">
            <form method="POST" action="{{ route('projects.destroy', $project->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="bg-secondary-button text-text px-4 py-2 mt-2  rounded-md text-sm font-medium">Delete</button>
            </form>
        </div>
        @endif
        <div class="mt-10">
            <h2 class="text-2xl font-bold mb-4 text-text">{{ $project->title }}</h2>

            <p>{{ $project->short_description }}</p>

            <div class="flex flex-row space-x-4 my-4 py-2 h-14">
                @if($project->github != null && $project->github != "")
                <a href="{{ $project->github }}" target=”_blank”>
                    <img src="{{ asset('images/github-mark.png') }}" alt="Github"
                        class="w-10 h-10 my-auto hover:w-11 hover:h-11">
                </a>
                @endif

                @if($project->live_site != null && $project->live_site != "")
                <a href="{{ $project->live_site }}" target=”_blank”>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        class="w-10 h-10 my-auto stroke-[#24292f] hover:w-11 hover:h-11">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                    </svg>
                </a>
                @endif


                <ul class="flex flex-row space-x-2">
                    @foreach(explode(',', $project->technologies) as $technology)
                    <li class="bg-accent rounded-full px-2 py-1 my-auto w-auto text-sm text-text">
                        {{$technology}}</li>
                    @endforeach
                </ul>
            </div>

            <div>
                {!! $project->description !!}
            </div>

        </div>

    </section>
</div>
@stop