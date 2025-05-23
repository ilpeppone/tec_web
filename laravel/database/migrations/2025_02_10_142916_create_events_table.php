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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->text('description');
            $table->string('image_path')->nullable();
            $table->boolean('is_outdoor')->default(false); 
            $table->date('event_date'); 
            $table->integer('max_participants'); 
            $table->string('address'); 
            $table->decimal('price', 8, 2)->default(0.00); 
            $table->timestamps();
            $table->boolean('approved')->default(false);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
