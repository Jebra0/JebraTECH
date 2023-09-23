<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->boolean('is_writer')->default(false);
            $table->timestamp('block_expiration_date')->nullable();
            $table->boolean('gender')->nullable()->comment('0 => male // 1 => female');
            $table->string('photo')->nullable();
            $table->string('about')->nullable();

        });

    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
