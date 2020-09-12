<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_id', 100);
            $table->string('product_name_bold', 100);
            $table->string('product_name_thin', 100);
            $table->string('product_nr', 100);
            $table->string('bottle_text', 100);
            $table->boolean('is_organic');
            $table->boolean('is_ethical');
            $table->boolean('is_web_launch');
            $table->string('SellStartDate', 100);
            $table->boolean('is_completely_out_of_stock');
            $table->boolean('is_temporary_out_of_stock');
            $table->double('alcohol_percentage');
            $table->double('volume');
            $table->string('country', 100);
            $table->string('origin_level_1', 100);
            $table->string('origin_level_2', 100);
            $table->integer('vintage');
            $table->integer('sub_category');
            $table->string('type', 100);
            $table->string('style', 100);
            $table->string('assortment_text', 100);
            $table->string('beverage_description', 100);
            $table->string('usage', 100);
            $table->string('taste', 100);
            $table->string('assortment', 100);
            $table->boolean('is_news');
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
