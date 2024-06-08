<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Supervision;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    // show manage platinum and crmp list 
    public function manage()
    {
        return view('staff.manage', [
            // the $users here represents platinum and crmp instead of current authenticated user
            'users' => User::whereIn('role', ['platinum', 'crmp'])->get(),
            'supervisions' => Supervision::all()
        ]);
    }

    // show platinum and crmp profile
    public function index(User $user)
    {
        // the $user here represents platinum and crmp instead of current authenticated user
        return view('user.index', [
            'user' => $user,
            'authUser' => Auth::user()
        ]);
    }

    // show edit platinum and crmp form
    public function edit(User $user)
    {
        // the $user here represents platinum and crmp instead of current authenticated user
        return view('user.edit', [
            'user' => $user,
            'authUser' => Auth::user(),
            'crmps' => User::where('role', 'crmp')->get()
        ]);
    }

    // update platinum and crmp profile
    public function update(Request $request, User $user)
    {
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

        // additional when staff is updating platinum and crmp
        if (Auth::user()->role == 'staff') {
            $additionalRules = [
                'package' => ['required', 'string']
            ];
            $rules = array_merge($rules, $additionalRules);
        }

        $formFields = $request->validate($rules);

        if ($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('photo', 'public');
        }

        $user->update($formFields);

        $user->platinum->update($formFields);

        if ($user->role == 'platinum') {
            if ($request['crmp'] != null) {
                $crmp_id = User::where('id', $request['crmp'])->first()->platinum->crmp->id;
                if ($user->platinum->supervision != null) {
                    $user->platinum->supervision()->update(['crmp_id' => $crmp_id]);
                } else {
                    $user->platinum->supervision()->create(['crmp_id' => $crmp_id]);
                }
            }
        } 

        return redirect(route('staff.index', $user->id));
    }

    // for instant change in toggle switch
    public function changeRole(Request $request)
    {
        $user = User::find($request->input('user'));
        $user->role = $request->input('role');
        $user->save();

        if ($request->input('role') == 'platinum') {
            $user->platinum->crmp()->delete();
        } else if ($request->input('role') == 'crmp') {
            $user->platinum->crmp()->create();
            if ($user->platinum->supervision != null) {
                $user->platinum->supervision()->delete();
            }            
        } 
        return redirect(route('staff.manage'));
    }

    // delete platinum and crmp
    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('staff.manage'));
    }

    // list all user
    public function list()
    {
        return view('staff.list', [
            'users' => User::all()
        ]);
    }

    // generate report
    public function report()
    {
        $pdf = PDF::loadView('staff.report', [
            'users' => User::all(),
            'mentor' => User::where('role', 'mentor')->count(),
            'staff' => User::where('role', 'staff')->count(),
            'platinum' => User::where('role', 'platinum')->count(),
            'crmp' => User::where('role', 'crmp')->count()
        ]);
        return $pdf->download('report.pdf');
    }
}


