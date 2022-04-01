<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Constraint\ExceptionMessage;

class AuthenticationController extends Controller
{
    /**
     * redirect to login page
     */
    public function index()
    {
        return redirect('/');
    }
    /**
     * validate login info and iniciate session
     */
    public function login(Request $req)
    {
        $req->validate([
            'email' =>  'required',
            'password' =>  'required'
        ]);

        if (Auth::attempt($req->only('email', 'password'))) {
            return redirect()->intended();
        } else {
            return redirect("auth.login")->withSuccess(("Error while doing login"));
        }
    }
    
    public function editNews()
    {
        if (Auth::check()) {
            return view('news.edit');
        }
        return redirect('auth.login')->withSuccess(('You are not allowed to access'));
    }
    public function logOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('/');
    }
}
