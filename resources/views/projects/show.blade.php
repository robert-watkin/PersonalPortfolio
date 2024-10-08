@extends('layouts.main')

@section('title', $project->title)

@section('content')
<div class="px-4 py-12">
    <section class="max-w-7xl bg-gradient-to-b from-base-100 to-background from-0% to-90% rounded-lg mx-auto px-4 sm:px-6 lg:px-8 py-12">
        {{-- if auth --}}
        @if(Auth::check())
        <div class="flex flex-row space-x-2 justify-end">
            <a href="{{ route('projects.edit', $project->id) }}"
                class="bg-primary text-primary-content px-4 py-2 mt-2  rounded-md text-sm font-medium cursor-pointer hover:scale-110 ">Edit</a>
            <form method="POST" action="{{ route('projects.destroy', $project->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="bg-secondary text-text px-4 py-2 mt-2  rounded-md text-sm font-medium cursor-pointer hover:scale-110">Delete</button>
            </form>
        </div>
        @endif
        <div>
            <h2 class="text-2xl font-bold mb-4 text-text">{{ $project->title }}</h2>

            <p class="text-text">{{ $project->short_description }}</p>

            <p class=" text-accent text-xs font-bold">
                @php $first = true @endphp
                @foreach(explode(',', $project->technologies) as $technology)
                @if(!$first) • @endif {{$technology}}
                @if($first) @php $first = false @endphp @endif
                @endforeach
            </p>

            <div class="flex flex-row space-x-4 my-4 py-2 h-14">
                @if($project->github != null && $project->github != "")
                <a href="{{ $project->github }}" target="_blank"
                    class="bg-primary text-primary-content px-4 py-2 mt-2 rounded-md text-sm font-medium flex items-center cursor-pointer hover:scale-110">
                    <svg class="w-4 h-4 mr-2 text-[#000000] hover:text-accent transition-colors duration-200"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4 mr-2">
                        <path
                            d="M12 2C6.477 2 2 6.477 2 12c0 4.418 2.865 8.166 6.839 9.489.5.092.682-.217.682-.482 0-.237-.009-.866-.014-1.7-2.782.602-3.369-1.34-3.369-1.34-.454-1.156-1.11-1.465-1.11-1.465-.908-.62.069-.608.069-.608 1.003.07 1.532 1.03 1.532 1.03.892 1.529 2.342 1.088 2.913.833.092-.646.35-1.086.637-1.335-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.03-2.682-.103-.253-.447-1.27.098-2.645 0 0 .84-.27 2.75 1.025A9.564 9.564 0 0112 7.07c.85.004 1.705.114 2.5.334 1.909-1.294 2.747-1.025 2.747-1.025.546 1.375.202 2.392.1 2.645.64.698 1.027 1.59 1.027 2.682 0 3.841-2.337 4.687-4.565 4.934.36.31.68.92.68 1.852 0 1.335-.012 2.415-.012 2.743 0 .268.18.578.688.48A10.025 10.025 0 0022 12C22 6.477 17.523 2 12 2z">
                        </path>
                    </svg>
                    Github
                </a>
                @endif

                @if($project->live_site != null && $project->live_site != "")
                <a href="{{ $project->live_site }}" target="_blank"
                    class="bg-primary text-primary-content px-4 py-2 mt-2 rounded-md text-sm font-medium flex items-center cursor-pointer hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-4 h-4 mr-2">
                        <path
                            d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                        <path
                            d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                    </svg>
                    Live Site
                </a>
                @endif






            </div>

            <div class="text-text">
                {!! $project->description !!}
            </div>

        </div>

    </section>
</div>
@stop
