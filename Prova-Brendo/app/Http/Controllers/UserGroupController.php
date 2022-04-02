<?php

namespace App\Http\Controllers;

use App\Models\UserGroups;
use Illuminate\Http\Request;


/**
 * this class was created for just administractive propouse
 */
class UserGroupController extends Controller
{
    public function getAllGroups()
    {
        return UserGroups::all();
    }
    public function creageGroupPage()
    {
        return view('admin.create_groups');
    }
    public function createGroupConfirm(Request $req)
    {
        $data = $req->all();
        UserGroups::create([
            'group_name' => $data['group_name'],
            'user_type_id' => $data['user_type_id']
        ]);
        return redirect('registration');
    }
}
