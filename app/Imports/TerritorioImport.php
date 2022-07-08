<?php

namespace App\Imports;

use App\Models\Territorio;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TerritorioImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Territorio([
            'nombre' => $row['nombre'],
        ]);
    }
}
