<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registro_produtos_vendas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('produto_id');
            $table->string('tipo_produto');
            $table->integer('quant_prod_feita');
            $table->decimal('preco_produto');
            $table->string('imagem_produto');
            $table->bigInteger('funcionario_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_produtos_vendas');
    }
};
