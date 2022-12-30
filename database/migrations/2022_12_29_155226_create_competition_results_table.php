<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competition_results', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('competition_item_id');
            $table->bigInteger('cuber_id');
            $table->bigInteger('solve1');
            $table->bigInteger('solve2');
            $table->bigInteger('solve3');
            $table->bigInteger('solve4')->nullable();
            $table->bigInteger('solve5')->nullable();
            $table->bigInteger('average');
            $table->string('link_video')->nullable();
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
        Schema::dropIfExists('competition_results');
    }
}
