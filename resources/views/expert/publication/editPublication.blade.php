@extends('layouts.navbar')

@section('contents') 

    <slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Publication') }}
        </h2>
    </slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('expert.publication.viewPublication', ['id' => $publication->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-white">{{ __('Title') }}</label>
                            <input type="text" name="title" id="title" value="{{ $publication->title }}" class="mt-1 block w-full text-white" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="year" class="block text-sm font-medium text-white">{{ __('Year') }}</label>
                            <input type="text" name="year" id="year" value="{{ $publication->year }}" class="mt-1 block w-full text-white" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="type" class="block text-sm font-medium text-white">{{ __('Type') }}</label>
                            <input type="text" name="type" id="type" value="{{ $publication->type }}" class="mt-1 block w-full text-white" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="file" class="block text-sm font-medium text-white">{{ __('File') }}</label>
                            @if($publication->file)
                                <a href="{{ asset('storage/' . $publication->file) }}" class="text-blue-500 hover:underline" target="_blank">{{ __('Current File') }}</a>
                            @endif
                            <input type="file" name="file" id="file" class="mt-1 block w-full text-white">
                        </div>
                        
                        <div class="mb-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Update Publication') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
