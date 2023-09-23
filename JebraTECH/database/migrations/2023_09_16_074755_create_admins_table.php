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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->boolean('gender')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->string('photo')->nullable();
            $table->string('password')->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamp('last_login_at')->nullable();
            $table->timestamps();
            $table->index('name', 'idx_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
