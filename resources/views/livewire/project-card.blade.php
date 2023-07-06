<div class="flex flex-col justify-between my-2 py-4 px-6 bg-secondary-button text-text rounded">
    <p class="font-bold text-xl text-text">{{ $project->title }}</p>

    <p class="my-4 text-text line-clamp-5 md:line-clamp-3">{{ $project->short_description }}</p>
    

    <p class=" text-accent text-xs font-bold">
        @php $first = true @endphp
        @foreach(explode(',', $project->technologies) as $technology)
        @if(!$first) • @endif {{$technology}}
        @if($first) @php $first = false @endphp @endif
        @endforeach 
    </p>

    <div class="flex flex-row justify-between">
        <a href="{{ route('projects.show', $project->id) }}"
            class="bg-primary-button text-text px-4 py-2 mt-2  rounded-md text-sm font-medium">View</a>
    </div>
</div>