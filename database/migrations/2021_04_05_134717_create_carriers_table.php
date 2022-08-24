<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carriers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45)->comment('nome ou razão social do entregador');
            $table->string('contact', 90)->nullable()->comment('nome do contato');
            $table->string('Phone', 190)->nullable()->comment('telefone de contato');
            $table->string('email', 190)->nullable()->comment('email de contato');
            $table->string('cell', 190)->nullable()->comment('celular de contato');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carriers');
    }
}
