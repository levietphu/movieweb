<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_release_time');
            $table->unsignedBigInteger('id_national');
            $table->unsignedBigInteger('id_seri')->nullable();
            $table->string('substitute_name',255);
            $table->string('name',255);
            $table->string('slug',255)->unique();
            $table->string('image',255);
            $table->string('director',255)->nullable();
            $table->string('IMDb',255)->nullable();
            $table->string('all_episode',255)->nullable();
            $table->string('movie_duration',255);
            $table->text('content');
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('type');
            $table->bigInteger('view_count')->default(0);
            $table->timestamps();
            $table->foreign('id_release_time')->references('id')->on('release_times')->onDelete('cascade');
            $table->foreign('id_national')->references('id')->on('nationals')->onDelete('cascade');
            $table->foreign('id_seri')->references('id')->on('seris');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
