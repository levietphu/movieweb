<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranMovieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tran_movie', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_tran');
            $table->unsignedBigInteger('id_movie');
            $table->timestamps();
            $table->foreign('id_tran')->references('id')->on('translates')->onDelete('cascade');
            $table->foreign('id_movie')->references('id')->on('movies')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tran_movie');
    }
}
