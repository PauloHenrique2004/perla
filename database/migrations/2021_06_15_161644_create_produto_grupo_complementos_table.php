<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoGrupoComplementosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_grupo_complementos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('produto_grupo_id');

            $table->foreignId('produto_grupo_id')->references('id')->on('produto_grupos');

            $table->string('nome');
            $table->string('descricao')->nullable();

            // Se preenchido o usuário irá pagar por tal complemento
            $table->decimal('preco')->default(0.0)->nullable();

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
        Schema::dropIfExists('produto_grupo_complementos');
    }
}
