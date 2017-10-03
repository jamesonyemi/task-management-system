<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssetCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_categories', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('description', 1000)->nullable();
            $table->softDeletes();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
            // $table->enum('status', array('active', 'deleted'))->default('active');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('asset_categories');
    }
}
