<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadlogsTable extends Migration
{
   
    public function up()
    {
        Schema::create('jadlogs', function (Blueprint $table) {
            $table->id();
            $table->string('region', 45)->comment('nome da região');
            $table->integer('zipini')->default(0)->comment('CEP incial');
            $table->integer('zipfin')->default(0)->comment('CEP final');
            $table->integer('wini')->default(0)->comment('Peso inicial em kg');
            $table->integer('wfin')->default(0)->comment('Peso final em kg');
            $table->integer('value')->default(0)->comment('Valor do frete x 100');
            $table->integer('deadline')->default(0)->comment('Prazo de entrega em dias uteis');
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('jadlogs');
    }
}
