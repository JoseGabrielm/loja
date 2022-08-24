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
            $table->id();
            $table->string('sku', 15)->unique()->comment('codigo unico do produto');
            $table->string('name', 191)->unique()->comment('nome do produto que aparece no anuncio');
            $table->string('slug', 191)->nullable()->unique()->comment('nome que aparece na url do anuncio');
            $table->string('color', 25)->nullable()->comment('cor de destaque do produto');
            $table->string('base_currency', 5)->nullable()->default('R$')->comment('moeda do pagamento');
            $table->integer('price')->default(0)->comment('preço de venda do anuncio x 100');
            $table->integer('price_max')->default(0)->comment('preço máximo do anuncio x 100');
            $table->integer('stock')->default(0)->comment('Quantidade em estoque do produto');
            $table->string('image')->nullable()->comment('url da imagem principal do produto');
            $table->integer('order')->default(1)->comment('ordem em que aparece no anuncio');
            $table->integer('active')->nullable()->default(0)->comment('1 se aparece para venda');
            $table->foreignId('group_id')->constrained();
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
