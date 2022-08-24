<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['awaiting payment', 'payment confirmed', 'disapproved payment'])->default('awaiting payment');
            $table->string('method', 191)->nullable()->comment('forma de pagamento');
            $table->string('base_currency', 5)->nullable()->default('R$')->comment('moeda do pagamento');
            $table->integer('value')->nullable()->default(0)->comment('valor a ser pago');
            $table->integer('parcel')->nullable()->default(0)->comment('numero de parcelas');
            $table->timestamp('due_date')->comment('data de vencimento');
            $table->timestamp('payment_date')->nullable()->comment('data do vencimento');
            $table->string('note', 191)->nullable()->comment('obs complementar o pagamento');
            $table->foreignId('order_id')->constrained();
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
        Schema::dropIfExists('payments');
    }
}
