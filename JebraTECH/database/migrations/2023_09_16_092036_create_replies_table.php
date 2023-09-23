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
        Schema::create('replies', function (Blueprint $table) {
            $table->id();
            $table->text('content')->nullable();
            
            $table->unsignedBigInteger('comment_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->index('comment_id', 'fk_comments_replies');
            $table->index('user_id');

            // Define foreign keys
            $table->foreign('comment_id')
                ->references('id')
                ->on('comments')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('replies');
    }
};
