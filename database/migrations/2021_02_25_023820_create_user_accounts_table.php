
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
            $table->string('id_number')->unique();
            $table->string('fullname');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->date('date_of_birth');
            $table->string('compound');
            $table->string('institution');
            $table->string('place_of_residence');
            $table->string('marital_status'); 
            $table->string('security_question'); 
            $table->string('answers');
            $table->string('phone');
            $table->string('stakeholder');
            $table->string('category');
            $table->date('tenure_year_from'); 
            $table->date('tenure_year_to'); 
            $table->string('post_held');
            $table->string('address');
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
