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
        Schema::create('wishlist_items', function (Blueprint $table) {
            $table->id('wishlist_item_id'); // Primary Key
            $table->unsignedBigInteger('wishlist_id'); // Foreign Key referencing Wishlist
            $table->unsignedBigInteger('product_id'); // Foreign Key referencing Product
            $table->timestamps();

            $table->foreign('wishlist_id')->references('wishlist_id')->on('wishlists');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlist_items');
    }
};
