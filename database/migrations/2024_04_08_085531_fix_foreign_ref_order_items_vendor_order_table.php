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
        Schema::table('order_items', function (Blueprint $table) {
            // $table->dropColumn('vendor_order_id');
            // Add the column with the correct foreign key reference
            $table->unsignedBigInteger('vendor_order_id')->after('order_id');
            $table->foreign('vendor_order_id')->references('vendor_order_id')->on('vendor_orders');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            // Add the column again with the incorrect foreign key reference
            $table->unsignedBigInteger('vendor_order_id')->after('order_id');
        });
    }
};
