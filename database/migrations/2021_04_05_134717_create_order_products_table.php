<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->string('sku', 20)->comment('sku do produto');
            $table->string('product_description', 191)->comment('descrição do produto');
            $table->string('base_currency', 5)->default('R$')->comment('moeda do pagamento');
            $table->integer('unitary_price')->default(0)->comment('valor unitário do produto');
            $table->integer('amount')->default(0)->comment('quantidade comprada de produto');
            $table->integer('base_total')->default(0)->comment('valor total dos produtos');
            $table->integer('discount_percent')->default(0)->comment('valor do desconto em percentual');
            $table->string('additional', 190)->nullable()->comment('informação acicional');
            $table->foreignId('order_id')->constrained();
            $table->foreignId('product_id')->constrained();
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
        Schema::dropIfExists('order_products');
    }
}
