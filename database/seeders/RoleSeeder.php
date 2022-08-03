<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::create([
            'name'=> 'Profesional de proyectos - Desarrollador',
        ]);
        Rol::create([
            'name'=> 'Gerente Estratégico',
        ]);
        Rol::create([
            'name'=> 'Auxiliar Administrativo',
        ]);
    }
}
