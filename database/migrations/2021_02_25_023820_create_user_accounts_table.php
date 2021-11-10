
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('id_number', 200)->unique();
            $table->string('fullname', 200);
            $table->string('username', 200)->unique();
            $table->string('email', 200)->unique();
            $table->date('date_of_birth');
            $table->string('compound');
            $table->string('institution');
            $table->string('place_of_residence');
            $table->string('marital_status'); 
            $table->string('security_question'); 
            $table->string('answers');
            $table->string('phone');
            $table ->string('status')->nullable();
            $table ->string('last_seen')->nullable();
            $table->string('stakeholder')->nullable();
            $table->string('category')->nullable();
            $table->date('tenure_year_from')->nullable(); 
            $table->date('tenure_year_to')->nullable(); 
            $table->string('post_held')->nullable();
            $table->string('address')->nullable();
            $table->string('gender');
            $table->string('password');
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
        Schema::dropIfExists('user_accounts');
    }
}
