@extends('layouts.main')

@section('title', "Edit Project")

@section('content')
<div class="px-4">
    <section class="max-w-6xl mx-auto">
        <div class="my-24">
            <div class="flex flex-col space-y-4">
                <h1 class="text-4xl my-auto font-bold text-text text-center">{{ __('Edit Project') }}</h1>

                <form method="POST" action="{{ route('projects.update', $project->id) }}" class="w-full mx-auto">
                    @csrf
                    @method('PUT')

                    <div class="flex flex-col mb-4">
                        <label for="title" class="text-text">{{ __('Title') }}</label>
                        <input id="title" type="text" class="w-full px-3 py-2 border @error('title') border-red-500 @enderror" name="title" value="{{ $project->title }}" required autofocus>
                        @error('title')
                        <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="flex flex-col mb-4">
                        <label for="short_description" class="text-text">{{ __('Short Description') }}</label>
                        <textarea id="short_description" class="w-full px-3 py-2 border @error('short_description') border-red-500 @enderror" name="short_description">{{ $project->short_description }}</textarea>
                        @error('short_description')
                        <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Description with CKEditor -->
                    <div class="flex flex-col mb-4">
                        <label for="description" class="text-text">{{ __('Description') }}</label>
                        <textarea id="description" class="w-full px-3 py-2 border @error('description') border-red-500 @enderror" name="description">{{ $project->description }}</textarea>
                        @error('description')
                        <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Technologies -->
                    <div class="flex flex-col mb-4">
                        <label for="technologies" class="text-text">{{ __('Technologies (comma seperated)') }}</label>
                        <input id="technologies" type="text" class="w-full px-3 py-2 border @error('technologies') border-red-500 @enderror" name="technologies" value="{{ $project->technologies }}" required autofocus>
                        @error('technologies')
                        <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- Github Link --}}
                    <div class="flex flex-col mb-4">
                        <label for="github" class="text-text">{{ __('Github Link') }}</label>
                        <input id="github" type="text" class="w-full px-3 py-2 border @error('github') border-red-500 @enderror" name="github" value="{{ $project->github }}"  autofocus>
                        @error('github')
                        <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    
                    {{-- Live Site Link --}}
                    <div class="flex flex-col mb-4">
                        <label for="live_site" class="text-text">{{ __('Live Site Link') }}</label>
                        <input id="live_site" type="text" class="w-full px-3 py-2 border @error('live_site') border-red-500 @enderror" name="live_site" value="{{ $project->live_site }}"  autofocus>
                        @error('live_site')
                        <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="flex justify-between items-center">
                        <button type="submit" class="bg-primary-button text-text px-4 py-2 rounded-md text-sm font-medium">
                            {{ __('Update Project') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@stop

@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@stop
