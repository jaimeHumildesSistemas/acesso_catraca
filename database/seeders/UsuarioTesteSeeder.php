<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\QRCode;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsuarioTesteSeeder extends Seeder
{
    public function run(): void
    {
        // Cria ou atualiza o usuário com ID 15
        $user = User::updateOrCreate(
            ['id' => 15],
            [
                'name' => 'Usuário Teste',
                'email' => 'teste15@example.com',
                'password' => Hash::make('senha123'),
            ]
        );

        // Gera um código UUID único
        $codigo = Str::uuid()->toString();

        // Cria um QR code associado ao usuário
        QRCode::create([
            'user_id' => $user->id,
            'code'    => $codigo,
        ]);
    }
}
