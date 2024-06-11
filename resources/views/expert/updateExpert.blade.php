@extends('layouts.navbar')

@section('contents')
    <slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Expert') }}
        </h2>
    </slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(isset($expert))
                        <form method="POST" action="{{ route('expert.detailExpert', ['id' => $expert->expert_id]) }}">
                            <!-- tak save lagi -->
                            @csrf
                            @method('PUT')

                           <div class="mb-4">
                            <label for="name" class="block font-medium text-sm text-white">{{ __('Name') }}</label>
                            <input id="name" class="block mt-1 w-full text-white" type="text" name="name" value="{{ $expert->name }}" required autofocus />
                        </div>
                        <div class="mb-4">
                            <label for="domain" class="block font-medium text-sm text-white">{{ __('Domain') }}</label>
                            <select id="domain" name="domain" class="block mt-1 w-full text-white" required>
                                <option value="" disabled>Select Domain</option>
                                <option value="SE" {{ $expert->domain === 'SE' ? 'selected' : '' }}>Software Engineering</option>
                                <option value="DS" {{ $expert->domain === 'DS' ? 'selected' : '' }}>Data Science</option>
                                <option value="AI" {{ $expert->domain === 'AI' ? 'selected' : '' }}>Artificial Intelligence</option>
                                <option value="WD" {{ $expert->domain === 'WD' ? 'selected' : '' }}>Web Development</option>
                            </select>

                        </div>
                        <div class="mb-4">
                            <label for="email" class="block font-medium text-sm text-white">{{ __('Email') }}</label>
                            <input id="email" class="block mt-1 w-full text-white" type="email" name="email" value="{{ $expert->email }}" required autofocus />
                        </div>
                        <div class="mb-4">
                            <label for="origin" class="block font-medium text-sm text-white">{{ __('Origin') }}</label>
                            <select id="origin" name="origin" class="block mt-1 w-full text-white" required>
                                <option value="" disabled>Select Origin</option>
                                <option value="MAS" {{ $expert->origin === 'MAS' ? 'selected' : '' }}>Malaysia</option>
                                <option value="CHN" {{ $expert->origin === 'CHN' ? 'selected' : '' }}>China</option>
                                <option value="IND" {{ $expert->origin === 'IND' ? 'selected' : '' }}>India</option>
                                <option value="USA" {{ $expert->origin === 'USA' ? 'selected' : '' }}>United States</option>
                            </select>

                        </div>

                            <div class="flex items-center justify-end mt-4">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </form>
                    @else
                        <p>{{ __('Expert not found.') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection


