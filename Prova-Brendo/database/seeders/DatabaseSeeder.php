<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\UserGroups;
use App\Models\UserTypes;
use App\Models\Users;
use App\Models\News;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->insert([
            'user_type' => 'admin'
        ]);
        DB::table('user_types')->insert([
            'user_type' => 'editor'
        ]);
        DB::table('user_groups')->insert([
            'user_type_id' => UserTypes::where('user_type', 'admin')->first()->id,
            'group_name' => 'administrator'
        ]);
        DB::table('user_groups')->insert([
            'user_type_id' => UserTypes::where('user_type', 'editor')->first()->id,
            'group_name' => 'editor'
        ]);
        DB::table('users')->insert([
            'full_name' => 'admin',
            'email' => 'brendoja@gmail.com',
            'password' => Hash::make('admin'),
            'user_group_id' => UserGroups::where('group_name', 'administrator')->first()->id,
        ]);
        for ($i = 0; $i <= 10; $i++) {
            DB::table('users')->insert([
                'full_name' => 'editor-' . $i,
                'email' => 'editor-' . $i . '@gmail.com',
                'password' => Hash::make('password'),
                'user_group_id' => UserGroups::where('group_name', 'editor')->first()->id,
            ]);
        }
        for ($i = 1; $i <= 10; $i++) {
            DB::table('news')->insert([
                'title' => 'ipsum loren' . $i,
                'body' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing",
                'user_editor_id' => $i,
            ]);
        }
    }
}
