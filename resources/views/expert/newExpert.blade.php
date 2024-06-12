@extends('layouts.navbar')

@section('contents')
    <slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New Expert') }}
        </h2>
    </slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if ($errors->any())
                        <div class="mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-red-600">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('expert.createExpert') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block font-medium text-sm text-white">{{ __('Name') }}</label>
                            <input id="name" class="block mt-1 w-full text-white" type="text" name="name" value="{{ old('name') }}" required autofocus />
                        </div>
                        <div class="mb-4">
                            <label for="domain" class="block font-medium text-sm text-white">{{ __('Domain') }}</label>
                            <select id="domain" name="domain" class="block mt-1 w-full text-white" required>
                                <option value="">Select a domain</option>
                                <option value="Software Engineering">Software Engineering</option>
                                <option value="Data Science">Data Science</option>
                                <option value="Artificial Intelligence">Artificial Intelligence</option>
                                <option value="Web Development">Web Development</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block font-medium text-sm text-white">{{ __('Email') }}</label>
                            <input id="email" class="block mt-1 w-full text-white" type="email" name="email" value="{{ old('email') }}" required autofocus />
                        </div>
                        <div class="mb-4">
                            <label for="origin" class="block font-medium text-sm text-white">{{ __('Origin') }}</label>
                            <select id="origin" name="origin" class="block mt-1 w-full text-white" required>
                                <option value="">Select an origin</option>
                                <option value="MAS">Malaysia</option>
                                <option value="CHN">China</option>
                                <option value="IND">India</option>
                                <option value="USA">United States</option>
                            </select>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('Save') }}</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection