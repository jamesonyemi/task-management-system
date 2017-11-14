<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('project_name')->nullable();
            $table->string('description', 1000)->nullable();
            $table->enum('status', array('active', 'deleted'));
            $table->integer('created_by')->unsigned()->index();
            $table->enum('priority', array('normal','low','high', 'urgent', 'medium'))->default('normal');
            //$table->string('assignee')->nullable();
            //$table->string('priority')->nullable();
            //$table->string('watchers')->nullable();
            $table->timestamps();
            $table->softDeletes();

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
