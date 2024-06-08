<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Platinum;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'photo' => ['image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:8192', 'required'],
            'name' => ['required', 'string', 'max:255'],
            'ic' => ['required', 'string', 'digits:12', 'unique:users'],
            'gender' => ['required', 'string'],
            'religion' => ['required', 'string'],
            'race' => ['required', 'string'],
            'address' => ['required', 'string'],
            'postcode' => ['required', 'string', 'digits:5'],
            'city' => ['required', 'string'],
            'state' => ['required', 'string'],
            'phoneNo' => ['required', 'string', 'digits_between:10,11', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'educationLevel' => ['required', 'string'],
            'educationField' => ['required', 'string'],
            'educationInstitute' => ['required', 'string'],
            'package' => ['required', 'string']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $request, User $currentUser)
    {
        $formFields = $request->all();
        $formFields['password'] = Hash::make($request['ic']);
        $formFields['role'] = 'platinum';
        $formFields['age'] = $this->getAgeFromIc($request['ic']);
        $formFields['dob'] = $this->getDobFromIc($request['ic']);

        if ($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('photo', 'public');
        }

        $newUser = User::create($formFields);
        
        $formFields['staff_id'] = $currentUser->staff->id;

        $platinum = $newUser->platinum()->create($formFields);

        if ($request['crmp'] != null){
            $crmp_id = User::where('id', $request['crmp'])->first()->platinum->crmp->id;
            $platinum->supervision()->create(['crmp_id' => $crmp_id]);
        }

        return $newUser;
    }

    protected function getAgeFromIc(String $ic)
    {
        // Extract the first two characters of the IC, which represent the birth year
        $birthYear = substr($ic, 0, 2);

        // Append the birth year to the base century
        // If the birth year is less than or equal to the current year's last two digits, assume it's 20XX
        // Otherwise, assume it's 19XX
        $currentYearLastTwoDigits = date('y');
        $birthYearFull = ($birthYear <= $currentYearLastTwoDigits) ? '20' . $birthYear : '19' . $birthYear;

        // Calculate the age based on the current year
        $age = date('Y') - $birthYearFull;

        return $age;
    }

    protected function getDobFromIc(String $ic)
    {
        // Extract the first six characters of the IC, which represent the birth date
        $birthDate = substr($ic, 0, 6);

        // Split the birth date into year, month, and day
        $birthYear = substr($birthDate, 0, 2);
        $birthMonth = substr($birthDate, 2, 2);
        $birthDay = substr($birthDate, 4, 2);

        // Append the birth year to the base century
        // If the birth year is less than or equal to the current year's last two digits, assume it's 20XX
        // Otherwise, assume it's 19XX
        $currentYearLastTwoDigits = date('y');
        $birthYearFull = ($birthYear <= $currentYearLastTwoDigits) ? '20' . $birthYear : '19' . $birthYear;

        // Combine the full birth year, month, and day into a date
        $dob = $birthYearFull . '-' . $birthMonth . '-' . $birthDay;

        return $dob;
    }
}
