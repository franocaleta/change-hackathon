<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->integer('creatorId');
            $table->string('description');
            $table->string('address');
            $table->string('zipcode');
            $table->string('city');
            $table->string('country');
            $table->boolean('isConfirmed');
            $table->string('picture');
        });

        Schema::create('event_user', function (Blueprint $table) {

            //kandidati
            $table->integer('event_id');
            $table->integer('user_id');

            $table->primary(['event_id','user_id']);

        });

    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');

        Schema::dropIfExists('event_user');

    }
}
