<?php

namespace Database\Seeders;

use App\Models\Etapa;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // cria a coordenadora inicial
        User::updateOrCreate(
            ['email' => 'coordenadora@gmail.com'],
            [
                'name' => 'Coordenadora',
                // inserção da senha com hash
                'password' => Hash::make('senha321'),
                'tipo_usuario' => 'coordenador',
                'telefone' => '14997234567',
            ]
        );

        Etapa::updateOrCreate(
            ['nome_etapa' => '1ª etapa'],
            [
                'descricao' => '1ª etapa',
            ]
        );

        Etapa::updateOrCreate(
            ['nome_etapa' => '2ª etapa'],
            [
                'descricao' => '2ª etapa',
            ]
        );

        Etapa::updateOrCreate(
            ['nome_etapa' => '3ª etapa'],
            [
                'descricao' => '3ª etapa',
            ]
        );

        // User::factory(10)->create();

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/
    }
}
