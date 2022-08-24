<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['entrega', 'faturamento','cobrança', 'contato', 'outro'])->default('entrega');
            $table->string('postcode', 15)->nullable()->comment('codigo postal');
            $table->string('street', 191)->nullable()->comment('endereço');
            $table->string('number', 45)->nullable()->comment('numero');
            $table->string('neighborhood', 45)->nullable()->comment('bairro');
            $table->string('complement', 191)->nullable()->comment('complemento');
            $table->foreignId('client_id')->constrained();
            $table->foreignId('city_id')->nullable()->constrained();
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
        Schema::dropIfExists('addresses');
    }
}
