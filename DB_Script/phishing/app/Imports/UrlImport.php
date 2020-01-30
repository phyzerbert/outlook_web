<?php

namespace App\Imports;

use App\Models\Url;
use Maatwebsite\Excel\Concerns\ToModel;

class UrlImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Url([
            'email' => $row[0],
            'url' => $row[1],
        ]);
    }
}
