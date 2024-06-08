@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row-cols-auto">
            <canvas id="myChart"></canvas>
        </div>
        <div class="row-cols-auto pt-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Role</th>
                        <th scope="col" class="text-center">Date of Birth</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- the $users here represents both user and crmp users --}}
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                            <td class="text-center">{{ $user->name }}</td>
                            <td class="text-center">{{ $user->role }}</td>
                            <td class="text-center">{{ $user->dob }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- <div class="row-cols-auto">
            <a href="{{ url('/report/pdf') }}" class="btn btn-primary">Export as PDF</a>
        </div> --}}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie', // Change this to the type of chart you want
            data: {
                labels: ['Mentor', 'Staff', 'CRMP', 'Platinum'],
                datasets: [{
                    label: '# of user',
                    data: [{{ $mentor }}, {{ $staff }}, {{ $crmp }},
                        {{ $platinum }}
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            }
        });
    </script>
@endsection
