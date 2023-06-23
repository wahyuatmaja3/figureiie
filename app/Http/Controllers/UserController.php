<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function profile() {
        return view('user.profile', [
            'user' => auth()->user()
        ]);
    }

    public function changePass() {
        return view("user.changePass");
    }

    public function storeNewPass(Request $request) {
        $request->validate([
            'old_password' => ['required','string','min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $currentPasswordStatus = Hash::check($request->old_password, auth()->user()->password);
        if($currentPasswordStatus){

            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect('/user/profile')->with('pass-updated','Password Updated Successfully');

        }else{

            return redirect()->back()->with('message','Current Password does not match with Old Password');
        }
    }

    public function orderHistory() {
        return view('user.order-history', [
            'orders' => Auth::user()->orders
        ]);
    }
}
