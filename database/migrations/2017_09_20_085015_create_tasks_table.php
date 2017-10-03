<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('tasks')) {
            
        Schema::create('tasks', function (Blueprint $table) {
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
           $table->string('phone_number', 25);
           $table->enum('priority', array('normal','low','high', 'urgent', 'medium'))->default('normal');
           $table->enum('status', array('open', 'cancelled', 'on hold', 'in progress'))->default('open');
           $table->dateTime('date_opened');
           $table->dateTime('due_date');
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
        Schema::dropIfExists('tasks');
    }
}
