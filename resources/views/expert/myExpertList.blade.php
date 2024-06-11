@extends('layouts.navbar')

@section('contents') 

    <slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Expert List') }}
        </h2>
    </slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>Total Experts Inserted: {{ $totalExperts }}</p>
                    <p>Total Publications: {{ $totalPublications }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('expert.newExpert') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('Add New') }}</a>
                    <table id="expertTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Domain</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($expert as $expert)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $expert->name }}</td>
                                <td class="text-center">
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
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('expert.detailExpert', ['id' => $expert->expert_id]) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">View</a>
                                    <a href="{{ route('expert.confirmRemove', ['id' => $expert->expert_id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('Remove') }}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
