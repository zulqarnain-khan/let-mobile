<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewMobileInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobiles', function (Blueprint $table) {
            $table->increments('mobile_id');
            $table->string('mobile_title');
            $table->longText('mobile_description');
            $table->text('short_description');
            $table->string('mobile_slug');
            $table->string('mobile_image');
            $table->text('mobile_tags');
           // Brand ID
            $table->integer('brand_id')->unsigned();
            $table->foreign('brand_id')->references('bid')->on('brands');
            $table->boolean('is_publish')->default('0');

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
