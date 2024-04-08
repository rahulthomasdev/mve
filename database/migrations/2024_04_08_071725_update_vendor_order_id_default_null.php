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
        Schema::table('vendor_orders', function (Blueprint $table) {
            // Add the 'vendor_order_id' column
            $table->string('vendor_order_no');

            // Make the 'vendor_id' column nullable
            $table->unsignedBigInteger('vendor_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vendor_orders', function (Blueprint $table) {
            $table->dropColumn('vendor_order_no');
            $table->unsignedBigInteger('vendor_id')->nullable(false)->change();
        });
    }
};
