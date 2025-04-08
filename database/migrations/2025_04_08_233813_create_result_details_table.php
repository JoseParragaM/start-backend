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
        Schema::create('result_details', function (Blueprint $table) {
            $table->increments('id_result_detail');
            $table->unsignedInteger('id_quiz_result');
            $table->unsignedInteger('id_aoe');
            $table->text('description');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_quiz_result')->references('id_quiz_result')->on('quiz_results')->onDelete('cascade');
            $table->foreign('id_aoe')->references('id_aoe')->on('aoe')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('result_details');
    }
};
