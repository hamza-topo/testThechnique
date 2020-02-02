<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCityIdToDeliveryTimes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   /* public function up()
    {
        Schema::table('delivery_times', function (Blueprint $table) {
            $table->integer('city_id')->unsigned()->after('id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
        });
    }*/

    
}
