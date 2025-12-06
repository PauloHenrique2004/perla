<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoSubcategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_subcategorias', function (Blueprint $table) {
            $table->id();

            // FK para a categoria “pai”
            $table->unsignedBigInteger('produto_categoria_id');

            $table->string('produto_subcategoria');
            $table->unsignedInteger('ordem')->default(0);

            $table->timestamps();

            $table->foreign('produto_categoria_id')
                ->references('id')
                ->on('produto_categorias')
                ->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_subcategorias');
    }
}
