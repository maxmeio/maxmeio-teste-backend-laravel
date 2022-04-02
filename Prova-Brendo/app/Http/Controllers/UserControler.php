<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Constraint\ExceptionMessage;
use App\Models\UserGroups;
use Illuminate\Support\Facades\DB;

class UserControler extends Controller
{
    /**
     * redirect to login page
     */
    public function index()
    {
        return view('auth.login');
    }
    /**
     * delete a user
     */
    public function deleteUser(Request $req)
    {
        try {
            $data = $req->all();
            User::destroy($data['user_id']);

            return redirect(route('register-user'));
        } catch (\Throwable $th) {
            return $this->registrationPage(errors: "Users can't be deleted");
        }
    }
    /**
     * edit an user page
     * 
     * take the user data and send to manage user page directly in the form
     */
    public function editUser(Request $req)
    {
        $data = $req->all();
        $user = User::find($data['user_id']);

        return $this->registrationPage($user);
    }
    /**
     * handle user edit from the manage user page form
     */
    public function editUserConfirm(Request $req)
    {
        $data = $req->all();

        $user = User::find($data['user_id']);
        $user->full_name = $data['full_name'];
        $user->email = $data['email'];
        if (!is_null($data['password'])) {
            $user->password = Hash::make($data['password']);
        }
        $user->user_group_id = $data['user_group_id'];
        $user->save();

        return redirect(route('register-user'));
    }


    /**
     * registration page
     * check if the current user is on admin group
     */
    public function registrationPage(User $user_edit = null, $errors = null)
    {
        $users = DB::table('users')->join('user_groups', 'users.user_group_id', '=', 'user_groups.id')->select(['users.id', 'users.full_name', 'users.email', 'user_groups.group_name'])->get()->all();
        // print_r($users);
        return view('auth.registration', [
            'user_edit' => $user_edit,
            'users' => $users,
            'error' => $errors
        ]);
    }
    /**
     * validate info and create a new user
     */
    public function registrate(Request $req)
    {
        $req->validate(
            [
                'full_name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
                'user_group_id' => 'required'
            ]
        );
        $data = $req->all();
        // var_dump($data);
        $new_user_id = $this->createUser($data);
        return redirect('/registration');
    }
    /**
     * create a new user with the given data
     */
    public function createUser($data)
    {
        return User::create([
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'user_group_id' => $data['user_group_id']
        ]);
    }
    /**
     * check if the given user is an Admin
     */
    public static function checkAdmin(User $user)
    {
        return UserGroups::find($user->user_group_id)->group_name == 'administrator';
    }
}
