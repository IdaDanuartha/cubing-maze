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
            $table->float('solve1');
            $table->float('solve2');
            $table->float('solve3');
            $table->float('solve4')->nullable();
            $table->float('solve5')->nullable();
            $table->float('average');
            $table->string('link_video', 200)->nullable();
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
        Schema::dropIfExists('competition_results');
    }
}
