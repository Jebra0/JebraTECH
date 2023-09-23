<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('body');
            $table->text('discription')->nullable();
            $table->boolean('is_visible')->nullable()->default(1);
            $table->text('image_url')->nullable();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->index('admin_id');

            // Define foreign key
            $table->foreign('admin_id')
                ->references('id')
                ->on('admins')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
