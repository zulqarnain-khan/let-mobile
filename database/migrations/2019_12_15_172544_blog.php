<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Blog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('blog_id');
            $table->string('blog_title');
            $table->longText('blog_description');
            $table->text('short_description');
            $table->string('blog_slug');
            $table->string('blog_image');
            $table->text('blog_tags');
            //category id
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('category_id')->on('blog_categories');
            $table->boolean('is_publish')->default('0');

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
        Schema::dropIfExists('blogs');
    }
}
