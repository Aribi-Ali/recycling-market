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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string("name_ar");
            $table->string("name_fr");
            $table->string("name_en");
            $table->text("description_ar");
            $table->text("description_fr");
            $table->text("description_en");
            $table->string("image");
            $table->decimal("price", 8, 2);
            $table->decimal("newPrice", 8, 2);
            $table->decimal("specialPrice", 8, 2)->nullable();
            $table->date("specialPriceStart")->nullable();
            $table->date("specialPriceEnd")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};