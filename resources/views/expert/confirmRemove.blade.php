@extends('layouts.navbar')

@section('contents')
    <slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Confirm Remove Expert') }}
        </h2>
    </slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p><strong>Name:</strong> {{ $expert->name }}</p>
                    <p>{{ __('Are you sure you want to remove this expert?') }}</p>
                    <br>
                    <form action="{{ route('expert.removeExpert', ['id' => $expert->expert_id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">{{ __('Remove') }}</button>
                    </form>
                    <br>
                    <a href="{{ route('expert.detailExpert', ['id' => $expert->expert_id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('Cancel') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection