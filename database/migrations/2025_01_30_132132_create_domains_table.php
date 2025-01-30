<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('domain')->unique();
            $table->timestamps();
        });

        Schema::table('pages', function (Blueprint $table) {
            $table->foreignId('domain_id')->nullable()->constrained('domains')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropForeign(['domain_id']);
            $table->dropColumn('domain_id');
        });

        Schema::dropIfExists('domains');
    }
};
