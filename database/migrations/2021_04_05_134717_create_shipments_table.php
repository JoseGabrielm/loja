<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['Preparing Shipment', 'delivering', 'Delivered', 'Late delivery', 'Delivery canceled']);
            $table->string('sku', 45)->comment('sku do produto');
            $table->string('nome', 191)->comment('nome do produto');
            $table->string('base_currency', 5)->default('R$')->comment('moeda do pagamento');
            $table->integer('price_prod')->default(0)->comment('preço de venda do produto');
            $table->integer('total_qty')->default(0)->comment('quantidade por embalagem');
            $table->integer('total_weight')->default(0)->comment('peso em gramas unitario da embalgem do produto comprado');
            $table->string('packing_width', 45)->default(0)->comment('largura em mm da embalagem do produto comprado');
            $table->string('packing_height', 45)->default(0)->comment('altura em mm da embalagem do produto comprado');
            $table->string('packing_lenght', 45)->default(0)->comment('comprimento em mm da embalagem do produto comprado');
            $table->text('track_number')->nullable()->comment('coodigo de rastreio');
            $table->string('contact', 191)->nullable()->comment('dados para entrar em contato o cliente');
            $table->string('additional', 45)->nullable()->comment('informações adicionais de envio');
            $table->string('postcode', 15)->nullable()->comment('codigo postal');
            $table->string('address', 191)->nullable()->comment('endereço de entrega');
            $table->string('number', 45)->nullable()->comment('numero da entrega');
            $table->string('neighborhood', 45)->nullable()->comment('bairro da entrega');
            $table->string('complement', 191)->nullable()->comment('dados complementares da entrega');
            $table->foreignId('order_id')->constrained();
            $table->foreignId('carrier_id')->constrained();
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
        Schema::dropIfExists('shipments');
    }
}
