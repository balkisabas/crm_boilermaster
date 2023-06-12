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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('ph_no')->nullable();
            $table->longText('add')->nullable();
            $table->string('reg_no')->nullable();
            $table->string('web_url')->nullable();
            $table->string('fax_no')->nullable(); 
            $table->string('email')->nullable(); 
            $table->string('bank_name')->nullable();
            $table->string('bank_acc_no')->nullable();  
            $table->string('swift_code')->nullable();
            $table->string('doc')->nullable();
            $table->string('pic')->nullable();
            $table->string('status')->nullable();
            $table->string('assign')->nullable();
            $table->string('active_status')->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
 