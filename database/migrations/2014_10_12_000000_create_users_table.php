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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('user_type')->default('user');
            $table->string('full_name')->default('none');
            $table->string('phone')->default('none');
            $table->string('birthday')->default('none');
            $table->string('country')->default('none');
            $table->string('state')->default('none');
            $table->string('address')->default('none');
            $table->string('photo')->default('user.png');
            $table->string('career')->default('none');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
