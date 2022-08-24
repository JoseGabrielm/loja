<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['awaiting payment', 'payment confirmed', 'disapproved payment'])->default('awaiting payment');
            $table->string('base_currency', 5)->default('R$')->comment('moeda do pagamento');
            $table->integer('ship_value')->nullable()->default(0)->comment('valor total do frete do produto');
            $table->integer('total')->nullable()->default(0)->comment('valor total dos produtos');
            $table->integer('ship_deadline')->nullable()->default(0)->comment('prazo de entrega');
            $table->string('ship_form', 45)->nullable()->comment('forma de envio dos produtos');
            $table->string('ship_zip', 10)->nullable()->comment('CEP do endereço de entrega do produto');
            $table->string('doc_type', 5)->nullable()->comment('CPF, CNPJ');
            $table->string('doc_number', 45)->nullable()->comment('numero do documento do comprador');
            $table->string('coupon_code', 191)->nullable()->comment('codigo do cupom de desconto');
            $table->integer('discount')->nullable()->default(0)->comment('valor do desconto dado na compra');
            $table->integer('sub_total')->nullable()->default(0)->comment('valor total do produto mais o frete');
            $table->integer('grand_total')->nullable()->default(0)->comment('valor do produto, mais o frete, menos o desconto');
            $table->string('payby', 20)->nullable()->comment('boleto, deposito, cartão');
            $table->string('url_pay', 150)->nullable()->comment('codigo para url do pagamento gerado');
            $table->string('payment_code ', 190)->nullable()->comment('Código que identifica o pagamento');
            $table->foreignId('client_id')->constrained()->comment('');
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
        Schema::dropIfExists('orders');
    }
}
