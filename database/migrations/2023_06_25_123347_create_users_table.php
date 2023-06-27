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
            $table->string('password')->nullable();
            $table->string('email')->unique();
            $table->string('alternative_email')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->string('position')->nullable();
            $table->string('company')->nullable();
            $table->string('status')->nullable();
            $table->string('account')->nullable();
            $table->string('delete_status')->default('Active');
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
