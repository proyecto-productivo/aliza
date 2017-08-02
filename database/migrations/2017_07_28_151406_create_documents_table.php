<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('process_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->string('entity');
            $table->string('number');
            $table->string('name');
            $table->string('notes');
            $table->string('place');
            $table->integer('status_id')->unsigned()->default(1);
            $table->integer('state_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->integer('owner_id')->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
