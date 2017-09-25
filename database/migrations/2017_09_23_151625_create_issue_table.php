<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
       if (!Schema::hasTable('issue')) {
           
        Schema::create('issue', function (Blueprint $table) {
            $table->increments('id');
            $table->string('issue_title');
            $table->string('assigned_by');
            $table->longText('description');
            $table->longText('note');
            $table->string('assignee');
            $table->string('project_name');
            $table->string('employee_name');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone_number', 25);
            // $table->string('blob');
            $table->enum('priority', array('low','high', 'urgent', 'medium'));
            $table->enum('status', array('started', 'not started', 'fixed', 'pending'));
            $table->dateTime('date_opened');
            $table->dateTime('date_fixed');
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
        Schema::dropIfExists('issue');
    }
}
