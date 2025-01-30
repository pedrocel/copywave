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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable(); // Relacionamento com usuários
            $table->string('offer_id')->nullable(); // ID da oferta
            $table->string('status')->nullable(); // Status da assinatura
            $table->decimal('price', 10, 2)->nullable(); // Preço da assinatura
            $table->string('payment_method')->nullable(); // Método de pagamento
            $table->timestamp('paid_at')->nullable(); // Data de pagamento
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
