<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatePlayerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('date_player', function (Blueprint $table) {
            $table->unsignedBigInteger('date_id');
            $table->unsignedBigInteger('player_id');

            $table->foreign('date_id')
                ->references('id')
                ->on('dates')
                ->onDelete('cascade');

            $table->foreign('player_id')
                ->references('id')
                ->on('players')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('date_player');
    }
}
