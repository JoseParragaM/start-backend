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
        Schema::create('quiz_result_answers', function (Blueprint $table) {
            $table->increments('id_quiz_result_answer');
            $table->unsignedInteger('id_quiz_result');
            $table->unsignedInteger('id_user_answer');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_quiz_result')->references('id_quiz_result')->on('quiz_results')->onDelete('cascade');
            $table->foreign('id_user_answer')->references('id_user_answer')->on('user_answers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_result_answers');
    }
};
