@extends('layouts.navbar')

@section('contents')
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Name</th>
                    <th scope="col" class="text-center">CRMP Status</th>
                    <th scope="col" class="text-center">Operation</th>
                </tr>
            </thead>
            <tbody>
                {{-- the $users here represents both user and crmp users --}}
                @foreach ($users as $user)
                    <tr>
                        <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                        <td class="text-center">{{ $user->name }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="{{ $user->id }}"
                                        {{ $user->role == 'crmp' ? 'checked' : '' }} 
                                        @foreach ($supervisions as $supervision)
                                            {{ optional($user->platinum->crmp)->id == $supervision->crmp_id ? 'disabled' : '' }}
                                        @endforeach
                                    >
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center">
                                <div class="row">
                                    <div class="col-auto"><a href="{{ route('staff.index', $user->id) }}" class="btn btn-info">View</a></div>
                                    <div class="col-auto">
                                        <form action="{{ route('staff.delete', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>    
                                </div>
                            </div>                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        document.querySelectorAll('.form-check-input').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                var userId = this.id;
                var newRole = this.checked ? 'crmp' : 'platinum';
    
                fetch('/change-role', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        user: userId,
                        role: newRole
                    })
                });
            });
        });
    </script>
@endsection
