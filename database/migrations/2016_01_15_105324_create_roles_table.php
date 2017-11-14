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

     if (! Schema::hasTable('roles')) {
         
        Schema::create('roles', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('description')->nullable();
            $table->boolean('is_active');
            $table->timestamps();

         });
    }
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
