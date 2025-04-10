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
        Schema::create('user_answers', function (Blueprint $table) {
            $table->increments('id_user_answer');
            $table->unsignedInteger('id_quiz_result');
            $table->unsignedInteger('id_question');
            $table->unsignedInteger('id_option');
            $table->text('feedback')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_quiz_result')->references('id_quiz_result')->on('quiz_results')->onDelete('cascade');
            $table->foreign('id_question')->references('id_question')->on('questions')->onDelete('cascade');
            $table->foreign('id_option')->references('id_option')->on('options')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_answers');
    }
};
