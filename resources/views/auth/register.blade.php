@extends('layouts.navbar')

@section('contents')
    <div class="container">
        <form action="{{ route('create', $currentUser->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card m-5">
                <div class="row-cols-auto">
                    <h3 class="card-header text-center py-5">Platinum Registration</h3>
                </div>
                <div class="row-cols-auto p-5">
                    <h4 class="fw-semibold">Personal Information</h4>
                </div>
                <div class="row-cols-auto px-5 pb-5">
                    <label for="photo" class="form-label">Photo:</label>
                    <input class="form-control" type="file" id="photo" name="photo" value="{{ old('photo') }}">
                    <div>
                        @error('photo')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row-cols-auto px-5 pb-5">
                    <label for="name" class="form-label">Name:</label>
                    <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}">
                    <div>
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row-cols-auto px-5 pb-5">
                    <label for="ic" class="form-label">IC Number:</label>
                    <input class="form-control" type="text" id="ic" name="ic" value="{{ old('ic') }}">
                    <div>
                        @error('ic')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row px-5 pb-5">
                    <label for="gender" class="form-label">Gender:</label>
                    <div class="col-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male"
                                {{ old('gender') == 'male' ? 'checked' : '' }}>
                            <label class="form-check-label" for="male">
                                Male
                            </label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female"
                                {{ old('gender') == 'female' ? 'checked' : '' }}>
                            <label class="form-check-label" for="female">
                                Female
                            </label>
                        </div>
                    </div>
                    <div>
                        @error('gender')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row px-5 pb-5">
                    <label class="form-label">Religion:</label>
                    <div class="col-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="religion" id="islam" value="islam"
                                {{ old('religion') == 'islam' ? 'checked' : '' }}>
                            <label class="form-check-label" for="islam">
                                Islam
                            </label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="religion" id="christianity"
                                value="christianity" {{ old('religion') == 'christianity' ? 'checked' : '' }}>
                            <label class="form-check-label" for="christianity">
                                Christianity
                            </label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="religion" id="buddhism" value="buddhism"
                                {{ old('religion') == 'buddhism' ? 'checked' : '' }}>
                            <label class="form-check-label" for="buddhism">
                                Buddhism
                            </label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="religion" id="hinduism" value="hinduism"
                                {{ old('religion') == 'hinduism' ? 'checked' : '' }}>
                            <label class="form-check-label" for="hinduism">
                                Hinduism
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="religion" id="other-religion"
                                value="other" {{ old('religion') == 'other' ? 'checked' : '' }}>
                            <label class="form-check-label" for="other-religion">
                                Other
                            </label>
                        </div>
                    </div>
                    <div>
                        @error('religion')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row px-5 pb-5">
                    <label class="form-label">Race:</label>
                    <div class="col-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="race" id="malay" value="malay"
                                {{ old('race') == 'malay' ? 'checked' : '' }}>
                            <label class="form-check-label" for="malay">
                                Malay
                            </label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="race" id="chinese"
                                value="chinese" {{ old('race') == 'chinese' ? 'checked' : '' }}>
                            <label class="form-check-label" for="chinese">
                                Chinese
                            </label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="race" id="indian" value="indian"
                                {{ old('race') ? 'checked' : '' }}>
                            <label class="form-check-label" for="indian">
                                Indian
                            </label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="race" id="other-race"
                                value="other" {{ old('race') == 'other' ? 'checked' : '' }}>
                            <label class="form-check-label" for="other-race">
                                Other
                            </label>
                        </div>
                    </div>
                    <div>
                        @error('race')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- <div class="row-cols-auto px-5 pb-5">
                                    <label class="form-label" for="citizenship">Citizenship:</label>
                                    <select class="form-select" id="citizenship" name="citizenship">
                                        <option selected></option>
                                        <option value="malaysia">Malaysia</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div> -->

                <div class="row-cols-auto p-5">
                    <h4 class="fw-semibold">Address Information</h4>
                </div>
                <div class="row-cols-auto px-5 pb-5">
                    <label for="address" class="form-label">Address:</label>
                    <input class="form-control" type="text" id="address" name="address"
                        value="{{ old('address') }}">
                    <div>
                        @error('address')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row px-5 pb-5">
                    <div class="col-4">
                        <label for="postcode" class="form-label">Postcode:</label>
                        <input class="form-control" type="text" id="postcode" name="postcode"
                            value="{{ old('postcode') }}">
                        <div>
                            @error('postcode')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="city" class="form-label">City:</label>
                        <input class="form-control" type="text" id="city" name="city"
                            value="{{ old('city') }}">
                        <div>
                            @error('city')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="state" class="form-label">State:</label>
                        <input class="form-control" type="text" id="state" name="state"
                            value="{{ old('state') }}">
                        <div>
                            @error('state')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- <div class="row px-5 pb-5">
                                <div class="col-6">
                                    <label for="state" class="form-label">State:</label>
                                    <input class="form-control" type="text" id="state" name="state">
                                </div>
                                <div class="col-6">
                                    <label for="country" class="form-label">country:</label>
                                    <input class="form-control" type="text" id="country" name="country">
                                </div>
                            </div> -->
                <div class="row-cols-auto px-5 pb-5">
                    <label for="phoneNo" class="form-label">Phone Number:</label>
                    <input class="form-control" type="text" id="phoneNo" name="phoneNo"
                        value="{{ old('phoneNo') }}">
                    <div>
                        @error('phoneNo')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row-cols-auto px-5 pb-5">
                    <label for="email" class="form-label">E-mail:</label>
                    <input class="form-control" type="text" id="email" name="email"
                        value="{{ old('email') }}">
                    <div>
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row-cols-auto p-5">
                    <h4 class="fw-semibold">Education Information:</h4>
                </div>
                <div class="row-cols-auto px-5 pb-5">
                    <label for="educationLevel" class="form-label">Current Education Level:</label>
                    <input class="form-control" type="text" id="educationLevel" name="educationLevel"
                        value="{{ old('educationLevel') }}">
                    <div>
                        @error('educationLevel')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row-cols-auto px-5 pb-5">
                    <label for="educationField" class="form-label">Education Field:</label>
                    <input class="form-control" type="text" id="educationField" name="educationField"
                        value="{{ old('educationField') }}">
                    <div>
                        @error('educationField')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row-cols-auto px-5 pb-5">
                    <label for="educationInstitute" class="form-label">Education Institute:</label>
                    <input class="form-control" type="text" id="educationInstitute" name="educationInstitute"
                        value="{{ old('educationInstitute') }}">
                    <div>
                        @error('educationInstitute')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row-cols-auto p-5">
                    <h4 class="fw-semibold">Program Information:</h4>
                </div>
                <div class="row px-5 pb-5">
                    <label class="form-label">Package:</label>
                    <div class="col-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="package" id="professorship"
                                value="professorship" {{ old('package') == 'professorship' ? 'checked' : '' }}>
                            <label class="form-check-label" for="professorship">
                                Platinum Professorship
                            </label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="package" id="premier"
                                value="premier" {{ old('package') == 'premier' ? 'checked' : '' }}>
                            <label class="form-check-label" for="premier">
                                Platinum Premier
                            </label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="package" id="elite" value="elite"
                                {{ old('package') == 'elite' ? 'checked' : '' }}>
                            <label class="form-check-label" for="elite">
                                Platinum Elite
                            </label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="package" id="drjr" value="drjr"
                                {{ old('package') == 'drjr' ? 'checked' : '' }}>
                            <label class="form-check-label" for="drjr">
                                Platinum Dr. Jr.
                            </label>
                        </div>
                    </div>
                    <div>
                        @error('package')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row-cols-auto px-5 pb-5">
                    <label class="form-label">Assign CRMP:</label>
                    <select class="form-select" aria-label="Default select example" name="crmp">
                        <option selected></option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('crmp') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}</option>
                        @endforeach
                    </select>
                    <div>
                        @error('crmp')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row-cols-auto px-5 pb-5 d-flex justify-content-end">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
