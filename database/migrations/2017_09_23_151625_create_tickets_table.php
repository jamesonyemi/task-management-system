<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
       if (!Schema::hasTable('ticketings')) {
           
        Schema::create('ticketings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned();
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
            $table->string('watchers');
            $table->enum('priority', array('Normal','Low','High', 'Urgent', 'Medium'))->default('Normal');
            $table->enum('status', array('Open', 'Cancelled', 'On Hold', 'In Progress','Completed'))->default('Open');
            $table->dateTime('open_date');
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
        Schema::dropIfExists('issue');
    }
}
