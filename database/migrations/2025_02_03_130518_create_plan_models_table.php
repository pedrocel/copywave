<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->text('link_image')->nullable();
            $table->string('id_plan_external')->nullable();
            $table->string('id_offer_external')->nullable();
            $table->string('link_checkout_external')->nullable();
            $table->decimal('value', 10, 2)->nullable();
            $table->integer('page_quantity')->nullable();
            $table->enum('billing_cycle', ['monthly', 'quarterly', 'semiannual', 'annual', 'biennial', 'quadrennial'])->nullable();
            $table->integer('status')->default(1)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('plans');
    }
};
