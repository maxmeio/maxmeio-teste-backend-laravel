<?php

use App\Models\Users;
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
        Schema::create('news', function (Blueprint $table) {
            $table->increments("id");
            $table->string("title");
            $table->longText("body");
            $table->string("img_path");
            $table->boolean("activated")->default(false);
            $table->unsignedBigInteger('user_editor_id');
            $table->unsignedBigInteger('user_admin_id');
            $table->foreign("user_editor_id")->references("id")->on("users");
            $table->foreign("user_admin_id")->references("id")->on("users");
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
        Schema::dropIfExists('news');
    }
};
