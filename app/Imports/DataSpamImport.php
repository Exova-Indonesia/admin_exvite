<?php

namespace App\Imports;

use App\Models\DataSpam;
use Maatwebsite\Excel\Concerns\ToModel;

class DataSpamImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DataSpam([
            'name' => $row[2],
            'email' => $row[3],
        ]);
    }
}
