<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Territorio;

class PaisSeeder extends Seeder
{

    public function run()
    {
        Territorio::create([
            'nombre' => 'España',
        ]);
    }
}
