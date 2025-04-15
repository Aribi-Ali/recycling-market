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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('buyer_id');
            $table->foreign("buyer_id")->references('id')->on('users')->nullOnDelete();

            $table->unsignedBigInteger('seller_id');
            $table->foreign("seller_id")->references('id')->on('users')->nullOnDelete();

            $table->unsignedBigInteger('product_id');
            $table->foreign("product_id")->references('id')->on('products')->nullOnDelete();

            $table->unsignedBigInteger('address_id');
            $table->foreign("address_id")->references('id')->on('addresses')->nullOnDelete();

            $table->enum('status', ["pending", "reserved", "delivered", "cancelled"])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
