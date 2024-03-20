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
        Schema::create('itens', function (Blueprint $table) {
            $table->id();
            $table->string("codproduto");
            $table->string("precoVenda");
            $table->string("precoCompra");
            $table->string("quantEstoque");
            $table->string("quantCompra");
            $table->string("quantVendido");
            $table->unsignedBigInteger("fornecedor_id");
            $table->unsignedBigInteger("produto_id");
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('produto_id')->references('id')->on('produtos')->onUpdate('cascade')->onDelete('cascade');
            $table->enum("status",['0','1'])->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itens');
    }
};
