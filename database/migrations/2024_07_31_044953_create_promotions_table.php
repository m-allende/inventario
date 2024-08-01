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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string("code");
            $table->string("name");
            $table->string("description");
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('promotion_product', function (Blueprint $table) {
            $table->unsignedBigInteger('promotion_id');
            $table->unsignedBigInteger('product_id');
            $table->integer("quantity")->default(1);
            $table->foreign('promotion_id')->references('id')->on('promotions');
            $table->foreign('product_id')->references('id')->on('products');
        });

        Schema::create('promotion_service', function (Blueprint $table) {
            $table->unsignedBigInteger('promotion_id');
            $table->unsignedBigInteger('service_id');
            $table->integer("quantity")->default(1);
            $table->foreign('promotion_id')->references('id')->on('promotions');
            $table->foreign('service_id')->references('id')->on('services');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotion_product');
        Schema::dropIfExists('promotion_service');
        Schema::dropIfExists('promotions');
    }
};
