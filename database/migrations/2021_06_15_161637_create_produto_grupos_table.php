<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_grupos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('produto_id')->references('id')->on('produtos');

            $table->string('nome')->index();

            $table->tinyInteger('ordem');

            // 1 -> Opcional - O cliente pode ou não selecionar os itens
            // 2 -> Obrigatório - O cliente deve selecionar 1 ou mais itens para adicionar o pedido ao carrinho
            $table->integer('tipo')->default(1);

            $table->bigInteger('quantidade_minima')->default(0);
            $table->bigInteger('quantidade_maxima')->default(0);

            $table->softDeletes();
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
        Schema::dropIfExists('produto_grupos');
    }
}
