<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned()->nullable();
            $table->string('title');
            $table->text('content');
            $table->string('slug')->unique();
            $table->string('thumbnail')->nullable();
            $table->boolean('is_published')->default(true);
            $table->integer('views')->unsigned()->nullable();
            $table->string('lang', 20)->nullable();
            $table->timestamps();
        });

        Schema::table('posts', function ($table){
          $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
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
        Schema::dropForeign(['user_id']);
    }
}
