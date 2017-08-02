<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('process_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->integer('subtype_id')->unsigned();
            $table->string('imagen')->nullable();
            $table->string('name');
            $table->string('condition')->nullable();
            $table->string('notes');
            $table->string('place');
            $table->string('colors');
            $table->integer('status_id')->unsigned()->default(1);
            $table->integer('state_id')->unsigned()->default(1);
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
        Schema::dropIfExists('pets');
    }
}
