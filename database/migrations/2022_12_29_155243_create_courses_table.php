<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('course_category_id');
            $table->string('name', 50);
            $table->string('course_img', 150);
            $table->enum('level', ['Beginner', 'Intermediate', 'Advanced', 'Expert']);
            $table->longText('description');
            $table->enum('type', ['free', 'paid']);
            $table->integer('price')->nullable();
            $table->integer('discount')->nullable();
            $table->enum('status', ['published', 'draft']);
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
        Schema::dropIfExists('courses');
    }
}
