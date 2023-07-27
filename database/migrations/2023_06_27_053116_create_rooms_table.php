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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_id');
            $table->string('post_date')->nullable();
            $table->string('category');
            $table->string('roomtype');
            $table->string('room_area');
            $table->string('township');
            $table->string('address');
            $table->string('price');
            $table->string('facilities');
            $table->string('description');
            $table->string('phone');
            $table->string('photo1');
            $table->string('photo2');
            $table->string('photo3');
            $table->string('photo4');
            $table->timestamps();
            $table->softDeletes();
        });


        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
