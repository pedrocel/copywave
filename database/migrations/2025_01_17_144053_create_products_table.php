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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();  // Usando UUID como chave primária
            $table->string('name')->nullable();  // Nome do produto
            $table->text('description')->nullable();  // Descrição do produto
            $table->decimal('price', 10, 2)->nullable();  // Preço do produto
            $table->integer('sales_count')->nullable()->default(0);  // Quantidade de vendas
            $table->boolean('is_trending')->nullable()->default(false);  // Produto em alta
            $table->decimal('rating', 3, 2)->nullable()->default(0);  // Avaliação do produto
            $table->string('link')->nullable();  // Link do produto
            $table->string('image_url')->nullable();  // URL da imagem do produto
            $table->integer('category')->nullable();  // ID da categoria
            $table->integer('status')->nullable()->default(1);  // Status do produto (1: visível, 0: não visível)
            $table->decimal('possible_profit', 10, 2)->nullable();  // Lucro possível
            $table->integer('created_by')->nullable();
            $table->integer('id_store')->nullable();
            $table->timestamps();  // Created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
