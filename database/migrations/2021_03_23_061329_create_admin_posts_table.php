<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_posts', function (Blueprint $table) {
            $table->id();
            $table->string('adminName');
            $table->string('posting');
            $table->string('image')->nullable();
            $table->string('ImageCaption')->nullable();
            $table->string('video')->nullable();
            $table->string('VideoCaption')->nullable();
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
        Schema::dropIfExists('admin_posts');
    }
}
