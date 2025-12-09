<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProdutoSubcategoriaIdToProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('produto_subcategoria_id')
                ->nullable()
                ->after('produto_categoria_id');

            $table->foreign('produto_subcategoria_id')
                ->references('id')
                ->on('produto_subcategorias')
                ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign(['produto_subcategoria_id']);
            $table->dropColumn('produto_subcategoria_id');
        });
    }

}
