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
        Schema::create('itens_vendidos', function (Blueprint $table) {
            $table->id();
            $table->integer("quantVendido");
            $table->string("precoVenda");
            $table->string("precoTotal");
            $table->unsignedBigInteger("itens_id");
            $table->unsignedBigInteger("venda_id");
            $table->foreign('itens_id')->references('id')->on('itens')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('venda_id')->references('id')->on('vendas')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itens_vendidos');
    }
};
