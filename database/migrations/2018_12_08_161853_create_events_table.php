<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('file_name');
            $table->string('slug')->unique();
            $table->boolean('live')->default(1);
            $table->string('date');
            $table->string('location')->nullable();
            $table->string('hosted_by')->nullable();
            $table->string('special_guests')->nullable();
            $table->enum('status', ['last', 'current', 'upcoming']);
            $table->string('lang', 20)->nullable();
            $table->timestamps();
        });
        Schema::table('events', function ($table){
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
        Schema::dropIfExists('events');
    }
}
