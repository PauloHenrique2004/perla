<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoProdutoGrupoComplementosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_produto_grupo_complementos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('pedido_produto_grupo_id');

            $table->string('nome');
            $table->string('descricao')->nullable();

            $table->decimal('preco')->default(0.0)->nullable();

            $table->bigInteger('quantidade')->default(1);
        });

        Schema::table('pedido_produto_grupo_complementos', function (Blueprint $table) {
            $table->foreign('pedido_produto_grupo_id', 'ped_prod_grupo_compl_id_foreign')
                ->references('id')->on('pedido_produto_grupos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido_produto_grupo_complementos');
    }
}
