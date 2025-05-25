<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class agendacontactosSeeder extends Seeder
{
    public function run(): void
    {
        //comando para ejecutar el seeder
        //php artisan migrate:fresh --seed
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
            ],
            [
                'nombre' => 'Ana',
                'apellidos' => 'Martínez',
                'telefono' => '76678899',
                'email' => 'ana.martinez@example.com',
                'notas' => 'Enviar factura',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Luis',
                'apellidos' => 'Ramírez',
                'telefono' => '77789900',
                'email' => 'luis.ramirez@example.com',
                'notas' => 'Cliente frecuente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Sofía',
                'apellidos' => 'Gómez',
                'telefono' => '78890011',
                'email' => 'sofia.gomez@example.com',
                'notas' => 'Prefiere WhatsApp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Carlos',
                'apellidos' => 'Pérez',
                'telefono' => '79901122',
                'email' => 'carlos.perez@example.com',
                'notas' => 'Solicitó descuento',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Elena',
                'apellidos' => 'Sánchez',
                'telefono' => '80012233',
                'email' => 'elena.sanchez@example.com',
                'notas' => 'Enviar recordatorio',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Pedro',
                'apellidos' => 'Morales',
                'telefono' => '81123344',
                'email' => 'pedro.morales@example.com',
                'notas' => 'Llamar por la mañana',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Lucía',
                'apellidos' => 'Vargas',
                'telefono' => '82234455',
                'email' => 'lucia.vargas@example.com',
                'notas' => 'Enviar cotización',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Miguel',
                'apellidos' => 'Torres',
                'telefono' => '83345566',
                'email' => 'miguel.torres@example.com',
                'notas' => 'Pendiente de pago',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Paula',
                'apellidos' => 'Flores',
                'telefono' => '84456677',
                'email' => 'paula.flores@example.com',
                'notas' => 'Cliente nuevo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Andrés',
                'apellidos' => 'Mendoza',
                'telefono' => '85567788',
                'email' => 'andres.mendoza@example.com',
                'notas' => 'Solicitó información',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Gabriela',
                'apellidos' => 'Reyes',
                'telefono' => '86678899',
                'email' => 'gabriela.reyes@example.com',
                'notas' => 'Enviar promoción',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Jorge',
                'apellidos' => 'Silva',
                'telefono' => '87789900',
                'email' => 'jorge.silva@example.com',
                'notas' => 'Visita programada',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Valeria',
                'apellidos' => 'Ortega',
                'telefono' => '88890011',
                'email' => 'valeria.ortega@example.com',
                'notas' => 'Prefiere email',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Ricardo',
                'apellidos' => 'Ríos',
                'telefono' => '89901122',
                'email' => 'ricardo.rios@example.com',
                'notas' => 'Enviar encuesta',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Camila',
                'apellidos' => 'Peña',
                'telefono' => '90012233',
                'email' => 'camila.pena@example.com',
                'notas' => 'Llamar la próxima semana',
                'created_at' => now(),
                'updated_at' => now(),
            ]
            
            ]);
    }
}