<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_produtos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pedido_id')->references('id')->on('pedidos');
            $table->foreignId('produto_id')->references('id')->on('produtos');

            $table->string('nome');

            $table->decimal('preco')->default(0.0);
            $table->decimal('preco_promocional')->default(0.0)->nullable();

            $table->bigInteger('quantidade')->default(1);

            $table->decimal('total')->default(0.0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido_produtos');
    }
}
