<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('cities', function (Blueprint $table) {
            $table->increments('ctid');
            $table->string('city');
            $table->string('cityslug');
            $table->string('lat');
            $table->string('lng');
            $table->string('type');
            $table->integer('prov_id')->unsigned();
            $table->foreign('prov_id')->references('proid')->on('provinces');
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
        Schema::dropIfExists('cities');
    }
}
