@extends('layouts.navbar')

@section('contents') 

    <slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Publication') }}
        </h2>
    </slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <form action="{{ route('expert.publication.createPublication') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="expert_id" value="{{ $expert->expert_id }}">

                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-white">{{ __('Title') }}</label>
                        <input type="text" name="title" id="title" class="mt-1 block w-full text-white" required>
                    </div>

                    <div class="mb-4">
                        <label for="year" class="block text-sm font-medium text-white">{{ __('Year') }}</label>
                        <input type="number" name="year" id="year" class="mt-1 block w-full text-white" required>
                    </div>

                    <div class="mb-4">
                        <label for="type" class="block text-sm font-medium text-white">{{ __('Type') }}</label>
                        <input type="text" name="type" id="type" class="mt-1 block w-full text-white" required>
                    </div>

                    <div class="mb-4">
                        <label for="file" class="block text-sm font-medium text-white">{{ __('File') }}</label>
                        <input type="file" name="file" id="file" class="mt-1 block w-full text-white">
                    </div>

                    <div class="mb-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Add Publication') }}
                        </button>
                    </div>
                </form>
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                </div>
            </div>
        </div>
    </div>
@endsection
