<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profile', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('job_title');
            $table->string('job_skills');
            $table->string('city');
            $table->string('state');
            $table->string('zipcode');
            $table->string('job_location_preference');
            $table->decimal('years_of_experience', 2, 2);
            $table->smallInteger('expected_retirement_age');
            $table->decimal('expected_retirement_income', 8, 2);
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
        Schema::dropIfExists('user_profile');
    }
}
