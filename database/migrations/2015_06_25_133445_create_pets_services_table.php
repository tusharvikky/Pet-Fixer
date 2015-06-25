<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetsServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('userId')->unsigned();
            $table->integer('serviceId')->unsigned();
            $table->string('name');
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('serviceId')->references('id')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pets');
    }
}
