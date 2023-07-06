@extends('layouts.main')

@section('title', "Projects")

@section('content')
<div class="px-4">
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="mt-10">
            <h2 class="text-2xl font-bold mb-4 text-text">Projects</h2>
            <div class="grid grid-cols-1 gap-2">
                @foreach($projects as $project)
                <livewire:project-card :project="$project" :key="$project->id" />
                @endforeach
            </div>
        </div>

    </section>
</div>
@stop