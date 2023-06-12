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
        Schema::create('proposal_docs', function (Blueprint $table) {
            $table->id();
            $table->integer('rfqid')->nullable();
            $table->string('document_name')->nullable();
            $table->string('document_type')->nullable();
            $table->string('filename')->nullable();
            $table->string('status')->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposal_docs');
    }
};
