<?php

namespace Database\Seeders;

use App\Models\Empresa;
use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{

    public function run()
    {
        Empresa::create([
            'nombre' =>'Tabilton S L',
            'Direccion' =>'Glorieta del Universo, 9',
            'Cp' => '28341',
            'Nif' => 'B83495028',
            'Telefono' => '918082346',
            'Email' => 'info@filecat.com',
            'provin_id' => 30,
            'territorio_id' => 1,
            'localidad_id' => 4441,
        ]);
    }
}
