<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('frontend.users.profile');

    }

    public function updateUserDetails(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string'],
            'phone' => ['required', 'digits_between:4,12'],
            'pin_code' => ['required', 'digits_between:4,8'],
            'address' => ['required', 'string','max:500']

        ]);

        $user = User::findOrFail(Auth::user()->id);
        $user->update([
            'name' => $request->username
        ]);

        $user->userDetail()->updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'phone' => $request->phone,
                'pin_code' => $request->pin_code,
                'address' => $request->address,
            ]
        );

        return redirect()->back()->with('message', 'User profile updated successfully!');
    }

    public function passCreate()
    {

        return view('frontend.users.change_password');

    }

    public function changePass(Request $request)
    {
        $request->validate([
            'current_password' => ['required','string','min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $currentPasswordStatus = Hash::check($request->current_password, auth()->user()->password);
        if($currentPasswordStatus){

            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->back()->with('message','Password updated successfully!');

        }else{

            return redirect()->back()->with('message2','Current password does not match with old Password!');
        }

    }
}
