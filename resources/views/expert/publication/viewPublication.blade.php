
@extends('layouts.navbar')

@section('contents') 

    <slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Expert Publication Detail') }}
        </h2>
    </slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(isset($publication))
                        <p><strong>Title:</strong> {{ $publication->title }}</p>
                        <p><strong>Year:</strong> {{ $publication->year }}</p>
                        <p><strong>Type:</strong> {{ $publication->type }}</p>
                        <p><strong>File:</strong>
                        @if($publication->file)
                            <a href="{{ asset('storage/' . $publication->file) }}" class="text-blue-500 hover:underline" target="_blank">{{ __('View File') }}</a>
                        @else
                          {{ __('No file available') }}
                        @endif
                        </p>
                        
                        @if($publication->owner_type === 'Expert' && auth()->id() == $expert->user_id)
                            <br>
                                <a href="{{ route('expert.publication.editPublication', ['id' => $publication->id]) }}" class="btn btn-custom-search rounded-r-md text-black bg-white px-8">{{ __('Update') }}</a>
                            <br>
                        @endif
                        <br>
                        <a href="{{ route('expert.detailExpert', ['id' => $publication->owner_id]) }}" class="btn btn-custom-search rounded-r-md text-black bg-white px-8">
                            {{ __('Back to Expert Detail') }}
                        </a>
                        @else
                        <p>{{ __('Publication not found.') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection