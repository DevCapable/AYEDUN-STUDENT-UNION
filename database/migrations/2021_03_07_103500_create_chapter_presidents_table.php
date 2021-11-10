<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChapterPresidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapter_presidents', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('compound');
            $table->string('gender');
            $table->string('discepline');
            $table->string('institution');
            $table->string('date_of_birth');
            $table->string('year_of_tenure_from');
            $table->string('year_of_tenure_to');
            $table->string('post');
            $table->string('history');
            $table->string('phone');
            $table->string('picture')->nullable();
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
        Schema::dropIfExists('chapter_presidents');
    }
}
