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
        Schema::create('page_modifications', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('page_id')->constrained('pages')->onDelete('cascade');
            $table->string('type'); // 'link', 'image', 'script'
            $table->string('old_value')->nullable();
            $table->string('new_value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_modifications');
    }
};
