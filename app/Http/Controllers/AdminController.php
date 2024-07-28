<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function adminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function changePassword()
    {
        return view('admin.change_password');
    } // end method

    public function updatePassword(Request $request)
    {
        // validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        // match the old password
        if (!hash::check($request->old_password, auth::user()->password)) {
            toastr()->error('Sorry, Old Password went wrong.');
            return back();
        }

        // Update the New Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        toastr()->success('Password Changed Successfully.');

        return back();
    } // end method
}
