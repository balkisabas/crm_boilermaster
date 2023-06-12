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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('parent_id');
            $table->string('name')->nullable();
            $table->string('add')->nullable();
            $table->string('pic')->nullable();
            $table->string('email')->nullable();
            $table->string('phn_no')->nullable();
            $table->string('fax_no')->nullable();
            $table->string('status')->nullable();
            $table->string('parent')->nullable();
            $table->string('Active_status')->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
