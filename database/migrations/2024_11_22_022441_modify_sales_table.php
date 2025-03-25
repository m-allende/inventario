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
        Schema::table('service_sale', function (Blueprint $table) {
            $table->integer('quantity')->nullable();
            $table->integer('total')->nullable();
        });

        Schema::table('promotion_sale', function (Blueprint $table) {
            $table->integer('quantity')->nullable();
            $table->integer('total')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_sale', function (Blueprint $table) {
            $table->dropColumn(['quantity']);
            $table->dropColumn(['total']);
        });

        Schema::table('promotion_sale', function (Blueprint $table) {
            $table->dropColumn(['quantity']);
            $table->dropColumn(['total']);
        });
    }
};
