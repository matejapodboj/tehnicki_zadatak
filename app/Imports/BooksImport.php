<?php

namespace App\Imports;

use App\Models\Book;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class BooksImport implements ToModel, WithStartRow
{

    public function startRow(): int
    {
        return 2;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Book([
            'naziv_knjige'     => $row[0],
            'autor'    => $row[1],
            'izdavac' => $row[2],
            'godina_izdanja' => Carbon::createFromFormat('d/m/Y', $row[3]),
        ]);
    }
}
