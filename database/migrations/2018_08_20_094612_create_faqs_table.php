<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('question', 191);
            $table->text('answer', 65535);
            $table->boolean('is_published')->default(1);
            $table->integer('order');
            $table->string('lang', 20)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('faqs', function ($table){
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
        Schema::dropIfExists('faqs');
        Schema::dropForeign(['user_id']);
    }
}
