<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('avatar')->nullable();
            $table->string('birth_place')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('sex')->nullable();
            $table->string('religion')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('profile_id');
            $table->bigInteger('grade_id');
            $table->bigInteger('major_id');
            $table->string('nim');
            $table->boolean('status');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('officers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('profile_id');
            $table->bigInteger('major_id');
            $table->string('nip');
            $table->boolean('status');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('majors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->timestamps();
        });

        Schema::create('grades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('title');
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
        Schema::dropIfExists('students');
        Schema::dropIfExists('employees');
    }
};
