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
            $table->integer('role_id')->index()->unsigned()->default(2);
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('gender');
            $table->string('birthdate');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone');
            $table->string('address');
            $table->integer('status')->default(0);
            $table->integer('photo_id')->nullable();
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
