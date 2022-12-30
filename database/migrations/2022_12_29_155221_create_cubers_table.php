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
            $table->uuid('id')->primary();
            $table->string('name', 100);
            $table->string('username', 30)->unique();
            $table->string('email', 30)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('profile_img', 150)->nullable();
            $table->string('wca_id', 10)->nullable();
            $table->string('youtube_id', 50)->nullable();
            $table->string('instagram_id', 50)->nullable();
            $table->string('twitter_id', 50)->nullable();
            $table->string('country', 30)->nullable();
            $table->string('city', 30)->nullable();
            $table->enum('sex', ['male', 'female', 'anonymous'])->default('anonymous');
            $table->text('about_me')->nullable();
            $table->string('password', 200);
            $table->rememberToken();
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
        Schema::dropIfExists('cubers');
    }
}
