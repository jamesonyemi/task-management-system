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

    if (! Schema::hasTable('projects')) {
        
        Schema::create('projects', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('company_name');
            $table->string('description');
            $table->string('assigned_to');
            $table->string('creator');
            $table->bigInteger('user_id');
            $table->string('email')->unique();
            $table->string('phone_number', 16);
            $table->enum('priority', array('Normal','Low','High', 'Urgent', 'Medium'))->default('Normal');
            $table->enum('status', array('Open', 'Cancelled', 'On Hold', 'In Progress','Completed'))->default('Open');
            $table->string('blob_id')->nullable();
            // $table->foreign('blob_id')->references('id')->on('blobs');
            $table->timestamps();
            $table->softDeletes();

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
        Schema::drop('projects');
    }
}
