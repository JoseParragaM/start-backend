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
        Schema::create('user_sessions', function (Blueprint $table) {
            $table->increments('id_user_session');
            
            $table->unsignedInteger('id_user');
            $table->string('device_type', 20);
            $table->string('provider', 20);
            $table->text('access_token');
            $table->text('refresh_token');
            $table->boolean('revoked')->default(false);
            $table->dateTime('expires_at')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_sessions');
    }
};
