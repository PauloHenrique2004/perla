<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosAtendidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos_atendidos', function (Blueprint $table) {
            $table->id();

            $table->string('uf')->index();
            $table->integer('loc_nu')->index();

            // Nome do bairro customizado
            $table->string('bairro_custom')->nullable();

            $table->integer('bai_nu')->index()->nullable();

            $table->decimal('valor')->default(0.0)->nullable(false);

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
        Schema::dropIfExists('enderecos_atendidos');
    }
}
