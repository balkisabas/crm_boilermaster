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
        Schema::create('personincharges', function (Blueprint $table) {
            $table->id();
            $table->string('fk')->nullable();
            $table->string('name')->nullable();
            $table->string('phn_no')->nullable();
            $table->string('email')->nullable();
            $table->string('Designation')->nullable();
            $table->string('fax_no')->nullable();
            $table->string('assign')->nullable();
            $table->string('status')->nullable();
            $table->string('active_status')->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personincharges');
    }
};
