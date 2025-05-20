<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class agendacontactosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('AgendaContactos')->insert([
            [
                'nombre' => 'Marcos',
                'apellidos' => 'López',
                'telefono' => '70112233',
                'email' => 'marcos.lopez@example.com',
                'notas' => 'Llamar en la tarde',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Navarro',
                'apellidos' => 'Díaz',
                'telefono' => '72334455',
                'email' => 'navarro.diaz@example.com',
                'notas' => 'Interesado en cotización',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Victor',
                'apellidos' => 'Hernández',
                'telefono' => '73445566',
                'email' => 'victor.hernandez@example.com',
                'notas' => 'Enviar catálogo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Mario',
                'apellidos' => 'Castro',
                'telefono' => '74556677',
                'email' => 'mario.castro@example.com',
                'notas' => 'Reunión pendiente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Jonathan',
                'apellidos' => 'Cruz',
                'telefono' => '75667788',
                'email' => 'jonathan.cruz@example.com',
                'notas' => 'Favor contactar por correo',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}