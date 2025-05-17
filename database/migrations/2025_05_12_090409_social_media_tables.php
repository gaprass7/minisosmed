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
        Schema::create('posts', function (Blueprint $table) {
           $table->id(); 
           $table->integer('user_id');
           $table->text('content');
           $table->string('image')->nullable();
           $table->timestamps(0);
           $table->softDeletes();
        });

        Schema::create('comments', function (Blueprint $table) {
           $table->id(); 
           $table->integer('user_id');
           $table->integer('posts_id');
           $table->text('content');
           $table->timestamps(0);
           $table->softDeletes();
        });

        Schema::create('likes', function (Blueprint $table) {
           $table->id(); 
           $table->integer('user_id');
           $table->integer('posts_id');
           $table->timestamps(0);
           $table->softDeletes();
        });

        Schema::create('messages', function (Blueprint $table) {
           $table->id(); 
           $table->integer('sender_id');
           $table->integer('receiver_id');
           $table->text('message_content');
           $table->timestamps(0);
           $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('likes');
        Schema::dropIfExists('messages');
    }
};
