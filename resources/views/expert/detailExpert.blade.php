@extends('layouts.navbar')

@section('contents')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center items-center h-screen">
        <div class="bg-gray dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
            <div class="text-center mb-6">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ __('Expert Detail') }}</h2>
                <br>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center items-center h-screen">
            <div class="bg-gray dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
                <div class="text-center mb-6">
                    @if(isset($expert))
                        <p><strong>Name:</strong> {{ $expert->name }}</p>
                        <p><strong>Domain:</strong> 
                            @if($expert->domain === 'SE')
                                Software Engineering
                            @elseif($expert->domain === 'DS')
                                Data Science
                            @elseif($expert->domain === 'AI')
                                Artificial Intelligence
                            @elseif($expert->domain === 'WD')
                                Web Development
                            @else
                                {{ $expert->domain }} <!-- If none of the predefined values match -->
                            @endif
                        </p>
                        <p><strong>Email:</strong> {{ $expert->email }}</p>
                        <p><strong>Origin:</strong> 
                            @if($expert->origin === 'MAS')
                                Malaysia
                            @elseif($expert->origin === 'CHN')
                                China
                            @elseif($expert->origin === 'IND')
                                India
                            @elseif($expert->origin === 'USA')
                                United States
                            @else
                                {{ $expert->origin }} <!-- If none of the predefined values match -->
                            @endif
                        </p>
                        <div class="flex justify-center items-center">
                            @if(isset($expert) && auth()->id() === $expert->user_id)
                                <a href="{{ route('expert.updateExpert', ['id' => $expert->expert_id]) }}" class="btn btn-custom-search rounded-r-md text-black bg-white px-8">{{ __('Update') }}</a>
                            @endif
                            
                            @if(auth()->id() === $expert->user_id)
                                <a href="{{ route('expert.myExpertList') }}" class="btn btn-custom-search rounded-r-md text-black bg-white px-8">{{ __('Back to List') }}</a>
                            @else
                                <a href="{{ route('expert.expertList') }}" class="btn btn-custom-search rounded-r-md text-black bg-white px-8">{{ __('Back to List') }}</a>
                            @endif
                        </div>

                        <br>
                        <br>
                        <div class="flex justify-between items-center">
                            <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200 mt-6"><strong>{{ $expert->name }}'s Publications</strong></h3>
                            @if(isset($expert) && auth()->id() === $expert->user_id)
                                <a href="{{ route('expert.publication.addPublication', ['id' => $expert->expert_id]) }}" class="btn btn-custom-search rounded-r-md text-black bg-white px-8">{{ __('Add Publication') }}</a>
                            @endif
                        </div>
                        <br>

                        @if($expert->publications && $expert->publications->count() > 0)
                            <div class="mt-4 overflow-x-auto">
                                <table class="min-w-full bg-gray dark:bg-gray-800 mx-auto">
                                    <thead>
                                        <tr>
                                            <th class="text-center py-2 px-4 border-b border-gray-200 dark:border-gray-700">Title</th>
                                            <th class="text-center py-2 px-4 border-b border-gray-200 dark:border-gray-700">Year</th>
                                            <th class="text-center py-2 px-4 border-b border-gray-200 dark:border-gray-700">Type</th>
                                            <th class="text-center py-2 px-4 border-b border-gray-200 dark:border-gray-700">File</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($expert->publications as $publication)
                                            @if($publication->owner_id === $expert->expert_id && $publication->owner_type === 'Expert')
                                                <tr>
                                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700 text-center">{{ $publication->title }}</td>
                                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700 text-center">{{ $publication->year }}</td>
                                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700 text-center">{{ $publication->type }}</td>
                                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700 text-center">
                                                        <a href="{{ route('expert.publication.viewPublication', ['id' => $publication->id]) }}" class="btn btn-custom-search rounded-r-md text-black bg-white px-8">View</a>
                                                        @if(isset($expert) && auth()->id() === $expert->user_id)
                                                            <a href="{{ route('expert.publication.confirmDelete', ['id' => $publication->id]) }}" class="btn btn-custom-search rounded-r-md text-black bg-white px-8">{{ __('Remove') }}</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="py-2 px-4 border-b border-gray-200 dark:border-gray-700 text-center">{{ __('No publications found.') }}</p>
                        @endif
                    @else
                        <p>{{ __('Expert not found.') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
