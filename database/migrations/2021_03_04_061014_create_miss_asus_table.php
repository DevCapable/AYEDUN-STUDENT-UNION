<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissAsusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miss_asus', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('compound');
            $table->string('gender');
            $table->string('discepline');
            $table->string('institution');
            $table->string('date_of_birth');
            $table->string('year_of_tenure_from');
            $table->string('year_of_tenure_to');
            $table->string('sport');
            $table->string('histroy');
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
        Schema::dropIfExists('miss_asus');
    }
}
