<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_movie');
            $table->unsignedBigInteger('id_tran');
            $table->string('name',255);
            $table->string('slug',255)->unique();
            $table->string('link',255);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->foreign('id_movie')->references('id')->on('movies')->onDelete('cascade');
            $table->foreign('id_tran')->references('id')->on('translates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episodes');
    }
}
