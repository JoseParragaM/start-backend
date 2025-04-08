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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('first_name', 20);
            $table->string('lastname_name', 20);
            $table->string('email', 40)->unique();
            $table->string('password', 100);
            $table->string('gender', 15);
            $table->date('birthdate');
            $table->string('country', 20);
            $table->enum('role', ['admin','student'])->default('student');
            $table->boolean('active')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
