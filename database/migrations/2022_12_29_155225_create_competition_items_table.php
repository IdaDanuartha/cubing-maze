<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competition_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('competition_id');
            $table->bigInteger('competition_round_id');
            $table->bigInteger('cube_category_id');
            $table->string('scramble_img', 150);
            $table->date('date');
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
        Schema::dropIfExists('competition_items');
    }
}
