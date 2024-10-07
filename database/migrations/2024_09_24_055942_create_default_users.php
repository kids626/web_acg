<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefaultUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     //$table->integer($column, $autoIncrement = false, $unsigned = false)

    public function up()
    {
        Schema::create('default_users', function (Blueprint $table) {
            $table->id();
            $table->string('email',50);
            $table->string('password',100);
            $table->string('salt',6)->nullable();
            $table->integer('group_id')->nullable();
            $table->string('ip_address',45)->nullable();
            $table->tinyInteger('active',false,false)->nullable();
            $table->string('activation_code',40)->nullable();
            $table->integer('created_on')->unsigned()->nullable();
            $table->integer('last_login')->unsigned()->unllable();
            $table->string('username',20)->nullable();
            $table->string('forgotten_password_code',40)->nullable();
            $table->string('remember_code',40)->nullable();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('default_users');
    }
}
