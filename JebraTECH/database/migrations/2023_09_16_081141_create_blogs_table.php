<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('body')->nullable();
            $table->string('description')->nullable();
            $table->boolean('is_hidden')->default(0);
            $table->boolean('is_confirmed')->default(1);
            
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('writer_id')->nullable()->comment('the writer user');
            $table->timestamp('scheduling_date')->nullable();
            $table->index('title', 'idx_name');

            // Define foreign keys
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('writer_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
