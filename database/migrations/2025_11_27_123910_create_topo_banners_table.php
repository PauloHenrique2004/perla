<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopoBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topo_banners', function (Blueprint $table) {
            $table->id();

            $table->string('titulo')->nullable();

            // caminhos das imagens (desktop e mobile)
            $table->string('imagem_desktop')->nullable();
            $table->string('imagem_mobile')->nullable();

            // link opcional
            $table->string('link')->nullable();

            // controlar exibição e ordem
            $table->boolean('ativo')->default(true);
            $table->unsignedInteger('ordem')->default(0);

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
        Schema::dropIfExists('topo_banners');
    }
}
