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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->integer("type")->default(1);
            $table->string("number");
            $table->timestamp('date');
            $table->integer("neto");
            $table->integer("tax");
            $table->integer("total");
            $table->integer("discount")->default(0);

            $table->foreign('client_id')->references('id')->on('clients');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('product_sale', function (Blueprint $table) {
            $table->unsignedBigInteger('sale_id');
            $table->unsignedBigInteger('product_id');
            $table->integer("quantity")->default(1);
            $table->integer("price")->default(0);
            $table->integer("total")->default(0);
            $table->integer("discount")->default(0);
            $table->foreign('sale_id')->references('id')->on('sales');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
