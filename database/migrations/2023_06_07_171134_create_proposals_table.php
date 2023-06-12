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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->string('company')->nullable();
            $table->string('pic')->nullable();
            $table->string('type')->nullable();
            $table->string('cust_name')->nullable();
            $table->string('cust_pic')->nullable();
            $table->string('cust_email')->nullable();
            $table->string('rfq_no')->nullable();
            $table->string('rfq_title')->nullable();
            $table->date('due_date')->nullable();
            $table->string('final_pricing')->nullable();
            $table->string('rfq_status')->nullable();
            $table->string('cust_po_no')->nullable();
            $table->date('date_award')->nullable();
            $table->string('award_amount')->nullable();
            $table->string('delete_status')->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposals');
    }
};
