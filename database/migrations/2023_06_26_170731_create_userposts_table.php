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
        Schema::create('userposts', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('username');
            $table->string('useremail');
            $table->string('userphoto');
            $table->string('category');
            $table->string('room_type');
            $table->string('location');
            $table->string('price');
            $table->string('post_date')->nullable();
            $table->string('phone');
            $table->timestamps();
        });
    }

 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userposts');
       
    }
};
