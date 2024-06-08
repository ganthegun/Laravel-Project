@extends('layouts.navbar')

@section('contents')
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Name</th>
                    <th scope="col" class="text-center">Role</th>
                    <th scope="col" class="text-center">Profile Details</th>
                </tr>
            </thead>
            <tbody>
                {{-- the $users here represents both user and crmp users --}}
                @foreach ($users as $user)
                    <tr>
                        <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                        <td class="text-center">{{ $user->name }}</td>
                        <td class="text-center">{{ $user->role }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center">
                                <div class="row">
                                    <div class="col-auto"><a href="{{ route('staff.index', $user->id) }}" class="btn btn-info">View</a></div>  
                                </div>
                            </div>                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
