<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();

            $table->string('session', 36)->unique()->nullable();


            $table->foreignId('cliente_id')->nullable()->references('id')->on('users');
            $table->foreignId('cliente_endereco_id')->nullable()->references('id')->on('user_enderecos');

            $table->foreignId('forma_entrega_id')->nullable()->references('id')->on('forma_entregas');
            $table->foreignId('cupom_desconto_id')->nullable()->references('id')->on('cupom_descontos');

            $table->decimal('valor_desconto')->default(0.0)->nullable();
            $table->decimal('valor_entrega')->default(0.0)->nullable();

            $table->foreignId('forma_pagamento_id')->nullable()->references('id')->on('forma_pagamentos');

            // 1 - Pedido Pendente (Carrinho)
            // 2 - Concluído
            $table->integer('status')->default(1);

            $table->dateTime('finalizado_em')->nullable();

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
        Schema::dropIfExists('pedidos');
    }
}
