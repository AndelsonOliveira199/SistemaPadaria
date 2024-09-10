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
        Schema::create('tb_funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('foto');
            $table->string('email');
            $table->integer('telefone');
            $table->string('bi');
            $table->date('data_nasc');
            $table->integer('idade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_funcionarios');
    }
};
