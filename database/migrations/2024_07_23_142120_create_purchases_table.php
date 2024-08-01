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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->integer("type")->default(1);
            $table->string("number");
            $table->timestamp('date');
            $table->integer("neto");
            $table->integer("tax");
            $table->integer("total");

            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create('purchase_product', function (Blueprint $table) {
            $table->unsignedBigInteger('purchase_id');
            $table->unsignedBigInteger('product_id');
            $table->integer("quantity")->default(1);
            $table->integer("price")->default(0);
            $table->integer("total")->default(0);
            $table->foreign('purchase_id')->references('id')->on('purchases');
            $table->foreign('product_id')->references('id')->on('products');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_product');
        Schema::dropIfExists('purchases');
    }
};
