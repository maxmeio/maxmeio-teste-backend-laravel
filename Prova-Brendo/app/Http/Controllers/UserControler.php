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
use phpDocumentor\Reflection\Types\Self_;

class UserControler extends Controller
{
    /**
     * delete a user
     */
    public function deleteUser(Request $req)
    {
        if (self::checkAdmin(User::find(Auth::id()))) {
            try {
                $data = $req->all();
                User::destroy($data['user_id']);

                return redirect(route('register-user'));
            } catch (\Throwable $th) {
                return $this->registrationPage(errors: "Users can't be deleted");
            }
        } else {
            return redirect('login');
        }
    }
    /**
     * edit an user page
     * 
     * take the user data and send to manage user page directly in the form
     */
    public function editUser(Request $req)
    {
        if (self::checkAdmin(User::find(Auth::id()))) {
            $data = $req->all();
            $user = User::find($data['user_id']);

            return $this->registrationPage($user);
        } else {
            return redirect('login');
        }
    }
    /**
     * handle user edit from the manage user page form
     */
    public function editUserConfirm(Request $req)
    {
        if (self::checkAdmin(User::find(Auth::id()))) {
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
        } else {
            return redirect('login');
        }
    }


    /**
     * registration page
     * check if the current user is on admin group
     */
    public function registrationPage(User $user_edit = null, $errors = null)
    {
        if (self::checkAdmin(User::find(Auth::id()))) {
            $users = DB::table('users')->join('user_groups', 'users.user_group_id', '=', 'user_groups.id')->select(['users.id', 'users.full_name', 'users.email', 'user_groups.group_name'])->get()->all();
            // print_r($users);
            return view('auth.registration', [
                'user_edit' => $user_edit,
                'users' => $users,
                'error' => $errors
            ]);
        } else {
            return redirect('login');
        }
    }
    /**
     * validate info and create a new user
     */
    public function registrate(Request $req)
    {
        if (self::checkAdmin(User::find(Auth::id()))) {
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
        } else {
            return redirect('login');
        }
    }
    /**
     * create a new user with the given data
     */
    public function createUser($data)
    {
        if (self::checkAdmin(User::find(Auth::id()))) {
            try {
                
                return User::create([
                    'full_name' => $data['full_name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'user_group_id' => $data['user_group_id']
                ]);
            } catch (\Throwable $th) {
                return $this->registrationPage(errors: "Users can't be created");
            }
        } else {
            return redirect('login');
        }
    }
    /**
     * check if the given user is an Admin
     */
    public static function checkAdmin(User $user)
    {
        return UserGroups::find($user->user_group_id)->group_name == 'administrator';
    }
}
