<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCateMovieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cate_movie', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_cate');
            $table->unsignedBigInteger('id_movie');
            $table->timestamps();
            $table->foreign('id_cate')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('cate_movie');
    }
}
