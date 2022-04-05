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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->bigInteger('category_books_id');
            $table->bigInteger('publisher_books_id');
            $table->string('title');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->text('synopsis');
            $table->string('author');
            $table->integer('total_page');
            $table->integer('total_stock');
            $table->year('publish_year');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('category_books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('publisher_books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('borrow_books', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('book_id');
            $table->bigInteger('student_id');
            $table->bigInteger('officer_id');
            $table->dateTime('date_start');
            $table->dateTime('date_end');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
