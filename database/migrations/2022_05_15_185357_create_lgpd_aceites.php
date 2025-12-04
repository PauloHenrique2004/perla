<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLgpdAceites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lgpd_aceites', function (Blueprint $table) {
            $table->id();

            $table->foreignId('lgpd_termo_id')->references('id')->on('lgpd_termos');
            $table->foreignId('user_id')->nullable()->references('id')->on('users');

            $table->string('ip');
            $table->string('cookie')->nullable();
            $table->string('agente')->nullable();
            $table->dateTime('aceito_em');

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
        Schema::dropIfExists('lgpd_aceites');
    }
}