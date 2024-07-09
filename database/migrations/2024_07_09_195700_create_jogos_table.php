<?php

use App\Models\Genero;
use App\Models\Produtora;
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
        Schema::create('jogos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome',50);
            $table->text('descricao');
            $table->decimal('nota',4,2);
            $table->string('capa',100);
            $table->unsignedBigInteger('produtora_id');
            $table->unsignedBigInteger('genero_id');

            $table->foreign('produtora_id')->references('id')->on('produtoras');
            $table->foreign('genero_id')->references('id')->on('generos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jogos');
    }
};
