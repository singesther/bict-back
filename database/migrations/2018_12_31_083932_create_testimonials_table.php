<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('file_name')->nullable();
            $table->string('title')->nullable();
            $table->string('creator_name')->nullable();
            $table->string('creator_position')->nullable();
            $table->string('creator_company')->nullable();
            $table->string('creator_link')->nullable();
            $table->text('description')->nullable();
            $table->string('location')->nullable();
            $table->boolean('live')->default(1);
            $table->string('date')->nullable();
            $table->string('lang', 20)->nullable();
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
        Schema::dropIfExists('testimonials');
    }
}
