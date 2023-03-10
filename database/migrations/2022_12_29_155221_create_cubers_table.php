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
            $table->string('user_id');
            $table->string('name', 100);            
            $table->timestamp('email_verified_at')->nullable();
            $table->string('wca_id', 10)->nullable();            
            $table->string('youtube_id', 50)->nullable();
            $table->string('instagram_id', 50)->nullable();
            $table->string('country', 20)->nullable();
            $table->string('province', 20)->nullable();
            $table->string('city', 20)->nullable();
            $table->string('postal_code', 10)->nullable();
            $table->text('full_address')->nullable();
            $table->enum('sex', ['male', 'female', 'anonymous'])->default('anonymous');
            $table->text('about_me')->nullable();
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
