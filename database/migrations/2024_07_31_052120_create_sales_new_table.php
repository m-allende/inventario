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
        Schema::create('promotion_sale', function (Blueprint $table) {
            $table->unsignedBigInteger('sale_id');
            $table->unsignedBigInteger('promotion_id');
            $table->integer("price")->default(0);
            $table->foreign('sale_id')->references('id')->on('sales');
            $table->foreign('promotion_id')->references('id')->on('promotions');
        });

        Schema::create('service_sale', function (Blueprint $table) {
            $table->unsignedBigInteger('sale_id');
            $table->unsignedBigInteger('service_id');
            $table->integer("price")->default(0);
            $table->foreign('sale_id')->references('id')->on('sales');
            $table->foreign('service_id')->references('id')->on('services');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotion_sale');
        Schema::dropIfExists('service_sale');
    }
};
