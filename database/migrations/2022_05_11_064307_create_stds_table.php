<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stds', function (Blueprint $table) {
            $table->id();
            $table->string('class_name');
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->foreign('teacher_id')->references('id')->on('teachers');
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
        Schema::dropIfExists('stds');
    }
}
