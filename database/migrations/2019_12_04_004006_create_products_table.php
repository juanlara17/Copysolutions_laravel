<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
            $table->bigIncrements('id');
            $table->string('name', 255)->unique();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('extract', 300)->nullable();
            $table->bigInteger('quantity')->unsigned()->default(0);
            $table->decimal('price', 12, 2)->default(0);
            $table->decimal('price_old', 12, 2)->default(0);
            $table->integer('percent_promo')->unsigned()->default(0);
            $table->string('image', 300);
            $table->boolean('visible'); /* Es lo mismo que ACTIVO */
            $table->boolean('slide_principal');
            $table->string('state');
            $table->bigInteger('visits')->unsigned()->default(0);
            $table->bigInteger('sales')->unsigned()->default(0);
            $table->bigInteger('category_id')->unsigned()->default(0);
            $table->foreign('category_id')
                ->references('id')
                ->on('categories');
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
