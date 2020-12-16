<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('productid');
            $table->string('product_name');
            $table->string('product_slug');
            $table->string('product_category');
            $table->string('product_categoryid');
            $table->string('category_name');
            $table->string('product_type')->nullable();
            $table->string('cost_product_price')->nullable();
            $table->string('selling_product_price')->nullable();
            $table->text('product_description')->nullable();
            $table->string('short_description');
            $table->text('product_image')->nullable();
            $table->string('barcode')->nullable();
            $table->string('manufacture_date')->nullable();
            $table->string('expiry_date')->nullable();
            $table->string('batch_number')->nullable();
            $table->integer('is_deleted_at')->nullable();
            $table->boolean('is_available')->nullable();

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
