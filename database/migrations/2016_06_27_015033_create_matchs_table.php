<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matchs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hometeam');
            $table->string('awayteam');
            $table->integer('homegoal');
            $table->integer('awaygoal');
            $table->dateTimeTz('timestart');
            $table->dateTimeTz('timeend');
            $table->dateTimeTz('timebet');
            $table->float('win');
            $table->float('draw');
            $table->float('loss');
            $table->integer('status');
            $table->integer('level');
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
        Schema::drop('matchs');
    }
}
