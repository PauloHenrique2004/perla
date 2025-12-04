<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfiguracoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuracoes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->longText('instagram')->nullable();

            $table->longText('whatsapp_link')->nullable();
            $table->longText('maps_iframe')->nullable();
            $table->longText('google_analytics')->nullable();

            $table->string('telefone1')->nullable();
            $table->string('telefone2')->nullable();

            $table->string('email1')->nullable();
            $table->string('email2')->nullable();

            $table->string('rua')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();
            $table->string('horario_funcionamento')->nullable();

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
        Schema::dropIfExists('configuracoes');
    }
}
