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
            $table->string('phone_no', 15)->nullable();
            $table->string('username')->unique();
            $table->enum('role', ['user', 'admin'])->default('user');
            $table->string('image')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default(Hash::make(rand(6, 9999999999)));
            $table->rememberToken();
            $table->timestamps();
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
