<?php

namespace App\Imports;

use App\Models\Library;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;

class BooksImport implements ToModel,WithHeadingRow
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Library([
            'name' => $row['name'],
            'author' => $row['author'],
            'edition' => $row['edition'],
            'year' => $row['year'],
            'publisher' => $row['publisher'],
            'quantity' => $row['quantity'],
        ]);
    }
}
