<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lastname');  ////TODO
            $table->string('profilePic')->nullable();////TODO
            $table->string('about_me')->nullable();///TODO
            $table->string('country');
            $table->string('phone');
            $table->string('city');
            $table->string('address');
            $table->integer('zipcode');
            $table->float('rating');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('isOwner');
            $table->boolean('isCreator');
            $table->boolean('sentCreatorRequest');
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
}
