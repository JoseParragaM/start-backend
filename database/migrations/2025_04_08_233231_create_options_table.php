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
        Schema::create('options', function (Blueprint $table) {
            $table->increments('id_option');
            $table->unsignedInteger('id_question');
            $table->text('text');
            $table->boolean('is_correct');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_question')->references('id_question')->on('questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('options');
    }
};
