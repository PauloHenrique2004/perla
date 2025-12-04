<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaginasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paginas', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('categoria_id')->nullable();

            $table->string('titulo')->index('paginas_titulo_index');
            $table->string('slug')->nullable();
            $table->longText('conteudo')->nullable();

            $table->string('foto')->nullable();
            $table->string('thumbnail')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('paginas', function (Blueprint $table) {
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
        Schema::dropIfExists('paginas');
    }
}
