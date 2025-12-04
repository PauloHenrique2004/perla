<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCupomDescontosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cupom_descontos', function (Blueprint $table) {
            $table->id();

            $table->string('codigo');

            $table->bigInteger('qtd_uso_maxima')->default(0);
            $table->bigInteger('qtd_utilizado')->default(0);

            $table->date('validade');
            $table->decimal('valor')->default(0.0)->nullable(false);
            $table->decimal('valor_minimo_pedido')->default(0.0)->nullable(false);

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
        Schema::dropIfExists('cupom_descontos');
    }
}
