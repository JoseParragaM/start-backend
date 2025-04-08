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
        Schema::create('subcategories', function (Blueprint $table) {
            $table->increments('id_subcategory');
            $table->unsignedInteger('id_category');
            $table->string('name', 30);
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->boolean('active')->default(true);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_category')->references('id_category')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcategories');
    }
};
