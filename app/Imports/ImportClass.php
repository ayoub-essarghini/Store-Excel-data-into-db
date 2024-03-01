<?php

namespace App\Imports;

use App\Models\Data as ModelsData;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportClass implements ToModel
{
    public function model(array $row)
    {
        return new ModelsData([
            'column1' => $row[0],
            'column2' => $row[1],
           
        ]);
    }
}
