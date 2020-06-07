<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->string('code')->unique();
            $table->string('name');
            $table->string('slug');
            $table->integer('price');
            $table->boolean('promoted')->default(false);
            $table->string('percent_off')->nullable();
            $table->string('promotion_price')->nullable();
            $table->string('quantity');
            $table->integer('views')->default(0);
            $table->boolean('published')->defalt(false);
            $table->text('description')->nullable();
            $table->text('description_long')->nullable();
            $table->string('tags')->nullable();
            $table->string('thumbnail');
            $table->string('image');
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
        Schema::dropIfExists('products');
    }
}
