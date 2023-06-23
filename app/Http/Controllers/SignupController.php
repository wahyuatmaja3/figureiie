<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SignupController extends Controller
{
    function index() {
        return view('login.signup');
    }

    public function store(Request $request) {

        
        $validateData = $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' =>'required|min:8',
            'phone' => 'required',
            'sex' => 'required|in:m,f',
            'dateofbirth' => 'required',
            "address" => "required",
            'type' => 'required|in:a,u'
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        User::create($validateData);

        return redirect('/user/login')->with('success', 'Registration succesfully, Please Login!!');
    }

}
