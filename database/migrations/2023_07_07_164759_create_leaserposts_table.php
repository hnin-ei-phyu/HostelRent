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
        Schema::create('leaserposts', function (Blueprint $table) {
            $table->id();
            $table->string('leaser_id');
            $table->string('leasername');
            $table->string('leaseremail');
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

        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('leaserpost_id')->unsigned();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->text('body');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaserposts');
        Schema::dropIfExists('comments');
    }
};
