<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepoimentosTable extends Migration
{
    public function up()
    {
        Schema::create('depoimentos', function (Blueprint $table) {
            $table->id();

            $table->string('nome');
            $table->string('cargo')->nullable();          // opcional: tipo "Cliente", "Noiva", etc.
            $table->string('foto')->nullable();           // caminho da imagem (avatar)
            $table->unsignedTinyInteger('estrelas')
                ->default(5);                           // 1–5 estrelas
            $table->text('texto');                        // texto do depoimento
            $table->boolean('ativo')->default(true);      // exibir ou não na home
            $table->unsignedInteger('ordem')->default(0); // ordenação manual

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('depoimentos');
    }
}
