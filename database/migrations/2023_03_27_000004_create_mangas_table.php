<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mangas', function (Blueprint $table) {
            $table->id();
            $table->string('avatar');
            $table->text('description');
            $table->boolean('status');
            $table->tinyInteger('enable');
            $table->string('name');
            $table->float('ratting');
            $table->dateTime('release_day');
            $table->integer('views');
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('translator_id');
            $table->foreign('author_id')->references('id')->on('authors');
            $table->foreign('translator_id')->references('id')->on('translators');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mangas');
    }
};