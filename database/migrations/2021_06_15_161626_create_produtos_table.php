<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('produto_categoria_id')->references('id')->on('produto_categorias');

            $table->string('nome')->index();
            $table->string('slug');

            $table->text('descricao')->nullable();

            $table->decimal('preco')->default(0.0);
            $table->decimal('preco_a_partir_de')->default(0.0)->nullable();
            $table->boolean('promocional')->default(false);
            $table->decimal('preco_promocional')->default(0.0)->nullable();

            $table->string('foto');
            $table->string('thumbnail');

            $table->boolean('ativo')->default(true);

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
        Schema::dropIfExists('produtos');
    }
}
