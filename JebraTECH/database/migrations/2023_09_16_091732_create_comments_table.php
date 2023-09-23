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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('content')->nullable();
            
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('blog_id')->nullable();
            $table->index('user_id', 'fk_user_comment');
            $table->index('blog_id', 'fk_blogs_comments');

            // Define foreign keys
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('blog_id')
                ->references('id')
                ->on('blogs')
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
        Schema::dropIfExists('comments');
    }
};
