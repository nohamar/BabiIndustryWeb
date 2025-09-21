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
        Schema::create('_invoice_service_order', function (Blueprint $table) {
            $table->id();
             $table->foreignId('service_id')->constrained('service_orders')->cascadeOnDelete();
             $table->foreignId('invoice_id')->constrained('invoices')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_invoice_service_order');
    }
};
