<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaginaCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagina_categorias', function (Blueprint $table) {
            $table->id();

            $table->string('nome')->index();
            $table->unsignedBigInteger('categoria_id')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('pagina_categorias', function (Blueprint $table) {
            $table->foreign('categoria_id')->references('id')->on('pagina_categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagina_categorias');
    }
}
