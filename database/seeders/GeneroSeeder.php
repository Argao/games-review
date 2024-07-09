<?php

namespace Database\Seeders;

use App\Models\Genero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genero::create(['genero' => 'Ação']);
        Genero::create(['genero' => 'Aventura']);
        Genero::create(['genero' => 'Terror']);
        Genero::create(['genero' => 'Plataforma']);
        Genero::create(['genero' => 'Estratégia']);
        Genero::create(['genero' => 'RPG']);
        Genero::create(['genero' => 'Esporte']);
        Genero::create(['genero' => 'Corrida']);
        Genero::create(['genero' => 'Tabuleiro']);
        Genero::create(['genero' => 'Puzzle']);
        Genero::create(['genero' => 'Luta']);
        Genero::create(['genero' => 'Musical']);
    }
}
