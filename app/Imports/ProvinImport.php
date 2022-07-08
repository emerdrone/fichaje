<?php

namespace App\Imports;

use App\Models\Provin;
use Maatwebsite\Excel\Concerns\ToModel;

class ProvinImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Provin([
            //
        ]);
    }
}
