<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->string('competition_img', 150);
            $table->string('name', 50);
            $table->string('slug', 50);
            $table->longText('description');
            $table->integer('competitor_limit');
            $table->enum('type', ['free', 'paid']);
            $table->integer('fee')->nullable();
            $table->dateTime('date_start');
            $table->dateTime('date_end');
            $table->string('password', 20)->nullable();
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
        Schema::dropIfExists('competitions');
    }
}
