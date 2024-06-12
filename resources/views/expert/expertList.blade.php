@extends('layouts.navbar')

@section('contents')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center items-center h-screen">
    <div class="bg-gray dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
        <div class="text-center mb-6">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ __('Expert List') }}</h2>
            <br>
            <form action="{{ route('searchExpert.search') }}" method="GET" class="mb-3">
                <div class="flex items-center">
                    <input type="text" name="search" class="form-input border-l-0 rounded-l-none rounded-r-md border-gray-300 block w-full text-white" placeholder="Search...">
                    <button type="submit" class="btn btn-custom-search rounded-l-none rounded-r-md text-black bg-white px-8">Search</button>
                    <a href="{{ route('expert.expertList') }}" class="btn btn-custom-search rounded-r-md text-black bg-white px-8">{{ __('Clear') }}</a>
                    <br>
                    <br>
                    <label class="mr-2 text-white">Search by:</label>
                    <label class="inline-flex items-center mr-4">
                        <input type="radio" name="search_by" value="name" class="form-radio text-white">
                        <span class="ml-2">Name</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="search_by" value="domain" class="form-radio text-white">
                        <span class="ml-2">Domain</span>
                    </label>
                </div>
            </form>

            
            <br>
        </div>
    </div>
</div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
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
                                        {{ $expert->domain }}
                                    @endif
                                </td>
                                <td class="text-center"><a href="{{ route('expert.detailExpert', ['id' => $expert->expert_id]) }}" class="btn btn-custom-search rounded-r-md text-black bg-white px-8">View</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
