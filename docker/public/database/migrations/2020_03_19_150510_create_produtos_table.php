<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Cria a tabela de produtos
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->bigIncrements('produto_id');
            $table->timestamps();
            $table->string('nome');
            $table->string('peso');
            $table->string('cor');
            $table->longText('descricao');
            $table->integer('status')->default(0);
            $table->softDeletes();
            $table->bigInteger('categoria_id')->unsigned();
              /*  $table->foreign('categoria_id')->references('id')->on('categoria_produtos'); */
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
