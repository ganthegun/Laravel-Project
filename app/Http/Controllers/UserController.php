<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{   
    // show personal user profile
    public function index()
    {
        return view('user.index', ['user' => Auth::user()]);
    }

    // show edit form for personal user profile
    public function edit()
    {
        return view('user.edit', ['user' => Auth::user()]);
    }

    // update personal user profile
    // used by staff to update platinum and crmp profile
    public function update(Request $request)
    {
        // current authenticated user
        $user = Auth::user();

        $rules = [
            'photo' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:8192'],
            'name' => ['required', 'string', 'max:255'],
            'ic' => ['required', 'string', 'digits:12', Rule::unique('users')->ignore($user->id)],
            'gender' => ['required', 'string'],
            'religion' => ['required', 'string'],
            'race' => ['required', 'string'],
            'address' => ['required', 'string'],
            'postcode' => ['required', 'string', 'digits:5'],
            'city' => ['required', 'string'],
            'state' => ['required', 'string'],
            'phoneNo' => ['required', 'string', 'digits_between:10,11', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ];
        
        if (in_array($user->role, ['platinum', 'crmp'])) {
            $additionalRules = [
                'educationLevel' => ['required', 'string'],
                'educationField' => ['required', 'string'],
                'educationInstitute' => ['required', 'string']
            ];
            $rules = array_merge($rules, $additionalRules);
        }
        
        $formFields = $request->validate($rules);

        if ($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('photo', 'public');
        }

        $user->update($formFields);

        if ($user->role == 'platinum') {
            $user->platinum->update($formFields);
        } 
        
        return redirect(route('user.index', $user->id));
    }

}
