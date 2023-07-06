@extends('layouts.main')

@section('title', "Create Project")

@section('content')
<div class="px-4">
    <section class="max-w-6xl mx-auto">
        <div class="my-24">
            <div class="flex flex-col space-y-4">
                <h1 class="text-4xl my-auto font-bold text-text text-center">{{ __('Create Project') }}</h1>

                <form method="POST" action="{{ route('projects.store') }}" class="w-full mx-auto">
                    @csrf

                    <div class="flex flex-col mb-4">
                        <label for="title" class="text-text">{{ __('Title') }}</label>
                        <input id="title" type="text"
                            class="w-full px-3 py-2 border @error('title') border-red-500 @enderror" name="title"
                            value="{{ old('title') }}" required autofocus>
                        @error('title')
                        <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="flex flex-col mb-4">
                        <label for="short_description" class="text-text">{{ __('Short Description') }}</label>
                        <textarea id="short_description"
                            class="w-full px-3 py-2 border @error('short_description') border-red-500 @enderror"
                            name="short_description">{{ old('short_description') }}</textarea>
                        @error('short_description')
                        <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Description with CKEditor -->
                    <div class="flex flex-col mb-4">
                        <label for="description" class="text-text">{{ __('Description') }}</label>
                        <textarea id="description"
                            class="w-full px-3 py-2 border @error('description') border-red-500 @enderror"
                            name="description">{{ old('description') }}</textarea>
                        @error('description')
                        <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Technologies -->
                    <div class="flex flex-col mb-4">
                        <label for="technologies" class="text-text">{{ __('Technologies (comma seperated)') }}</label>
                        <input id="technologies" type="text"
                            class="w-full px-3 py-2 border @error('technologies') border-red-500 @enderror"
                            name="technologies" value="{{ old('technologies') }}" required autofocus>
                        @error('technologies')
                        <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- Github Link --}}
                    <div class="flex flex-col mb-4">
                        <label for="github" class="text-text">{{ __('Github Link') }}</label>
                        <input id="github" type="text"
                            class="w-full px-3 py-2 border @error('github') border-red-500 @enderror" name="github"
                            value="{{ old('github') }}" autofocus>
                        @error('github')
                        <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- Live Site Link --}}
                    <div class="flex flex-col mb-4">
                        <label for="live_site" class="text-text">{{ __('Live Site Link') }}</label>
                        <input id="live_site" type="text"
                            class="w-full px-3 py-2 border @error('live_site') border-red-500 @enderror"
                            name="live_site" value="{{ old('live_site') }}" autofocus>
                        @error('live_site')
                        <span class="text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="flex justify-between items-center">
                        <button type="submit"
                            class="bg-primary-button text-text px-4 py-2 rounded-md text-sm font-medium">
                            {{ __('Create Project') }}
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
    class MyUploadAdapter {
        // The constructor method.
        // ...
        constructor( loader ) {
            // The file loader instance to use during the upload. It sounds scary but do not
            // worry — the loader will be passed into the adapter later on in this guide.
            this.loader = loader;
        }

        // Starts the upload process.
        upload() {
            return this.loader.file
                .then( file => new Promise( ( resolve, reject ) => {
                    this._initRequest();
                    this._initListeners( resolve, reject, file );
                    this._sendRequest( file );
                } ) );
        }

        // Aborts the upload process.
        abort() {
            if ( this.xhr ) {
                this.xhr.abort();
            }
        }

        // More methods.
        // ...
        _initRequest() {
            const xhr = this.xhr = new XMLHttpRequest();

            // Note that your request may look different. It is up to you and your editor
            // integration to choose the right communication channel. This example uses
            // a POST request with JSON as a data structure but your configuration
            // could be different.
            xhr.open( 'POST', '{{ route('images.store') }}', true );
            xhr.setRequestHeader('x-csrf-token', '{{ csrf_token() }}');
            xhr.responseType = 'json';
        }

        // Initializes XMLHttpRequest listeners.
        _initListeners( resolve, reject, file ) {
            const xhr = this.xhr;
            const loader = this.loader;
            const genericErrorText = `Couldn't upload file: ${ file.name }.`;

            xhr.addEventListener( 'error', () => reject( genericErrorText ) );
            xhr.addEventListener( 'abort', () => reject() );
            xhr.addEventListener( 'load', () => {
                const response = xhr.response;

                // This example assumes the XHR server's "response" object will come with
                // an "error" which has its own "message" that can be passed to reject()
                // in the upload promise.
                //
                // Your integration may handle upload errors in a different way so make sure
                // it is done properly. The reject() function must be called when the upload fails.
                if ( !response || response.error ) {
                    return reject( response && response.error ? response.error.message : genericErrorText );
                }

                // If the upload is successful, resolve the upload promise with an object containing
                // at least the "default" URL, pointing to the image on the server.
                // This URL will be used to display the image in the content. Learn more in the
                // UploadAdapter#upload documentation.
                resolve( {
                    default: response.url
                } );
            });

            if ( xhr.upload ) {
            xhr.upload.addEventListener( 'progress', evt => {
                if ( evt.lengthComputable ) {
                    loader.uploadTotal = evt.total;
                    loader.uploaded = evt.loaded;
                }
            } );
        }
        }


        

        // Prepares the data and sends the request.
        _sendRequest( file ) {
            // Prepare the form data.
            const data = new FormData();

            data.append( 'upload', file );

            // Important note: This is the right place to implement security mechanisms
            // like authentication and CSRF protection. For instance, you can use
            // XMLHttpRequest.setRequestHeader() to set the request headers containing
            // the CSRF token generated earlier by your application.

            // Send the request.
            this.xhr.send( data );
        }
    }

    function SimpleUploadAdapterPlugin( editor ) {
        editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
            // Configure the URL to the upload script in your back-end here!
            return new MyUploadAdapter( loader );
        };
    }

    ClassicEditor
        .create( document.querySelector( '#description' ), {
            extraPlugins: [ SimpleUploadAdapterPlugin ],

            // The configuration of the Styles drop-down list.
            image: {
                styles: [
                    'alignLeft', 'alignCenter', 'alignRight'
                ]
            },

            // More configuration options.
            // ...
        })
        .catch( error => {
            console.error( error );
        } 
    );
</script>
@stop