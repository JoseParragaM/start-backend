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
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id_question');
            $table->unsignedInteger('id_subcategory');
            $table->unsignedInteger('id_aoe');
            $table->text('description');
            $table->enum('loc', ['beginner','intermediate','advanced']);
            $table->boolean('active')->default(true);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_subcategory')->references('id_subcategory')->on('subcategories')->onDelete('cascade');
            $table->foreign('id_aoe')->references('id_aoe')->on('aoe')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
