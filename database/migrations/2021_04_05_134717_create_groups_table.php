<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('sku', 15)->unique()->comment('codigo unico do grupo de produto');
            $table->string('name', 191)->unique()->comment('nome do grupo que aparece no anuncio');
            $table->string('slug', 191)->unique()->comment('nome que aparece na url do anuncio');
            $table->string('packing_format', 45)->nullable()->default('retangular')->comment('formato da embalagem');
            $table->integer('qty_ship')->default(0)->comment('quantidade enviada pelo mesmo valor de frete');
            $table->integer('grossweight')->nullable()->default(0)->comment('preso bruto em gramas');
            $table->integer('netweight')->nullable()->default(0)->comment('peso liquido em gramas');
            $table->integer('packing_length')->nullable()->default(0)->comment('comprimento da embalagem em mm');
            $table->integer('packing_width')->nullable()->default(1)->comment('largura da embalagem em mm');
            $table->integer('packing_height')->nullable()->default(0)->comment('altura da embalagem em mm');
            $table->integer('product_length')->nullable()->default(0)->comment('comprimento do produto em mm');
            $table->integer('product_width')->nullable()->default(0)->comment('largura do produto em mm');
            $table->integer('product_height')->nullable()->default(0)->comment('altura do produto em mm');
            $table->string('description', 191)->nullable()->comment('descrição do produto');
            $table->string('description_short', 191)->nullable()->comment('descrição curta do produto');
            $table->text('description_long')->nullable()->comment('descrição longa do produto');
            $table->text('technical_features')->nullable()->comment('dados técnicos do produto');
            $table->integer('order')->default(1)->comment('ordem em que o grupo que aparece no anuncio');
            $table->integer('active')->default(0)->comment('1 se aparece para venda');
            $table->foreignId('seller_id')->constrained();
            $table->foreignId('category_id')->constrained();
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
        Schema::dropIfExists('groups');
    }
}
