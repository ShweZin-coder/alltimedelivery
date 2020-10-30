<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id('restaurantid');
            $table->text('restaurantlogo');
            $table->string('restaurantname');
            $table->string('restaurantemail');
            $table->string('restaurantcontactnumber');
            $table->string('personname');
            $table->string('personphnumber');
            $table->bigInteger('restauranttypeid');
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
        Schema::dropIfExists('restaurants');
    }
}
