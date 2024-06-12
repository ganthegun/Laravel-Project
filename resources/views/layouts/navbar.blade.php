@extends('layouts.app')

@section('content')
    <div id="app">
        <nav class="navbar navbar-expand bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('index') }}">
                    <img src="https://picsum.photos/50/50" alt="" class="image-fluid">
                </a>

                {{-- Not really sure how to make this line work --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @if ($user->role == 'staff')
                            <li class="nav-item dropdown">
                                <a href="{{ route('register') }}" class="nav-link">Register Platinum</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="{{ route('staff.manage') }}" class="nav-link">Manage Platinum</a>
                            </li>
                            {{-- <li class="nav-item dropdown">
                                <a href="" class="nav-link">Manage CRMP</a>
                            </li> --}}
                            <li class="nav-item dropdown">
                                <a href="{{ route('staff.list') }}" class="nav-link">View User</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="{{ route('staff.report') }}" class="nav-link">Generate Report</a>
                            </li>
                        @elseif ($user->role == 'mentor')
                            <li class="nav-item dropdown">
                                <a href="{{ route('staff.list') }}" class="nav-link">View User</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="{{ route('expert.expertList') }}"  class="nav-link">Data Expert</a>
                            </li>
                        @else
                        <li class="nav-item dropdown">
                            <a href="{{ route('platinum.list') }}" class="nav-link">View Platinum</a>
                        </li>
                        <!-- Add more user links here -->
                        <li class="nav-item dropdown">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Data Expert
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="{{ route('expert.expertList') }}">All Expert</a></li>
                                    <li><a class="dropdown-item" href="{{ route('expert.myExpertList') }}">My Expert</a></li>
                                    <li><a class="dropdown-item" href="{{ route('expert.newExpert') }}">New Expert</a></li>
                                </ul>
                            </li>
                        </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle px-5" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Account
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item">
                                    <a class="dropdown-item" href="{{ route('user.index') }}">Manage Profile</a>
                                </li>
                                <li class="dropdown-item">
                                    <a class="dropdown-item" href="{{ route('password.reset') }}">Reset Password</a>
                                </li>
                                <li class="dropdown-item">
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Log Out</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('contents')
        </main>
    </div>
@endsection
