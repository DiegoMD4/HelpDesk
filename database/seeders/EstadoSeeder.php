<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Estados;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estado1 = new Estados;
        $estado1->tipo_estado = "Pendiente";
        $estado1->save();

        $estado2 = new Estados;
        $estado2->tipo_estado = "Cerrado";
        $estado2->save();
    }
}
