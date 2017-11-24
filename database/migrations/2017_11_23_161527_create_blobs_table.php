<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blobs', function (Blueprint $table) {
            $table->increments('id')->comment('unique identifier for each blob resource(auto-incremented');;
            $table->string('name')->comment('the original name of the blob resource');;
            $table->string('mime_type')->comment('the mime type of the blob resource');
            $table->string('url')->comment('Blob resource');
            $table->double('size')->comment('the size of the blob resource');
            $table->bigInteger('user_id')->comment('the identifier for the user');
            $table->enum('status', array('active','deleted'))->default('active')->comment('Different state of the blob,(default is active)');
            $table->timestamp('created_date')->comment('the date entry was made,(auto-generated)')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blobs');
    }
}
