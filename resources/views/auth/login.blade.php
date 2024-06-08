@extends('layouts.app')

@section('content')
    <div class="position-relative" style="height: 100vh;">
        <div class="position-absolute top-50 start-50 translate-middle">
            <div class="container">
                <div class="row-col-auto align-items-center">
                    <div class="card" style="width: fit-content; height: fit-content;">
                        <form action="{{ route('authenticate') }}" method="post">
                            @csrf
                            <div class="row-cols-auto">
                                <h3 class="card-header text-center">System Name</h3>
                            </div>
                            <div class="row-cols-auto">
                                <img src="https://picsum.photos/400/300" alt="" class="img-fluid p-5">
                            </div>
                            <div class="row-cols-auto">
                                <div class="input-group px-5 pb-2">
                                    <span class="input-group-text" id="email">Email</span>
                                    <input class="form-control" type="text" id="email" name="email"
                                        value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="px-5">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="row-cols-auto">
                                <div class="input-group px-5 pb-1">
                                    <span class="input-group-text" id="password">Password</span>
                                    <input class="form-control" type="password" id="password" name="password">
                                </div>
                            </div>
                            {{-- <div class="row-cols-auto">
                            <div class="form-check px-5 pb-3">
                                <input type="checkbox" class="rmbPwd" id="rmbPwd" value="true">
                                <label class="form-check-label" for="rmbPwd">Remember Me</label>
                            </div>
                        </div> --}}
                            <div class="row-cols-auto">
                                <div class="px-5 pb-5 text-end">
                                    {{-- <a class="p-1 text-light" href="#">Forgot your password?</a> --}}
                                    <button class="btn btn-light" type="submit">Log In</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
