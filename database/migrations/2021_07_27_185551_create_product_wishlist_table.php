<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class  CreateProductWishlistTable extends Migration  
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_wishlist', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('wishlist_id')->unsigned()->nullable();
            $table->foreign('wishlist_id')->references('id')->on('wishlists')
            ->onUpdate('cascade')->onDelete('set null');

            $table->unsignedBigInteger('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')->on('products')
            ->onUpdate('cascade')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_wishlist');
    }
}
