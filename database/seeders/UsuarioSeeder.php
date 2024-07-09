<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario::create(['usuario'=>'admin', 'senha'=>'admin', 'nome'=>'Administrador']);
        Usuario::create(['usuario'=>'editor', 'senha'=>'editor', 'nome'=>'Editor']);
    }
}
