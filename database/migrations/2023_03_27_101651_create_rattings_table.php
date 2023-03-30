<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rattings', function (Blueprint $table) {
            $table->id();
            $table->integer('number_of_ratting');
            $table->unsignedBigInteger('manga_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('manga_id')->references('id')->on('mangas');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rattings');
    }
};
