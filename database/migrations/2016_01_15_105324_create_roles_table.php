<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD:database/migrations/2017_10_10_154346_create_roles_table.php

     if (! Schema::hasTable('roles')) {
         
        Schema::create('roles', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 255);
            $table->boolean('is_active');
            $table->timestamps();

         });
       }
=======

    if (!Schema::hasTable('roles')) {
         Schema::create('roles', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->integer('level')->default(1);
            $table->timestamps();
        });
     }
        
>>>>>>> 55419673dbfbe47667182542ab20190923e46227:database/migrations/2016_01_15_105324_create_roles_table.php
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
