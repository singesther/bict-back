<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('program_id')->unsigned();
            $table->string('file_name');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('location')->nullable();
            $table->string('slug')->unique();
            $table->boolean('live')->default(1);
            $table->string('date');
            $table->enum('status', ['last', 'current', 'upcoming']);
            $table->string('lang', 20)->nullable();
            $table->timestamps();
        });

        Schema::table('activities', function ($table){
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('program_id')->references('id')->on('programs')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
