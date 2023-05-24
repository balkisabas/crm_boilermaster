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
        Schema::create('personinchanrges', function (Blueprint $table) {
            $table->id();
            $table->string('fk');
            $table->string('name');
            $table->string('phn_no');
            $table->string('email');
             $table->string('Designation');
            $table->string('fax_no');
            $table->string('assign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personinchanrges');
    }
};
