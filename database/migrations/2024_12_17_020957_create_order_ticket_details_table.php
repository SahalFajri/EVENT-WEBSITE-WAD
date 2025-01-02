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
        Schema::create('order_ticket_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_ticket_id')->references('id')->on('orders_tickets')->onDelete('cascade');
            $table->foreignId('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
            $table->integer('quantity');
            $table->double('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_ticket_details');
    }
};