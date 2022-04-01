<?php

namespace App\Http\Controllers;

use App\Models\UserTypes;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class UserTypeController extends Controller
{
    public function getAllTypes()
    {
        return UserTypes::all();
    }
    public function addUserType(Request $req)
    {
        $data = $req->all();
        // print_r($data);
        UserTypes::create([
            'user_type' => $data['type']
        ]);
    }
}
