<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDestaqueIdToProdutosTable extends Migration
{
    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('destaque_id')->nullable()->after('produto_categoria_id');

            $table->foreign('destaque_id')
                ->references('id')
                ->on('produto_destaques')
                ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign(['destaque_id']);
            $table->dropColumn('destaque_id');
        });
    }
}
