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
        Pais::create(['nome' => 'Alemanha', 'sigla' => 'DE']);
        Pais::create(['nome' => 'Reino Unido', 'sigla' => 'UK']);
        Pais::create(['nome' => 'Austrália', 'sigla' => 'AU']);
        Pais::create(['nome' => 'Itália', 'sigla' => 'IT']);
        Pais::create(['nome' => 'Espanha', 'sigla' => 'ES']);
        Pais::create(['nome' => 'Argentina', 'sigla' => 'AR']);
        Pais::create(['nome' => 'México', 'sigla' => 'MX']);
        Pais::create(['nome' => 'Índia', 'sigla' => 'IN']);
        Pais::create(['nome' => 'Rússia', 'sigla' => 'RU']);
        Pais::create(['nome' => 'Coreia do Sul', 'sigla' => 'KR']);
        Pais::create(['nome' => 'Portugal', 'sigla' => 'PT']);
        Pais::create(['nome' => 'Holanda', 'sigla' => 'NL']);
        Pais::create(['nome' => 'Suíça', 'sigla' => 'CH']);
        Pais::create(['nome' => 'Bélgica', 'sigla' => 'BE']);
        Pais::create(['nome' => 'Noruega', 'sigla' => 'NO']);
        Pais::create(['nome' => 'Suécia', 'sigla' => 'SE']);
        Pais::create(['nome' => 'Finlândia', 'sigla' => 'FI']);
        Pais::create(['nome' => 'Dinamarca', 'sigla' => 'DK']);
        Pais::create(['nome' => 'Islândia', 'sigla' => 'IS']);
        Pais::create(['nome' => 'Irlanda', 'sigla' => 'IE']);
        Pais::create(['nome' => 'Grécia', 'sigla' => 'GR']);
        Pais::create(['nome' => 'Porto Rico', 'sigla' => 'PR']);
        Pais::create(['nome' => 'Nova Zelândia', 'sigla' => 'NZ']);
        Pais::create(['nome' => 'África do Sul', 'sigla' => 'ZA']);
        Pais::create(['nome' => 'Egito', 'sigla' => 'EG']);
        Pais::create(['nome' => 'Marrocos', 'sigla' => 'MA']);
        Pais::create(['nome' => 'Nigéria', 'sigla' => 'NG']);
        Pais::create(['nome' => 'Quênia', 'sigla' => 'KE']);
        Pais::create(['nome' => 'Turquia', 'sigla' => 'TR']);
        Pais::create(['nome' => 'Ucrânia', 'sigla' => 'UA']);
        Pais::create(['nome' => 'Polônia', 'sigla' => 'PL']);
        Pais::create(['nome' => 'República Tcheca', 'sigla' => 'CZ']);
        Pais::create(['nome' => 'Eslováquia', 'sigla' => 'SK']);
        Pais::create(['nome' => 'Hungria', 'sigla' => 'HU']);
        Pais::create(['nome' => 'Romênia', 'sigla' => 'RO']);
        Pais::create(['nome' => 'Bulgária', 'sigla' => 'BG']);
        Pais::create(['nome' => 'Sérvia', 'sigla' => 'RS']);
        Pais::create(['nome' => 'Croácia', 'sigla' => 'HR']);
        Pais::create(['nome' => 'Bósnia e Herzegovina', 'sigla' => 'BA']);
        Pais::create(['nome' => 'Eslovênia', 'sigla' => 'SI']);
        Pais::create(['nome' => 'Macedônia do Norte', 'sigla' => 'MK']);
        Pais::create(['nome' => 'Albânia', 'sigla' => 'AL']);
        Pais::create(['nome' => 'Montenegro', 'sigla' => 'ME']);
    }
}
