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
        Schema::create('chates', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->index('admin_id', 'tes_admin');
            $table->index('user_id', 'fk_chates_user');

            // Define foreign keys
            $table->foreign('admin_id')
                ->references('id')
                ->on('admins')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chates');
    }
};
