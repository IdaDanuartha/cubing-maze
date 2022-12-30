<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCubersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cubers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('wca_id')->nullable();
            $table->bigInteger('youtube_id')->nullable();
            $table->bigInteger('instagram_id')->nullable();
            $table->bigInteger('twitter_id')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->enum('sex')->nullable();
            $table->text('about_me')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cubers');
    }
}
