@extends('layouts.main')

@section('title', "Projects")

@section('content')
<div class="px-4">
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="mt-10">
            <h2 class="text-2xl font-bold mb-4 text-text">Projects</h2>
            <div class="grid grid-cols-1 gap-2">
                @foreach($projects as $project)
                <div class="flex flex-col h-56 justify-between py-4 px-6 bg-secondary-button text-text rounded">
                    <div>
                        <p class="font-bold text-xl text-text">{{ $project->title }}</p>

                        <p class="my-4 text-text line-clamp-3">{{ $project->short_description }}</p>
                    </div>

                    <div class="flex flex-row justify-between">
                        <a href="{{ route('projects.show', $project->id) }}"
                            class="bg-primary-button text-text px-4 py-2 mt-2  rounded-md text-sm font-medium">View</a>

                        <ul class="flex flex-row space-x-2">
                            @foreach(explode(',', $project->technologies) as $technology)
                            <li class="bg-accent rounded-full px-2 py-1 my-auto w-auto text-sm text-text">
                                {{$technology}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </section>
</div>
@stop