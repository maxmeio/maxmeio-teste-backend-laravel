<?php

use App\Models\UserGroups;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments("id");
            $table->string("full_name");
            $table->string("email")->unique();
            $table->string("password");
            $table->unsignedBigInteger('user_group_id');
            $table->foreign("user_group_id")->references("id")->on("user_groups");
            $table->timestamp("last_login", 0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
