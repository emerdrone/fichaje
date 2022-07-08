<?php

namespace App\Imports;

use App\Models\Provincia;
use Maatwebsite\Excel\Concerns\ToModel;

class ProvinciaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Provincia([
            //
        ]);
    }
}
