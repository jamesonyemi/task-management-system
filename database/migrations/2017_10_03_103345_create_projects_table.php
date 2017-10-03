<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('project_name')->nullable();
            $table->string('description', 1000)->nullable();
            $table->enum('status', array('active', 'deleted'))->default('active');
            $table->integer('assigned_by')->unsigned()->index();
            $table->string('assignee')->nullable();
            $table->string('priority')->nullable();
            $table->string('watchers')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('projects');
    }
}
