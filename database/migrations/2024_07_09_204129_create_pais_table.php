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
        Schema::create('paises', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome',30);
            $table->string('sigla',5);
        });
        Schema::table('produtoras', function (Blueprint $table){
            $table->unsignedBigInteger('pais_id');
            $table->foreign('pais_id')->references('id')->on('paises');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produtoras', function (Blueprint  $table){
            $table->dropForeign('produtoras_pais_id_foreign');
            $table->dropColumn('pais_id');
        });
        Schema::dropIfExists('paises');
    }
};
