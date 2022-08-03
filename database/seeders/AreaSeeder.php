<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create([
            'name' => 'Administración'
        ]);

        Area::create([
            'name' => 'Recursos Humanos'
        ]);

        Area::create([
            'name' => 'Oficios Varios'
        ]);

        Area::create([
            'name' => 'Operaciones'
        ]);
    }
}
