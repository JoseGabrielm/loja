<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name', 191)->comment('nome ou razão social do cliente');
            $table->string('fantasy', 45)->nullable()->comment('nome fantasia do cliente');
            $table->string('contact', 191)->nullable()->comment('nome de contato ou de quem recebe');
            $table->boolean('is_company')->nullable()->default(0)->comment('true se for pessoa juridica');
            $table->string('doc_ssn', 20)->nullable()->comment('cpf');
            $table->string('doc_country', 45)->nullable()->comment('CNPJ');
            $table->string('doc_state', 45)->nullable()->comment('inscrição estadual');
            $table->string('doc_city', 45)->nullable()->comment('inscrição municipal');
            $table->date('birthday')->nullable()->comment('data de nascimento');
            $table->boolean('is_active')->nullable()->default(1)->comment('true se for liberada a compra');
            $table->boolean('news_letter')->nullable()->default(0)->comment('true se desejar receber anuncios');
            $table->boolean('is_verified')->nullable()->default(0)->comment('true se os dados foram verificados');
            $table->text('note')->nullable()->comment('informação complementar do cliente');
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('clients');
    }
}
