<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD

     if (! Schema::hasTable('user_roles')) {

        Schema::create('user_roles', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('role_id')->unsigned()->index();
            $table->foreign('user_id')->references('users')->on('id');
            $table->foreign('role_id')->references('roles')->on('id');
            $table->string('name', 255);
            $table->string('description', 1000)->nullable();
            $table->boolean('is_active');
            $table->timestamps();

          });
            
        }
=======

 if (!Schema::hasTable('user_roles')) {

    Schema::create('user_roles', function (Blueprint $table) {
        $table->increments('id')->unsigned();
        $table->integer('role_id')->unsigned()->index();
        $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        $table->integer('user_id')->unsigned()->index();
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->timestamps();
        
         });

       }
>>>>>>> 55419673dbfbe47667182542ab20190923e46227
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_roles');
    }
}
