<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliations', function (Blueprint $table) {
            $table->id();
            $table->integer('avaliation')->nullable()->comment('local para o clienter colocar um texto de avaliação');
            $table->string('note', 191)->default(5)->comment('nota de 0 a 5 para o produto');
            $table->boolean('active')->default(0)->comment('true se o comentario vai aparacer no anuncio');
            $table->foreignId('client_id')->constrained();
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
        Schema::dropIfExists('avaliations');
    }
}
