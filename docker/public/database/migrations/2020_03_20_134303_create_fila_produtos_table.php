<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilaProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fila_produtos', function (Blueprint $table) {
            $table->bigIncrements('fila_produtos_id');
            $table->timestamps();
            $table->longText('string_linha_arquivo');
            $table->longText('log_importacao')->default(null);
            $table->integer('categoria_produtos_id')->default(0);
            $table->integer('processado')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('fila_produtos');
    }
}
