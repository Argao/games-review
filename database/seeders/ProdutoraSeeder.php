<?php

namespace Database\Seeders;

use App\Models\Pais;
use App\Models\Produtora;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutoraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Produtora::create(['produtora' => 'Microsoft', 'pais_id'=> Pais::where('sigla','US')->first()->id]);
        Produtora::create(['produtora' => 'Tencent', 'pais_id'=> Pais::where('sigla','CN')->first()->id]);
        Produtora::create(['produtora' => 'Nintendo', 'pais_id'=> Pais::where('sigla','JP')->first()->id]);
        Produtora::create(['produtora' => 'Sony', 'pais_id'=> Pais::where('sigla','JP')->first()->id]);
        Produtora::create(['produtora' => 'Activision', 'pais_id'=> Pais::where('sigla','US')->first()->id]);
        Produtora::create(['produtora' => 'EA', 'pais_id'=> Pais::where('sigla','US')->first()->id]);
        Produtora::create(['produtora' => 'Sega', 'pais_id'=> Pais::where('sigla','JP')->first()->id]);
        Produtora::create(['produtora' => 'Bandai Namco', 'pais_id'=> Pais::where('sigla','JP')->first()->id]);
        Produtora::create(['produtora' => 'Konami', 'pais_id'=> Pais::where('sigla','JP')->first()->id]);
        Produtora::create(['produtora' => 'Ubisoft', 'pais_id'=> Pais::where('sigla','FR')->first()->id]);
        Produtora::create(['produtora' => 'Valve', 'pais_id'=> Pais::where('sigla','US')->first()->id]);
        Produtora::create(['produtora' => 'Square Enix', 'pais_id'=> Pais::where('sigla','JP')->first()->id]);
        Produtora::create(['produtora' => 'Take-Two', 'pais_id'=> Pais::where('sigla','US')->first()->id]);
        Produtora::create(['produtora' => 'Capcon', 'pais_id'=> Pais::where('sigla','JP')->first()->id]);
    }
}
