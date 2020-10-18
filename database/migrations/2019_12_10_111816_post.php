<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Post extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('aid');
            $table->string('adtitle');
            $table->string('adslug')->unique();
            $table->string('adimgs');
            $table->string('adphone');
            // City ID
            $table->integer('loc_id')->unsigned();
            $table->foreign('loc_id')->references('ctid')->on('cities');
            // Category ID
            $table->string('cat_id');
            $table->boolean('nego')->default('0');
            $table->string('adtime');
            $table->boolean('is_verified')->default('1');
            $table->boolean('is_sold')->default('0');
            $table->boolean('is_anonymus');
            $table->string('selname');
            $table->string('selemail');
            $table->string('postedtill');
            $table->string('adprice');
            $table->boolean('cond');
            $table->string('ad_description');
            
             // User ID
            $table->integer('postedby')->unsigned();
            $table->foreign('postedby')->references('id')->on('users');

            // Brand ID
            $table->integer('br_id')->unsigned();
            $table->foreign('br_id')->references('bid')->on('brands');

            $table->string('vcode');
            $table->string('adadress');
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
        Schema::dropIfExists('posts');
    }
}
