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
        return view('auth.login');
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
    /**
     * registration page
     * check if the current user is on admin group
     */
    public function registration(Request $req)
    {
        // if (Auth::check()) {
            // var_dump($req->all());
            // $data = $req;
            return view('auth.registration');
        // }
        // return redirect("/login")->withSuccess(("You don't have permition to access this content"));
    }
    /**
     * validate info and create a new user
     */
    public function registrate(Request $req)
    {
        $req->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
                'user_group_id' => 'user_group_id'
            ]
        );
        $data = $req->all();
    }
    public function createUser($data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'user_group_id' => $data['user_group_id']
        ]);
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

        return Redirect('news.news');
    }
}
