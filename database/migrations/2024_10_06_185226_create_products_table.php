<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->unsignedInteger('product_main_category_id');
            $table->unsignedInteger('product_category_id');
            $table->string('name');
            $table->text('slug');
            $table->text('image')->nullable();
            $table->text('description')->nullable();
            $table->mediumText('content')->nullable();
            $table->mediumText('content2')->nullable();
            $table->bigInteger('price');
            $table->tinyInteger('is_active')->default(1);
            $table->bigInteger('discount_price')->nullable();
            $table->tinyInteger('is_highlight')->default(0);
            $table->string('created_by', 100);
            $table->string('updated_by', 100);
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
};
