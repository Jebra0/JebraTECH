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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->text('url')->nullable();
            $table->text('image');
            $table->text('caption')->nullable();
            $table->unsignedBigInteger('blog_id')->nullable();
            
            $table->index('blog_id', 'fk_blogs_media');

            // Define foreign key
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
        Schema::dropIfExists('media');
    }
};
