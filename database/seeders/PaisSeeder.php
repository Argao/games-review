<?php

namespace Database\Seeders;

use App\Models\Pais;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pais::create(['nome' => 'Brasil', 'sigla' => 'BR']);
        Pais::create(['nome' => 'Estados Unidos', 'sigla' => 'US']);
        Pais::create(['nome' => 'Canadá', 'sigla' => 'CA']);
        Pais::create(['nome' => 'Japão', 'sigla' => 'JP']);
        Pais::create(['nome' => 'China', 'sigla' => 'CN']);
        Pais::create(['nome' => 'França', 'sigla' => 'FR']);
    }
}
