<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('app_name', 15);
            $table->string('title_hero', 100);
            $table->text('title_description');
            $table->string('hero_img', 150);
            $table->string('logo_img', 150);
            $table->string('instagram_url', 150);
            $table->string('youtube_url', 150);
            $table->string('version_app', 10);
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
        Schema::dropIfExists('applications');
    }
}
