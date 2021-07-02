<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('full_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('gender')->nullable();
            $table->unsignedBigInteger('speciality_id')->nullable();

            $table->date('birth_day')->nullable();

            $table->longText('description')->nullable();
            $table->longText('socials')->default('{"facebook":null,"instagram":null,"twitter":null,"youtube":null,"github":null,"linkedin":null}');

            $table->longText('schedual_pic', 2048)->nullable();
            $table->longText('profile_pic', 2048)->nullable();
            //signature must be hashed pic

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');  //[[revisit]]

            $table->foreign('speciality_id')
                    ->references('id')
                    ->on('specialities');  //[[revisit]]

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
        Schema::dropIfExists('profiles');
    }
}
