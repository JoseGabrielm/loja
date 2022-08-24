<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code', 45)->comment('código do cupom');
            $table->string('base_currency', 5)->default('R$')->comment('moeda do pagamento');
            $table->integer('value')->default(0)->comment('valor do desconto em moeda');
            $table->integer('percent')->default(0)->comment('valor do desconto em percentagem');
            $table->timestamp('times_expire')->useCurrent()->comment('data da expiração da promoção');
            $table->foreignId('client_id')->constrained();
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
        Schema::dropIfExists('coupons');
    }
}
