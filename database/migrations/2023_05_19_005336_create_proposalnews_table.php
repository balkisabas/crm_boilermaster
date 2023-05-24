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
        Schema::create('proposalnews', function (Blueprint $table) {
            $table->id();
            $table->string('branch');
            $table->string('pic');
            $table->string('type');
            $table->string('cust_name');
            $table->string('cust_pic');
            $table->string('cust_email');
            $table->string('rfq_no');
            $table->string('rfq_title');
            $table->date('due_date');
            $table->string('final_pricing');
            $table->string('rfq_status');
            $table->string('cust_po_no');
            $table->date('date_award');
            $table->string('award_amount');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposalnews');
    }
};
