<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//this table holds certain data types and certain attributes like name, detail, address ...
class CreateFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friends', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->text('detail');
            $table->text('address');
            $table->date('birthday');
            $table->string('zodiacsign');
            $table->string('hobbies');
            $table->text('socialmedia');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friends');
    }
}
